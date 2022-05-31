$(function(){
    $(document).on('submit', '#form-settings', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/admin/settings/update/',
            type: 'POST',
            data: $(this).serialize(),
            success: function (result) {
                console.log(result);
                window.location = '/admin/settings/';
            },
        });
    });
});