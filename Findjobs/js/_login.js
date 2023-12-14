
$(document).on("submit", "#login", function (e) {
    e.preventDefault();
    
    var data = $(this).serialize();
    $.ajax({
      url: "controllers/login.php",
      type: "POST",
      dataType: "json",
      data: data,
      cache: false,
      success: function (data) {
        // Manejar la respuesta del servidor 
        if (data.error) {
          alert(data.alert);
        }else{
          window.location.href = data.redirectUrl;
        }
        
      },
    });
  });

  // $(document).on("submit", "#formulario", function (e) {
  //   e.preventDefault();
  //   formData = new FormData($(this)[0]);
  //   formData.append('action', 'Actualizar');
  //   $.ajax({
  //     url: "../controllers/usuario/registrar_usuario.php",
  //     type: "POST",
  //     dataType: "json",
  //     cache: false,
  //     contentType: false,
  //     processData: false,
  //     data: formData,
  //     success: function (respuesta) {
  //       // Manejar la respuesta del servidor
       
  //       if (respuesta.error) {
  //         alert(respuesta.alert);
  //       }else{
  //         window.location.href = respuesta.redirectUrl;
  //       }
  //     },
  //   });
  // });

  $(document).on("submit", "#formulario", function (e) {
    e.preventDefault();
    formData = new FormData($(this)[0]);
    formData.append('action', 'Actualizar');
    $.ajax({
      url: "../controllers/usuario/registrar_usuario.php",
      type: "POST",
      dataType: "json",
      cache: false,
      contentType: false,
      processData: false,
      data: formData,
      success: function (respuesta) {
        // Manejar la respuesta del servidor
       
        if (respuesta.error) {
          alert(respuesta.alert);
        }else{
          window.location.href = respuesta.redirectUrl;
        }
      },
    });
  });
  