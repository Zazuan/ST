let post = {
    showCreator: function () {
        $('.modalCreatePost').css("display", "block");
    },
    showEditor: function (data) {
        $('.modalEditPost').css("display", "block");

        let text = data['status'];

        $("input[name='post-id']").val(data['id']);
        $("input[name='post-title']").val(data['title']);
        $("textarea[name='post-content']").val(data['content']);
        // $("select[name='post-edit-article'] option['value=''']").append($('<option>', {
        //     value: data['article_id'],
        //     text: data['article_title'],
        //     attr: selected,
        // }));
        //$("select[name='post-edit-status']").find($("option[value=data['status']]").prop("selected", true));
        //$("select[name='post-edit-status'] option:contains(text)").prop("selected", true);
        $("input[name='post-date']").val(data['date_created']);
        $("input[name='post-segment']").val(data['segment']);
    },
    createPost: function() {

        let formData = new FormData();

        formData.append('post-title', $("input[name='post-title']").val());
        formData.append('post-content', $("textarea[name='post-content']").val());
        formData.append('post-article', $("#post-create-article option:selected").val());
        formData.append('post-status', $("#post-create-status option:selected").val());

        $.ajax({
            url: '/admin/post/add/',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'JSON',
            success: function(data){
                console.log(data);
                if (data.result === 'undefined')
                    $('.article_error').css("display", "block");
                else location.reload();
            }
        });
    },
    editPost: function() {
        let formData = new FormData();

        formData.append('post-id', $("#postId").val());
        formData.append('post-title', $("#postTitle").val());
        formData.append('post-content', $("#postContent").val());
        formData.append('post-article', $("#post-edit-article option:selected").val());
        formData.append('post-status', $("#post-edit-status option:selected").val());
        formData.append('post-segment', $("#postSegment").val());
        formData.append('post-date', $("#postDate").val());

        $.ajax({
            url: '/admin/post/update/',
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
    deletePost: function(data) {
        let id = data;

        $.ajax({
            url: '/admin/post/delete/',
            type: 'POST',
            data: {delete_id : id},
            success: function(result){
                $('#box-' + id).remove();
            }
        });
    },
    showResources: function (data) {
        $('.modalAddResourceToPost').css("display", "block");
    },
    addResource: function (resourceId, postId) {
        let formData = new FormData();

        formData.append('post-id', postId);
        formData.append('resource-id', resourceId);

        $.ajax({
            url: '/admin/post/addResource/',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(result){
                $('.modalAddResourceToPost').css("display", "none");
                location.reload();
            }
        });
    }

};

