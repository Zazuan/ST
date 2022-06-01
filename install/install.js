$(function(){
    $(document).on('submit', '#install', function() {
        let formData = new FormData();

        formData.append('host', $("#host").val());
        formData.append('db_name', $("#db_name").val());
        formData.append('username', $("#username").val());
        formData.append('password', $("#password").val());

        formData.append('email', $("#email").val());
        formData.append('pass', $("#pass").val());


        $.ajax({
            url: '/install/',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {
                console.log(result);
            }
        });
    });

    $(document).on('click', '.deleteInstall', function() {
        let formData = new FormData();

        formData.append('delete_install', 1);

        $.ajax({
            url: '/install/',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {
                console.log(result);
                window.location = '/';
            }
        });
    });
});