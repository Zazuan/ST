let page = {
    showCreator: function () {
        $('.modalCreatePage').css("display", "block");
    },
    showEditor: function (data) {
        $('.modalEditPage').css("display", "block");

        $("input[name='page-id']").val(data['id']);
        $("input[name='page-title']").val(data['title']);
        $("textarea[name='page-content']").val(data['content']);
        $("input[name='page-type']").val(data['type']);
        $("#post-edit-status option:selected").text(data['status']);
        $("input[name='page-date']").val(data['date']);
        $("input[name='page-segment']").val(data['segment']);
    },
    createPage: function() {

        let formData = new FormData();

        formData.append('page-title', $("input[name='page-title']").val());
        formData.append('page-content', $("textarea[name='page-content']").val());
        formData.append('page-type', $("input[name='page-type']").val());
        formData.append('page-status', $("#page-create-status option:selected").val());

        $.ajax({
            url: '/admin/page/add/',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(result){
                //console.log(result);
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
        formData.append('page-status', $("#page-edit-status option:selected").val());
        formData.append('page-segment', $("#pageSegment").val());

        $.ajax({
            url: '/admin/page/update/',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(result){
                //console.log(result);
                location.reload();
            }
        });
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

