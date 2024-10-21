$(document).ready(function() {
  // Enable upload button when file is selected
  $('#file').change(function() {
      if (this.files.length > 0) {
          $('#upload-button').prop('disabled', false).css('opacity', 1);
      } else {
          $('#upload-button').prop('disabled', true).css('opacity', 0.5);
      }
  });

  // AJAX file upload
  $('#upload-form').submit(function(e) {
      e.preventDefault();
      
      let formData = new FormData(this);
      $.ajax({
          type: 'POST',
          url: 'upload_ajax.php',
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(response) {
              $('#status').html(response);
          },
          error: function() {
              $('#status').html('Terjadi kesalahan saat mengunggah file.');
          }
      });
  });
});
