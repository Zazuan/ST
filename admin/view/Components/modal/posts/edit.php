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
            <textarea id="postContent" class="form__input input" type="text" name="post-content" placeholder="Контент" required></textarea>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="post-edit-article">Категория</label>
            <select name="post-edit-article" id="post-edit-article" class="select-css">
                <?php foreach ($articles as $article): ?>
                    <option value="<?= $article->id ?>"><?= $article->title ?></option>
                <?php endforeach; ?>
            </select>
            <span class="article_error" style="display: none; color: #C84141">Категория не найдена</span>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="post-edit-status">Статус</label>
            <select name="post-edit-status" id="post-edit-status" class="select-css">
                <option value="Опубликована">Опубликована</option>
                <option value="Черновик">Черновик</option>
            </select>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="post-date">Дата создания</label>
            <input id="postDate" class="form__input input text_type2" type="text" name="post-date" placeholder="Дата создания" required disabled>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="post-segment">Сегмент</label>
            <input id="postSegment" class="form__input input" type="text" name="post-segment" placeholder="Сегмент" required>
        </div>
        <div class="form__buttons">
            <button class="button form__button" id="close-modal" type="button">Отменить</button>
            <button class="button form__button" type="button" onclick="post.editPost()">Сохранить</button>
        </div>
    </form>
</div>a