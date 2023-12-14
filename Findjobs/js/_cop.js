$(document).on("submit", "#company", function (e) {
  e.preventDefault();
  formData = new FormData($("#company")[0]);
  $.ajax({
    url: "../controllers/empresa/company_register.php",
    type: "POST",
    dataType: "json",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    success: function (data) {
      // Manejar la respuesta del servidor
      if (data.error) {
        alert(data.alert);
      } else {
        window.location.href = data.alert;
      }
    },
  });
});

//GET form FORM JOBS

$(document).on("click", "#addjob", function (e) {
  e.preventDefault();

  $.ajax({
    url: "../utility/empresa/añadirvacante.php",
    type: "POST",
    dataType: "json",
    cache: false,
    success: function (data) {
      // Manejar la respuesta del servidor
      if (data) {
        $("#tab").html(data.data);
      }
    },
  });
});

// $(document).on("submit", "#add_jobs", function (e) {
//   e.preventDefault();
//   formData = new FormData($(this)[0]);
//   $.ajax({
//     url: "../controllers/addjobs.php",
//     type: "POST",
//     dataType: "json",
//     data: formData,
//     cache: false,
//     processData: false,
//     contentType: false,
//     success: function (data) {
//       console.log(data);
//       // Manejar la respuesta del servidor
//       if (data.error) {
//         alert(data.alert);
//       } else {
//         window.location.href = data.alert;
//       }
//     },
//   });
// });

$(document).on("submit", "#add_jobs", function (e) {
  e.preventDefault();
  formData = new FormData($(this)[0]);
  $.ajax({
    url: "../controllers/empresa/addjobs.php",
    type: "POST",
    dataType: "json",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    success: function (data) {
      console.log(data);
      // Manejar la respuesta del servidor
      if (data.error) {
        alert(data.alert);
      } else {
        window.location.href = data.alert;
      }
    },
  });
});


$(document).on("submit", "#update_jobs", function (e) {
  e.preventDefault();
  formData = new FormData($(this)[0]);
  idi = $(this).attr('value');
  formData.append('action', 'Update')
  formData.append('idpost', idi);
  $.ajax({
    url: "../controllers/empresa/actualizarpost.php",
    type: "POST",
    dataType: "json",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    success: function (data) {
      console.log(data);
      // Manejar la respuesta del servidor
      if (data.error) {
        alert(data.alert);
      } else {
        alert(data.alert);
      }
    },
  });
});

$(document).ready(function(){
  $.ajax({
    url: "../controllers/empresa/jobposted.php",
    dataType: "json",
    success: function (data) {
      console.log(data);
        if (data.data.length > 0) {
            // Inicializar DataTables
            $("#jobs-posted").DataTable({
                ajax: {
                    url: "../controllers/empresa/jobposted.php",
                    paging: true,
                    type: 'json',
                    pageLength: 10,
                    order: [
                        [0, "asc"],
                        [1, "desc"],
                    ],
                    searching: true,
                },
                columns: [
                    { data: "id", colpan:"2" },
                    // { data: "empresa_id" },
                    { data: "titulo", width: "50%"  },
                    {
                        data: "id",
                        width: "40%",
                        targets: -1, // Última columna
                        orderable: false, // No permitir ordenar por esta columna
                        searchable: false, // No permitir búsqueda por esta columna
                        render: function(data, type, row, meta) {
                            var verDetallesUrl = 'ver_detalle.php?id=' + row.id;
                            var eliminarUrl = 'eliminar.php?id=' + row.id;
                            var html = '<a href="' + verDetallesUrl + '" class="btn btn-primary btn-sm me-2">Ver detalles</a>';
                            html += '<a href="' + eliminarUrl + '" class="btn btn-danger btn-sm">Eliminar</a>';
                            return html;
                        }
                    }
                ]
            });
        } else {
            // Mostrar tu propia alerta
            alert("No se encontraron datos.");
        }
    },
    error: function () {
        // Mostrar una alerta en caso de error
        
    }
  });
});

//GETMODAL
//OBTENER EL MODAL
$(document).on("click","#btn-profile-em",function(e){
  e.preventDefault();
  const t={
    action:'GetModal',
    };
    $.ajax({url:"../utility/empresa/modal_update.php",
        type:"POST",
        dataType:"json",
        cache:!1,
        data:t,
        success:function(e){
          e.error?alert(e.alert):
          ($("#modal-em").html(e.alert),
          $("#modalEmpresa").modal("show")
        )}
    });
});

//UPDATE


$(document).on("submit", "#modal-com-update", function (e) {
  e.preventDefault();
  formData = new FormData($(this)[0]);
  formData.append('action', 'Update')
  $.ajax({
    url: "../utility/empresa/modal_update.php",
    type: "POST",
    dataType: "json",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    success: function (data) {
      console.log(data);
      // Manejar la respuesta del servidor
      if (data.error) {
        alert(data.alert);
      } else {
        location.reload();
      }
    },
  });
});

$(document).on("submit", "#update_photo_company", function (e) {
  e.preventDefault();
  formData = new FormData($(this)[0]);
  formData.append('action', 'Actualizar');
  $.ajax({
    url: "../controllers/empresa/updatepic.php",
    type: "POST",
    dataType: "json",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    success: function (data) {
      // Manejar la respuesta del servidor
    
      if (data.error) {
        alert(data.alert);
      } else {
        location.reload();
      }
    },
  });
});


$(document).on("click", "#delete-pic_company", function (e) {
  e.preventDefault(); 
  if(confirm('¿Realmente desea eliminar su foto de perfil?')){
    $.ajax({
      url: "../controllers/empresa/updatepic.php",
      type: "POST",
      dataType: "json",
      data: {
        action: 'Eliminar'
      },
      success: function (data) {
        // Manejar la respuesta del servidor
        if (data.error) {
          alert(data.alert);
        } else {
          location.reload();
        }
      },
    });
  }
});