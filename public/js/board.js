// $(function () {
//     var card = document.getElementsByClassName('mycard');
//     for (var i = 0; i < card.length; i++) {
//         card[i].addEventListener("click", function () {
//             document.location.href = '/board/' + this.dataset.id;
//         }, false);
//     }
// });

$(function () {
    $('.delete_card').click(function (element) {
        const board_id = element.target.dataset.id
        
        $(this).parents('.card').remove(); 
        
        // Ajax通信を開始する
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/board/' + board_id,
            type: 'POST',
            data: {
                'id': board_id,
                '_method': 'DELETE'
            } 
        })

            .done(function () {
                console.log('成功')
            })

            .fail(function () {
                alert('エラー');
            });
        
    });
});