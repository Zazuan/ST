let post = {
    showCreator: function () {
        $('.modalCreatePost').css("display", "block");
    },
    showEditor: function (data) {
        $('.modalEditPost').css("display", "block");

        $("input[name='post-id']").val(data['id']);
        $("input[name='post-title']").val(data['title']);
        $("input[name='post-content']").val(data['content']);
        $("input[name='post-date']").val(data['date_created']);
        $("input[name='post-article']").val(data['article']);
        $("input[name='post-status']").val(data['status']);
    },
    createPost: function() {

        let formData = new FormData();

        formData.append('post-title', $("input[name='post-title']").val());
        formData.append('post-content', $("input[name='post-content']").val());
        formData.append('post-article', $("input[name='post-article']").val());
        formData.append('post-status', $("input[name='post-status']").val());

        $.ajax({
            url: '/admin/post/add/',
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
    editPost: function() {
        let formData = new FormData();

        formData.append('post-id', $("#postId").val());
        formData.append('post-title', $("#postTitle").val());
        formData.append('post-content', $("#postContent").val());
        formData.append('post-article', $("#postArticle").val());
        formData.append('post-status', $("#postStatus").val());
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
            success: function(data){
                $('#box-' + id).remove();
            }
        });
    },
};

