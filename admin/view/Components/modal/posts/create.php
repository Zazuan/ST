<link rel="stylesheet" href="/admin/assets/styles/modal.css">
<div class="modal modalCreatePost">
    <form class="modal__form" method="POST">
        <h3 class="form__title text">Добавить публикацию</h3>
        <div class="form__field">
            <label class="text text_type2" for="post-title">Название</label>
            <input class="form__input input" type="text" name="post-title" placeholder="Название" required>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="post-content">Контент</label>
            <textarea class="form__input input " type="text" name="post-content" placeholder="Контент" required></textarea>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="post-create-article">Категория</label>
            <select name="post-create-article" id="post-create-article" class="select-css" required>
                <?php foreach ($articles as $article): ?>
                    <option value="<?= $article->id ?>"><?= $article->title ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="post-create-status">Статус</label>
            <select name="post-create-status" id="post-create-status" class="select-css">
                <option value="Опубликована">Опубликована</option>
                <option value="Черновик">Черновик</option>
            </select>
        </div>
        <div class="form__buttons">
            <button class="button form__button" id="close-modal" type="button">Отменить</button>
            <button class="button form__button" type="button" onclick="post.createPost()">Создать</button>
        </div>
    </form>
</div>