let menu = {
    chooseMenu: function(data) {
        console.log(data);
        window.location = '/admin/menus/?menu_id=' + data;
    },
    showCreator: function () {
        $('.modalCreateMenu').css("display", "block");
    },
    showEditor: function (data) {
        $('.modalEditMenu').css("display", "block");

        $("input[name='menu-id']").val(data['id']);
        $("input[name='menu-title']").val(data['title']);
    },
    createMenu: function() {

        let formData = new FormData();

        formData.append('menu-title', $("input[name='menu-title']").val());

        $.ajax({
            url: '/admin/menu/add/',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(result){
                location.reload();
            }
        });
    },

    editMenu: function() {
        let formData = new FormData();

        formData.append('menu-id', $("#menuId").val());
        formData.append('menu-title', $("#menuTitle").val());
        $.ajax({
            url: '/admin/menu/update/',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(result){
                console.log(result);
                location.reload();
            }
        });
    },

    deleteMenu: function(data) {
        let id = data;

        $.ajax({
            url: '/admin/menu/delete/',
            type: 'POST',
            data: {delete_id : id},
            success: function(data){
                $('#menu-' + id).remove();
            }
        });
    },
};























$(function() {

    //Open modal
    $(document).on('click', '#add-menu-button', function () {
        $('.modalCreateMenu').css("display", "block");
    });

    //Creating menu
    $(document).on('submit', '#modal__create-menu', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/admin/menu/add/',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function () {
                $('.modal-buttons_p-save').text('Загрузка...');
            },
            success: function (data) {
                if (data > 0) {
                    location.reload();
                }
            }
        });
    });

    // Add menu item
    $(document).on('click', '.add-item-button', function (e) {
        e.preventDefault();

        var menuId = $('#sortMenuId').val();
        //console.log(menuId);
        $.ajax({
            url: '/admin/menu/addItem/',
            type: 'POST',
            data: {menu_id : menuId},
            success: function (data) {
                //console.log(data);
                //$('#listItems').append(data);
                location.reload();
            }
        });
    });

    // Delete menu item
    $(document).on('click', '.button-remove', function (e) {
        e.preventDefault();

        var delete_id = $('.button-remove').attr('id');

        $.ajax({
            url: '/admin/menu/deleteItem/',
            type: 'POST',
            data: {'delete_id' : delete_id},
            success: function (data) {
                $('.menu-item-' + delete_id).remove();
            }
        });
    });

});
