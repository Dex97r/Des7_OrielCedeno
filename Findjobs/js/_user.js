$(document).on("submit", "#modal-uinfo", function (e) {
    e.preventDefault();
   
    $.ajax({
      url: "../controllers/usuario/putProfileData.php",
      type: "POST",
      dataType: "json",
      data: $(this).serialize(),
      cache: false,
      success: function (data) {
        // Manejar la respuesta del servidor
        console.log(data);
  
        if (data.error) {
          alert(data.alert);
        } else {
          location.reload();
        }
      },
    });
  });

  
$(document).on("submit", "#contact", function (e) {
  e.preventDefault();
 
  $.ajax({
    url: "../controllers/usuario/putContact.php",
    type: "POST",
    dataType: "json",
    data: $(this).serialize(),
    cache: false,
    success: function (data) {
      // Manejar la respuesta del servidor
      console.log(data);

      if (data.error) {
        alert(data.alert);
      } else {
        location.reload();
      }
    },
  });
});

$(document).on("submit", "#studies-Insert", function (e) {
  e.preventDefault();
 
  $.ajax({
    url: "../controllers/usuario/postStudies.php",
    type: "POST",
    dataType: "json",
    data: $(this).serialize(),
    cache: false,
    success: function (data) {
      // Manejar la respuesta del servidor
      console.log(data);

      if (data.error) {
        alert(data.alert);
      } else {
        location.reload();
      }
    },
  });
});
$(document).on("submit", "#studies-Update", function (e) {
  e.preventDefault();
  var value  = $("#modalUpdateLabel").attr('value');
  formData = new FormData($(this)[0]);
 
  formData.append("value", value);
 
  $.ajax({
    url: "../controllers/usuario/putStudies.php",
    type: "POST",
    dataType: "json",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    success: function (e) {
      if (data.error) {
        alert(data.alert);
      } else if(confirm(data.alert)||true) {
        location.reload();
      }
    },
  });
});

$(document).on("click", "#_dele_s", function(e) {
  e.preventDefault();
  let val = $(this).attr('value');
  if (confirm("¿Eliminar esto?")) {
      $.ajax({
          url: "../controllers/usuario/destroy_s.php",
          type: "POST",
          dataType: "json",
          data:{
            val: val
          },
          cache: false,
          success: function(data) {
              console.log(data);
              if (data.error) {
                  alert(data.alert);
              } else {
                  if (confirm(data.alert) || true) {
                      location.reload();
                  }
              }
          }
      });
  }
});

//OBTENER EL MODAL
$(document).on("click","#academic_education_i",function(e){
  e.preventDefault();
  const t={
    action:$(this).attr("value")?"Update":"Insert",
    data:$(this).attr("value")||undefined};
    $.ajax({url:"../controllers/gets/modalE.php",
        type:"POST",
        dataType:"json",
        cache:!1,
        data:t,
        success:function(e){
          e.error?alert(e.alert):
          ($("#modal").html(e.alert),
          $("#modalstudies").modal("show")
        )}
    });
});


//SKILLS
$(document).on("click","#skill-modal",function(e){
  e.preventDefault();
  const t={
    action:$(this).attr("value")?"Update":"Insert",
    data:$(this).attr("value")||undefined};
    $.ajax({url:"../controllers/usuario/skills_m.php",
        type:"POST",
        dataType:"json",
        cache:!1,
        data:t,
        success:function(e){
          e.error?alert(e.alert):
          ($("#modal").html(e.alert),
          $("#SkillModal").modal("show")
        )}
    })
});


$(document).on("submit", "#modal-Insert", function (e) {
  e.preventDefault();
  var value  = $("#InsertModalLabel").attr('value');
  formData = new FormData($(this)[0]);
  formData.append("action", value);
 
  $.ajax({
    url: "../controllers/usuario/skills_methods.php",
    type: "POST",
    dataType: "json",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    success: function (data) {
      // Manejar la respuesta del servidor
      console.log(data);

      if (data.error) {
        alert(data.alert);
      } else {
        location.reload();
      }
    },
  });
});


$(document).on("click", "#d-skill", function (e) {
  e.preventDefault();
  var value  = $(this).attr('value');
 
  if(confirm('Esta seguro que desea eliminar esta habilidad')){
    $.ajax({
      url: "../controllers/usuario/skills_methods.php",
      type: "POST",
      dataType: "json",
      data: {
        action: 'Delete',
        val: value
      },
      cache: false,
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


//VACANTES DISPONIBLES

$(document).on("click", "#vacantesd", function (e) {
  e.preventDefault();
  

  $.ajax({
    url: "../utility/usuario/vacantes.php",
    type: "POST",
    dataType: "html",
    cache: false,
    success: function (data) {
      // Manejar la respuesta del servidor
      $("#tab-u").html(data);
    },
  });
});

//POSTULAR

$(document).on("submit", "#postular-usuario", function (e) {
  e.preventDefault();
  var value  = $('#btn-postular').attr('value');
  formData = new FormData($(this)[0]);
  formData.append("valor", value);
 
  $.ajax({
    url: "../controllers/usuario/postular.php",
    type: "POST",
    dataType: "json",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    success: function (data) {
      // Manejar la respuesta del servidor
      console.log(data);

      if (data.error) {
        alert(data.alert);
      } else {
        location.reload();
      }
    },
  });
});


$(document).on("submit", "#update_photo", function (e) {
  e.preventDefault();
  formData = new FormData($(this)[0]);
  formData.append('action', 'Actualizar');
  $.ajax({
    url: "../controllers/usuario/updatepic.php",
    type: "POST",
    dataType: "json",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    success: function (data) {
      // Manejar la respuesta del servidor
      console.log(data);

      if (data.error) {
        alert(data.alert);
      } else {
        location.reload();
      }
    },
  });
});


$(document).on("click", "#delete-pic", function (e) {
  e.preventDefault(); 
  $.ajax({
    url: "../controllers/usuario/updatepic.php",
    type: "POST",
    dataType: "json",
    data: {
      action: 'Eliminar'
    },
    cache: false,
    success: function (data) {
      // Manejar la respuesta del servidor
      console.log(data);

      if (data.error) {
        alert(data.alert);
      } else {
        location.reload();
      }
    },
  });
});

//SOLICITUDES
$(document).on("click", "#rqs", function (e) {
  e.preventDefault();
  

  $.ajax({
    url: "../utility/usuario/solicitudes.php",
    type: "POST",
    dataType: "html",
    cache: false,
    success: function (data) {
      // Manejar la respuesta del servidor
      $("#tab-u").html(data);
    },
  });
});

//ELIMINAR POSTULACION

//SOLICITUDES
$(document).on("click", "#btn-dl-postulacion", function (e) {
  e.preventDefault(); 
  $.ajax({
    url: "../utility/usuario/delete_post.php",
    type: "POST",
    data:{
      id: $(this).attr('value')
    },
    dataType: "html",
    cache: false,
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