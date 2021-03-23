import React, { useEffect, useMemo, useState } from "react";
import ReactDOM from "react-dom";
import { usePagination, useTable } from "react-table";

const Table = ({ columns, data, users }) => {
  const {
    getTableProps,
    getTableBodyProps,
    headerGroups,
    page,
    prepareRow,
    canPreviousPage,
    canNextPage,
    pageOptions,
    pageCount,
    gotoPage,
    nextPage,
    previousPage,
    setPageSize,
    state: { pageIndex, pageSize },
  } = useTable(
    {
      columns,
      data,
      initialState: { pageSize: 5 },
    },
    usePagination
  );

  const userData = (userId) =>
    users.filter((user) => user.id_user === userId)[0];

  return (
    <div className="table-responsive">
      <table {...getTableProps()} className="table align-items-center">
        <thead className="thead-light">
          {headerGroups.map((headerGroup) => (
            <tr {...headerGroup.getHeaderGroupProps()}>
              {headerGroup.headers.map((column) => (
                <th {...column.getHeaderProps()}>{column.render("Header")}</th>
              ))}
            </tr>
          ))}
        </thead>
        <tbody {...getTableBodyProps()} className="list">
          {page.map((row) => {
            prepareRow(row);
            return (
              <tr {...row.getRowProps()}>
                {row.cells.map((cell) => {
                  return (
                    <th {...cell.getCellProps()}>
                      <div className="media align-items-center">
                        <div className="media-body">
                          <span className="name mb-0 text-sm">
                            {cell.column.Header == "Name"
                              ? userData(cell.value).nama_lengkap
                              : cell.render("Cell")}
                          </span>
                        </div>
                      </div>
                    </th>
                  );
                })}
              </tr>
            );
          })}
        </tbody>
      </table>
      {/* { Pagination } */}
      <div className="card-footer py-4">
        <nav>
          <ul className="pagination justify-content-end mb-0">
            <li className={`page-item ${!canPreviousPage && "disabled"}`}>
              <button className="page-link" onClick={() => gotoPage(0)}>
                <i className="fas fa-angle-left"></i>
                <i className="fas fa-angle-left"></i>
              </button>
            </li>
            <li className={`page-item ${!canPreviousPage && "disabled"}`}>
              <button className="page-link" onClick={() => previousPage()}>
                <i className="fas fa-angle-left"></i>
              </button>
            </li>
            <li className="page-item active">
              <button className="page-link">{pageIndex + 1}</button>
            </li>
            <li className={`page-item ${!canNextPage && "disabled"}`}>
              <button className="page-link" onClick={() => nextPage()}>
                <i className="fas fa-angle-right"></i>
              </button>
            </li>
            <li className={`page-item ${!canNextPage && "disabled"}`}>
              <button
                className="page-link"
                onClick={() => gotoPage(pageCount - 1)}
              >
                <i className="fas fa-angle-right"></i>
                <i className="fas fa-angle-right"></i>
              </button>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  );
};

const Modal = ({ closeLink }) => (
  <div
    className="modal fade"
    id="modal-notification"
    tabIndex="-1"
    role="dialog"
    aria-labelledby="modal-notification"
    aria-hidden="true"
  >
    <div
      className="modal-dialog modal-danger modal-dialog-centered modal-"
      role="document"
    >
      <div className="modal-content bg-gradient-danger">
        <div className="modal-header">
          <h6 className="modal-title" id="modal-title-notification">
            Penutupan Lelang !
          </h6>
          <button
            type="button"
            className="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div className="modal-body">
          <div className="py-3 text-center">
            <i className="fas fa-gavel fa-3x"></i>
            <h4 className="heading mt-4">Anda yakin ?</h4>
            <p>
              Lelang akan ditutup dan menentukan pemenang. Operasi ini tidak
              bisa dikembalikan.
            </p>
          </div>
        </div>

        <div className="modal-footer">
          <form action={closeLink} method="POST">
            <input
              type="hidden"
              name="_token"
              value={document
                .querySelector('meta[name="csrf_token"]')
                .getAttribute("content")}
            />
            <input type="hidden" name="_method" value="PATCH" />
            <button type="submit " className="btn btn-white">
              MENGERTI
            </button>
          </form>
          <button
            type="button"
            className="btn btn-link text-white ml-auto"
            data-dismiss="modal"
          >
            Tutup dialog ini
          </button>
        </div>
      </div>
    </div>
  </div>
);

const AuctionTable = ({ auctionId, closeLink }) => {
  const [lelang, setLelang] = useState();
  const [loading, setLoading] = useState(true);
  const [users, setUsers] = useState([]);

  const fetchLelang = async () => {
    setLoading(true);
    try {
      const [lelangData, usersData] = await axios.all([
        axios.get(`/api/lelang/${auctionId}`),
        axios.get("/api/fetch-user"),
      ]);

      setLelang(lelangData.data.lelang);
      setUsers(usersData.data);
    } catch (e) {
      console.error(e);
    }
    setLoading(false);
  };

  useEffect(() => {
    fetchLelang();
    window.Echo.channel(`lelang.${auctionId}`).listen("NewOffer", (e) => {
      setLelang(e);
      window.alertify.notify(
        `<div className="alert alert-default alert-dismissible fade show" role="alert">
      <span className="alert-inner--icon"><i className="ni ni-bell-55"></i></span>
      <span className="alert-inner--text"><strong>Tawaran Baru !</strong> Seseorang telah membuat penawaran baru !</span>
      <button type="button" className="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>`,
        "warning",
        1000
      );
    });
  }, []);

  const columns = useMemo(
    () => [
      {
        Header: "Name",
        accessor: "id_user",
      },
      {
        Header: "Tawaran",
        accessor: "penawaran_harga",
      },
      {
        Header: "Tanggal",
        accessor: "created_at",
      },
    ],
    []
  );

  return (
    <div className="card shadow">
      <div className="card-header border-0">
        <div className="row">
          <div className="col-sm-6">
            <h3 className="mb-0">Lelang {lelang?.barang.nama_barang}</h3>
          </div>
          {lelang?.status == "dibuka" && (
            <>
              <Modal closeLink={closeLink} />
              <div className="col-sm-6 text-right">
                <button
                  className="btn btn-icon btn-secondary"
                  type="button"
                  data-toggle="modal"
                  data-target="#modal-notification"
                >
                  <span className="btn-inner--icon">
                    <i className="fas fa-gavel"></i>
                  </span>
                  <span className="btn-inner--text">Tutup</span>
                </button>
              </div>
            </>
          )}
        </div>
      </div>
      {!loading && lelang?.penawaran.length > 0 ? (
        <Table columns={columns} data={lelang?.penawaran} users={users} />
      ) : (
        <div className="p-5">Belum ada penawaran</div>
      )}
    </div>
  );
};

export default AuctionTable;

if (document.getElementById("auction-table")) {
  let auctionId = document
    .getElementById("auction-table")
    .getAttribute("data-auction");

  let closeLink = document
    .getElementById("auction-table")
    .getAttribute("data-close");

  ReactDOM.render(
    <AuctionTable auctionId={auctionId} closeLink={closeLink} />,
    document.getElementById("auction-table")
  );
}
