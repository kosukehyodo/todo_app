$(function () {
    $('.mycard').click(function () {
        document.location.href = '/board/' + this.dataset.id;
    });
});

$(function () {
    $('.delete_card').click(function (element) {
        const board_id = element.target.dataset.id
        
        $(this).parents('.card').remove(); 
        
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
                return false;
            })

            .fail(function () {
                alert('エラー');
            });
        
    });
});