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
            <label class="text text_type2" for="post-article">Раздел</label>
            <input class="form__input input " type="text" name="post-article" placeholder="Раздел" required>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="post-status">Статус</label>
            <input class="form__input input " type="text" name="post-status" placeholder="Статус" required>
        </div>
        <div class="form__buttons">
            <button class="button form__button" id="close-modal" type="button">Отменить</button>
            <button class="button form__button" type="button" onclick="post.createPost()">Создать</button>
        </div>
    </form>
</div>