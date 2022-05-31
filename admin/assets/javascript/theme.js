let theme = {
    showCreator: function () {

        alert('Add in directory: source/theme with new theme.json file')

        // $('.modalCreateTheme').css("display", "block");
    },
    showEditor: function (data) {

        alert('edit in: themePath/theme.json')

        // $('.modalEditTheme').css("display", "block");
        //
        // $("input[name='theme-id']").val(data['id']);
        // $("input[name='theme-title']").val(data['title']);
        // $("input[name='theme-active']").val(data['active']);
    },
    editTheme: function() {
        // let formData = new FormData();
        //
        // formData.append('theme-id', $("#themeId").val());
        // formData.append('theme-title', $("#themeTitle").val());
        // formData.append('theme-content', $("#themeContent").val());
        //
        // $.ajax({
        //     url: '/admin/theme/update/',
        //     type: 'POST',
        //     data: formData,
        //     cache: false,
        //     processData: false,
        //     contentType: false,
        //     success: function(result){
        //         console.log(result);
        //         location.reload();
        //     }
        // });
    },

    setActiveTheme: function(element, theme) {
        let formData = new FormData();
        let button = $(element);

        formData.append('theme', theme);

        $.ajax({
            url: '/admin/theme/activateTheme/',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(result){
                location.reload();
            }
        });
    }
};

