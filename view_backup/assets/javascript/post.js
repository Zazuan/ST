$(function() {
    //Open modal
    $(document).on('click', '.add-new-post', function () {
        $('.modalCreatePost').css("display", "block");
    });

    //Creating new article
    $(document).on('submit', '#modal__create-post', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/admin/post/add/',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function () {
                $('.modal-buttons_p-save').text('Загрузка...');
            },
            success: function (data) {
                console.log(data);
                window.location = '/admin/posts/';
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    // Deleting article
    $(document).on('click', '.deletePost', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        console.log('id:' + id);
        $.ajax({
            url: '/admin/post/delete/',
            type: 'POST',
            data: {delete_id : id},
            success: function(data){
                $('#post-' + id).remove();
            }
        });
    });
});