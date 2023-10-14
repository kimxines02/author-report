jQuery(document).ready(function ($) {
  $('#addAuthorModalBtn').click(function () {
    $('#addAuthorModal').modal();
  });
});

// MODAL VIEW 
function openAuthorModal(authorData) {
    var modal = new bootstrap.Modal(document.getElementById('authorModal'), { backdrop: 'static' });
    var authorForm = document.getElementById('authorForm');
    var authorDetails = JSON.parse(authorData);

    var authorNameSelect = document.getElementById('authorName');
    document.getElementById('bookTitle').value = authorDetails.bookTitle;

    for (var i = 0; i < authorNameSelect.options.length; i++) {
        if (authorNameSelect.options[i].value === authorDetails.name) {
            authorNameSelect.options[i].selected = true;
        }
    }

    document.getElementById('saveChanges').addEventListener('click', function () {
        var updatedAuthorData = {
            name: authorNameSelect.value,
            bookTitle: document.getElementById('bookTitle').value,
        };
        
        modal.hide();
    });

    modal.show();
}

var eyeLinks = document.querySelectorAll('.eye-link');
eyeLinks.forEach(function(link) {
    link.addEventListener('click', function(event) {
        event.preventDefault();
        var authorData = this.getAttribute('data-author-details');
        openAuthorModal(authorData);
    });
});