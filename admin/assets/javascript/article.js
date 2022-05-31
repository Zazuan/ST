let article = {
    showCreator: function () {
        $('.modalCreateArticle').css("display", "block");
    },
    showEditor: function (data) {
        $('.modalEditArticle').css("display", "block");

        $("input[name='article-id']").val(data['id']);
        $("input[name='article-title']").val(data['title']);
    },
    createArticle: function() {

        let formData = new FormData();

        formData.append('article-title', $("input[name='article-title']").val());

        $.ajax({
            url: '/admin/article/add/',
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
    editArticle: function() {
        let formData = new FormData();

        formData.append('article-id', $("#articleId").val());
        formData.append('article-title', $("#articleTitle").val());

        $.ajax({
            url: '/admin/article/update/',
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
    deleteArticle: function(data) {
        let id = data;

        $.ajax({
            url: '/admin/article/delete/',
            type: 'POST',
            data: {delete_id : id},
            success: function(data){
                $('#box-' + id).remove();
            }
        });
    },
};

