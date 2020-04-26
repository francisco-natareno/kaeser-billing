require('./bootstrap');
require('datatables.net-bs4');

$("document").ready(function() {
  $('table').DataTable({
    lengthChange: false,
    pageLength: 6,
    language: {
      processing:     "Procesando...",
      search:         "Buscar&nbsp;:",
      lengthMenu:     "Mostrar _MENU_ registros",
      info:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      infoEmpty:      "No hay registros",
      infoFiltered:   "(filtrado de _MAX_ registros)",
      infoPostFix:    "",
      loadingRecords: "Cargando...",
      zeroRecords:    "No se encontraron coincidencias",
      emptyTable:     "No hay datos disponibles en esta tabla",
      paginate: {
          first:      "Primero",
          previous:   "Anterior",
          next:       "Siguiente",
          last:       "Último"
      },
      aria: {
          sortAscending:  ": activar para ordenar ascendente",
          sortDescending: ": activar para ordenar descendente"
      }
    }
  });

  setTimeout(function() {
    $("div.alert").remove();
  }, 2000 ); // 2 secs
});