$(function() {
    var group = $("#draggable").sortable({
        axis: 'y',
        group: '#draggable',
        handle: '.dragdrop',
        stop: function (event, ui) {
            let data = group.sortable('toArray', {attribute: 'data-id'});
            let jsonString = JSON.stringify(data, null, ' ');

            let formData = new FormData();
            formData.append('data', jsonString);
            formData.append('menu_id', $('#draggable').val());

            $.ajax({
                url: '/admin/menu/sortItems/',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(result){

                }
            });
        }
    });
});