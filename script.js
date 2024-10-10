$(document).ready(function() {
  $('#contact-form').submit(function(e) {
    e.preventDefault();

    // Obtener los datos del formulario
    var formData = {
      name: $('#name').val(),
      email: $('#email').val(),
      subject: $('#subject').val(),
      message: $('#message').val()
    };

    // Enviar los datos al servidor PHP usando AJAX
    $.ajax({
      type: 'POST',
      url: 'send_mail.php',
      data: formData,
      dataType: 'json',
      encode: true
    })
    .done(function(response) {
      // Mostrar mensaje de éxito o error
      if (response.success) {
        $('#form-message').removeClass('text-danger').addClass('text-success').text('Mensaje enviado correctamente.');
      } else {
        $('#form-message').removeClass('text-success').addClass('text-danger').text('Error al enviar el mensaje: ' + response.error);
      }
    })
    .fail(function(data) {
      console.error('Error al enviar la solicitud AJAX');
    });
  });
});
