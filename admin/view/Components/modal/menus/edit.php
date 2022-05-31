<link rel="stylesheet" href="/admin/assets/styles/modal.css">
<div class="modal modalEditMenuItem">
    <form class="modal__form" method="POST">
        <h3 class="form__title text">Редактировать элемент меню</h3>
        <div class="form__field">
            <input id="menuItemId" class="form__input input" type="hidden" name="menuItem-id" placeholder="Идентификатор" required disabled>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="menuItem-title">Название</label>
            <input id="menuItemTitle" class="form__input input" type="text" name="menuItem-title" placeholder="Название" required>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="menuItem-link">Ссылка</label>
            <input id="menuItemLink" class="form__input input" type="text" name="menuItem-link" placeholder="Ссылка" required>
        </div>
        <div class="form__buttons">
            <button class="button form__button" id="close-modal" type="button">Отменить</button>
            <button class="button form__button" type="button" onclick="">Сохранить</button>
        </div>
    </form>
</div>