{
  const urlParams = new URLSearchParams(window.location.search);

  //   console.log({ urlParams });
  //   // Get the value of the 'type' parameter
  //   const buttons = urlParams.get("buttons");
  //   const order = urlParams.get("order");
  var queryString = $("script[src*='js/myscript.js']").attr("src");
  var dataTable = { dom: "Bfrtip" };
  const order = document.currentScript.dataset.order;
  const orderType = document.currentScript.dataset.ordertype
    ? document.currentScript.dataset.ordertype
    : "desc";
  const buttons = document.currentScript.dataset.buttons;
  if (order && order !== null && order !== undefined) {
    dataTable.order = [[parseInt(order), orderType]];
  }
  if (buttons && buttons !== null && order !== undefined) {
    dataTable.buttons = [
      {
        extend: "csv",
        className: "d-none",
      },
      {
        extend: "excel",
        className: "d-none",
      },
      {
        extend: "pdf",
        className: "d-none",
      },
    ];
  } else {
    dataTable.buttons = [
      {
        extend: "csv",
        className: "d-none",
      },
      {
        extend: "excel",
        className: "d-none",
      },
      {
        extend: "pdf",
        className: "d-none",
      },
    ];
  }
  console.log({ order, buttons, orderType, dataset: document.currentScript.dataset });
  $(document).ready(function () {
    $(".table").DataTable(dataTable);

    var table = $("#datatable-ecommerce-list").DataTable();
    // hide-load-table

    $(".dataTables_filter label").html("");
    $(".hide-load-table").html("");
    // Refresh DataTables search functionality after modifications
    $("#has-search input").on("keyup", function () {
      table.search(this.value).draw();
    });
    $("#csvButton").on("click", function () {
      table.button(".buttons-csv").trigger();
    });
    $("#excelButton").on("click", function () {
      table.button(".buttons-excel").trigger();
    });
    $("#pdfButton").on("click", function () {
      table.button(".buttons-pdf").trigger();
    });
  });
}
