$(function() {

    //Open modal
    $(document).on('click', '#add-page-button', function() {
        $('.modalCreatePage').css("display", "block");
    });
    $(document).on('click', '.editPage', function() {
        let id = $(this).attr('id');
        let title = $('#page-title-' + id).text();

        $('.modalEditPage').css("display", "block");
        $('#edit-page-input-id').val(id);
        $('#edit-page-input-title').val(title);
    });

    //Creating new page
    $(document).on('submit', '#modal__create-page', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/admin/page/add/',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function () {
                $('.modal-buttons_p-save').text('Загрузка...');
            },
            success: function (data) {
                console.log(data);
                window.location = '/admin/pages/';
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    //Updating page
    $(document).on('submit', '#modal__update-page', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/admin/page/update/',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function () {
                $('.modal-buttons_p-save').text('Загрузка...');
            },
            success: function (data) {
                console.log(data);
                //window.location = '/admin/pages/';
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    // Deleting page
    $(document).on('click', '.deletePage', function(event){
        var id = $(this).attr('id');
        console.log('id:' + id);
        $.ajax({
            url: '/admin/page/delete/',
            type: 'POST',
            data: {delete_id : id},
            success: function(data){
                $('#page-' + id).remove();
            }
        });
    });
});