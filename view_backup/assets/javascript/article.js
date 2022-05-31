$(function() {
    //Open modal
    $(document).on('click', '.add-new-article', function () {
        $('.modalCreateArticle').css("display", "block");
    });

    //Creating new article
    $(document).on('submit', '#modal__create-article', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/admin/article/add/',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function () {
                $('.modal-buttons_p-save').text('Загрузка...');
            },
            success: function (data) {
                console.log(data);
                window.location = '/admin/articles/';
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    // Deleting article
    $(document).on('click', '.deleteArticle', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        console.log('id:' + id);
        $.ajax({
            url: '/admin/article/delete/',
            type: 'POST',
            data: {delete_id : id},
            success: function(data){
                $('#article-' + id).remove();
            }
        });
    });
});