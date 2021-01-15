function initTable() {
  //   $.noConflict();
  tableLenguajes = $("#tableLenguajes").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: " " + base_url + "lenguaje/getLenguajes",
      dataSrc: "",
    },
    columns: [
      { data: "id_lenguaje" },
      { data: "nombre" },
      { data: "link" },
      { data: "estado" },
      { data: "opciones" },
    ],
    resonsieve: "true",
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });
}
function setLenguaje() {
  var formLenguaje = document.querySelector("#formLenguaje");
  formLenguaje.onsubmit = function (e) {
    // console.log("IN...");
    e.preventDefault();
    var intIdLenguaje = document.querySelector("#idLenguaje").value;
    var strNombre = document.querySelector("#txtNombre").value;
    var strLink = document.querySelector("#txtLink").value;
    if (strNombre == "" || strLink == "") {
      alert("Campos obligatorios");
      return false;
    }
    var request = window.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP");
    var ajaxUrl = base_url + "lenguaje/setLenguaje";
    var formData = new FormData(formLenguaje);
    request.open("POST", ajaxUrl, true);
    request.send(formData);
    // console.log(request);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        // console.log(request.responseText);
        var objData = JSON.parse(request.responseText);
        if (objData.status) {
          $("#modalFormLenguaje").modal("hide");
          formLenguaje.reset();
          alert("Guardado!");
          tableLenguajes.ajax.reload();
        } else {
          alert("Error!");
        }
      }
    };
  };
}
var tableLenguajes;

document.addEventListener("DOMContentLoaded", function () {
  console.log(base_url);
  initTable();
  setLenguaje();
});

