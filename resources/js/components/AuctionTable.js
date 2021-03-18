import React, { useMemo, useState } from "react";
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

const AuctionTable = ({ auctionId }) => {
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

  useState(() => {
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
  </div>`, 'warning', 1000);
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
        <h3 className="mb-0">Lelang {lelang?.barang.nama_barang}</h3>
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

  ReactDOM.render(
    <AuctionTable auctionId={auctionId} />,
    document.getElementById("auction-table")
  );
}
