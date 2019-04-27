$(function () {
    var card = document.getElementsByClassName('mycard');
    for (var i = 0; i < card.length; i++) {
        card[i].addEventListener("click", function () {
            document.location.href = '/board/' + this.dataset.id;
        }, false);
    }

    var cmds = document.getElementsByClassName('delete_card');
    var i;

    for (i = 0; i < cmds.length; i++) {
        cmds[i].addEventListener('click', function (e) {
            if (confirm('are you sure?')) {
                document.getElementById('form_' + this.dataset.id).submit();
                e.stopPropagation();
            } else {
                e.stopPropagation();
            }
        });
    }
});