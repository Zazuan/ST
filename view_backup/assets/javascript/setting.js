$(function(){
    $(document).on('submit', '#form-settings', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/admin/settings/update/',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function () {
                $('#settings-optionsButton').text('Загрузка...');
            },
            success: function (result) {
                console.log(result);
                window.location = '/admin/settings/';
                $('#settings-optionsButton').text('Сохранить');
            },
        });
    });
});