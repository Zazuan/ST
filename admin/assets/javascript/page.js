let page = {
    showCreator: function () {
        $('.modalCreatePage').css("display", "block");
    },
    showEditor: function (data) {
        $('.modalEditPage').css("display", "block");

        $("input[name='page-id']").val(data['id']);
        $("input[name='page-title']").val(data['title']);
        $("input[name='page-content']").val(data['content']);
        $("input[name='page-type']").val(data['type']);
        $("input[name='page-status']").val(data['status']);
        $("input[name='page-date']").val(data['date']);
    },
    createPage: function() {

        let formData = new FormData();

        formData.append('page-title', $("input[name='page-title']").val());
        formData.append('page-content', $("input[name='page-content']").val());
        formData.append('page-type', $("input[name='page-type']").val());

        $.ajax({
            url: '/admin/page/add/',
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
    editPage: function() {
        let formData = new FormData();

        formData.append('page-id', $("#pageId").val());
        formData.append('page-title', $("#pageTitle").val());
        formData.append('page-content', $("#pageContent").val());
        formData.append('page-type', $("#pageType").val());
        formData.append('page-status', $("#pageStatus").val());

        $.ajax({
            url: '/admin/page/update/',
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
    editPageSegment: function () {

    },
    deletePage: function(data) {
        let id = data;

        $.ajax({
            url: '/admin/page/delete/',
            type: 'POST',
            data: {delete_id : id},
            success: function(data){
                $('#box-' + id).remove();
            }
        });
    },
};

