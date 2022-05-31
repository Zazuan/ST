<link rel="stylesheet" href="/admin/assets/styles/modal.css">
<div class="modal modalEditPost">
    <form class="modal__form" method="POST">
        <h3 class="form__title text">Редактировать публикацию</h3>
        <div class="form__field">
            <input id="postId" class="form__input input" type="hidden" name="post-id" placeholder="Идентификатор" required disabled>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="post-title">Название</label>
            <input id="postTitle" class="form__input input" type="text" name="post-title" placeholder="Название" required>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="post-content">Контент</label>
            <input id="postContent" class="form__input input" type="text" name="post-content" placeholder="Контент" required>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="post-date">Дата создания</label>
            <input id="postDate" class="form__input input" type="text" name="post-date" placeholder="Дата создания" required disabled>
        </div>
        <div class="form__buttons">
            <button class="button form__button" id="close-modal" type="button">Отменить</button>
            <button class="button form__button" type="button" onclick="post.editPost()">Сохранить</button>
        </div>
    </form>
</div>a