// public/js/custom.js
function forModal(url, title) {
   $('#ajaxModal .modal-title').text(title);
   $.ajax({
       url: url,
       method: 'GET',
       success: function(data) {
           $('#ajaxModal .modal-body').html(data);
           $('#ajaxModal').modal('show');
       },
       error: function(xhr) {
           console.error('Error loading form:', xhr);
       }
   });
}
