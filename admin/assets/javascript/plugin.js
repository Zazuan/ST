let plugin = {
    installPlugin: function(directory) {
        let formData = new FormData();

        formData.append('directory', directory);

        $.ajax({
            url: '/admin/plugin/install/',
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
    activatePlugin: function(element, pluginId) {
        let checkbox = $(element);
        let active = checkbox.data('active');

        let status;

        active === 0 ? status = 1 : status = 0;

        let formData = new FormData();
        formData.append('plugin_id', pluginId);
        formData.append('plugin_active', status);

        $.ajax({
            url: '/admin/plugin/activate/',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(result){
                checkbox.attr('data-active', status);
            }
        });
    },
    deletePlugin: function(pluginId) {
        let formData = new FormData();

        formData.append('plugin_id', pluginId);

        $.ajax({
            url: '/admin/plugin/delete/',
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
};

