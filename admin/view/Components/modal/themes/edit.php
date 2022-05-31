<link rel="stylesheet" href="/admin/assets/styles/modal.css">
<div class="modal modalEditTheme">
    <form class="modal__form" method="POST">
        <h3 class="form__title text">Редактировать тему</h3>
        <div class="form__field">
            <input id="themeId" class="form__input input" type="hidden" name="theme-id" placeholder="Идентификатор" required disabled>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="theme-title">Название</label>
            <input id="themeTitle" class="form__input input" type="text" name="theme-title" placeholder="Название" required>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="theme-content">Контент</label>
            <input id="themeContent" class="form__input input" type="text" name="theme-content" placeholder="Контент" required>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="theme-date">Дата создания</label>
            <input id="themeDate" class="form__input input" type="text" name="theme-date" placeholder="Дата создания" required disabled>
        </div>
        <div class="form__buttons">
            <button class="button form__button" id="close-modal" type="button">Отменить</button>
            <button class="button form__button" type="button" onclick="post.editPost()">Сохранить</button>
        </div>
    </form>
</div>