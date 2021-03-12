import axios from "axios";
import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import Cookies from "js-cookie";

const BidBox = ({ auctionId }) => {
  const [offer, setOffer] = useState("");

  const submitHandler = async (e) => {
    e.preventDefault();
    try {
      let response = await window.axios.post(
        `/api/lelang/${auctionId}/tawaran`,
        {
          penawaran_harga: offer,
        },
        {
          headers: {
            Authorization: `Bearer ${Cookies.get("API_TOKEN")}`,
          },
        }
      );
    } catch (e) {
      console.error(e);
    }

    setOffer("");
  };

  return (
    <form onSubmit={(e) => submitHandler(e)}>
      <div className="form-group mt-3">
        <div className="input-group input-group-alternative mb-4">
          <div className="input-group-prepend">
            <span className="input-group-text">
              <i className="ni ni-money-coins"></i>
            </span>
          </div>
          <input
            className="form-control form-control-alternative"
            placeholder="Ajukan Tawaran"
            type="number"
            value={offer}
            onChange={(e) => setOffer(e.target.value)}
          />
        </div>
      </div>
      <div className="text-right">
        <button className="btn btn-info">Tawarkan !</button>
      </div>
    </form>
  );
};

const OfferBox = ({ auctionId }) => {
  const [lelang, setLelang] = useState([]);
  const [loading, setLoading] = useState(true);

  const fetchLelang = async () => {
    setLoading(true);
    try {
      let response = await axios.get(`/api/lelang/${auctionId}`);
      setLelang(response.data.lelang);
    } catch (e) {
      console.error(e);
    }
    setLoading(false);
  };

  useEffect(() => {
    fetchLelang();
    window.Echo.channel(`lelang.${auctionId}`).listen("NewOffer", (e) => {
      setLelang(e);
      window.alertify
        .notify(`<div class="alert alert-default alert-dismissible fade show" role="alert">
      <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
      <span class="alert-inner--text"><strong>Tawaran Baru !</strong> Seseorang telah membuat penawaran baru !</span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>`, 'warning', 1000)
    });
  }, []);

  return (
    !loading && (
      <div className="card">
        <div className="card-body">
          <h1 className="card-title">{lelang.barang?.nama_barang}</h1>
          <p className="lead">{lelang.barang?.deskripsi_barang}</p>
          <p className="lead mb-1" style={{ fontSize: "0.9rem" }}>
            Penawaran saat ini
          </p>
          <h1 className="card-subtitle">
            Rp.{" "}
            {lelang.penawaran?.length == 0
              ? lelang.barang.harga_awal
              : lelang.penawaran?.reduce((prev, current) => {
                  return prev.penawaran_harga > current.penawaran_harga
                    ? prev
                    : current;
                }).penawaran_harga}
          </h1>
          {Cookies.get("API_TOKEN") && <BidBox auctionId={auctionId} />}
        </div>
      </div>
    )
  );
};

export default OfferBox;

if (document.getElementById("offer-box")) {
  let auctionId = document
    .getElementById("offer-box")
    .getAttribute("data-auction");

  ReactDOM.render(
    <OfferBox auctionId={auctionId} />,
    document.getElementById("offer-box")
  );
}
