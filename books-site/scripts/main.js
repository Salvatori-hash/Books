let delBook = document.querySelectorAll('.delete');
let closeBtn = document.querySelector('.alert > .close');

delBook.forEach(function(element) {
    element.addEventListener('click', function(event) {
        currentId = event.target.getAttribute('data-del');

        if (confirm('Удалить книгу?')) {
            element.href = "/books-site/index.php?del=ok&id=" + currentId;
        }
    });
});

if (closeBtn != null && closeBtn != undefined) {
    closeBtn.addEventListener('click', function() {
        document.querySelector('.alert').style.display = 'none';
    });
}