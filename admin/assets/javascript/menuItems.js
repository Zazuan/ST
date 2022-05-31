let menuItems = {

    showCreator: function () {
        $('.modalCreateMenuItem').css("display", "block");
    },
    addItem: function(menuId) {
        let formData = new FormData();

        formData.append('menu_id', menuId);

        if (menuId < 1) {
            return false;
        }

        let _this = this;
        $.ajax({
            url: '/admin/menu/addItem/',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
                console.log(result);
                if (result) {
                    _this.draggable.append(result);
                }
            }
        });
    },
    updateItem: function(itemId, field, element) {
        let formData = new FormData();

        formData.append('item_id', itemId);
        formData.append('field', field);
        formData.append('value', $(element).val());

        if (itemId < 1) {
            return false;
        }

        let _this = this;
        $.ajax({
            url: '/admin/menu/updateItem/',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
                if (result) {

                }
            }
        });
    },
    removeItem: function(itemId) {

        let formData = new FormData();

        formData.append('delete_id', itemId);

        if (itemId < 1) {
            return false;
        }

        $.ajax({
            url: '/admin/menu/deleteItem/',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
                $('.menu-item-' + itemId).remove();
            }
        });
    }
};
