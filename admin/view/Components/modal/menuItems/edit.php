<link rel="stylesheet" href="/admin/assets/styles/modal.css">
<div class="modal modalEditMenu">
    <form class="modal__form" method="POST">
        <h3 class="form__title text">Редактировать раздел</h3>
        <div class="form__field">
            <input id="menuId" class="form__input input" type="hidden" name="menu-id" placeholder="Идентификатор" required disabled>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="menu-title">Название</label>
            <input id="menuTitle" class="form__input input" type="text" name="menu-title" placeholder="Название" required>
        </div>
        <div class="form__buttons">
            <button class="button form__button" id="close-modal" type="button">Отменить</button>
            <button class="button form__button" type="button" onclick="menu.editMenu()">Сохранить</button>
        </div>
    </form>
</div>