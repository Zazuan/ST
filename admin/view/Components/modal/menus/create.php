<link rel="stylesheet" href="/admin/assets/styles/modal.css">
<div class="modal modalCreateMenu">
    <form class="modal__form" method="POST">
        <h3 class="form__title text">Добавить меню</h3>
        <div class="form__field">
            <label class="text text_type2" for="menu-title">Название</label>
            <input class="form__input input" type="text" name="menu-title" placeholder="Название" required>
        </div>
        <div class="form__buttons">
            <button class="button form__button" id="close-modal" type="button">Отменить</button>
            <button class="button form__button" type="button" onclick="menu.createMenu()">Создать</button>
        </div>
    </form>
</div>