jQuery(document).ready(function ($) {
  $('#addAuthorModalBtn').click(function () {
    $('#addAuthorModal').modal();

    // create function on submit form to author_report_manager_create() function
    $('#addAuthorModalForm').submit(function (e) {
      e.preventDefault();
      var data = $(this).serialize();
      $.ajax({
        url: '/wp-admin/admin-ajax.php?action=author_report_manager_create',
        type: 'post',
        data: data,
        success: function (response) {
          console.log(response);
          $('#addAuthorModal').modal('hide');
          $('#addAuthorModalForm')[0].reset();
          alert('Author added successfully!');
        }
      });
    });


  })
});