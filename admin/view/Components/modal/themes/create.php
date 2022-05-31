<link rel="stylesheet" href="/admin/assets/styles/modal.css">
<div class="modal modalCreateTheme">
    <form class="modal__form" method="POST">
        <h3 class="form__title text">Добавить тему</h3>
        <div class="form__field">
            <label class="text text_type2" for="theme-title">Название</label>
            <input class="form__input input" type="text" name="theme-title" placeholder="Название" required>
        </div>
        <div class="form__buttons">
            <button class="button form__button" id="close-modal" type="button">Отменить</button>
            <button class="button form__button" type="button" onclick="theme.createTheme()">Создать</button>
        </div>
    </form>
</div>