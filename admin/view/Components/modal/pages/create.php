<link rel="stylesheet" href="/admin/assets/styles/modal.css">
<div class="modal modalCreatePage">
    <form class="modal__form" method="POST">
        <h3 class="form__title text">Создать страницу</h3>
        <div class="form__field">
            <label class="text text_type2" for="page-title">Название</label>
            <input class="form__input input" type="text" name="page-title" placeholder="Название" required>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="page-content">Контент</label>
            <textarea class="form__input input " type="text" name="page-content" placeholder="Контент" required></textarea>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="page-type">Тип страницы</label>
            <input class="form__input input " type="text" name="page-type" placeholder="Тип страницы" required>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="page-create-status">Статус</label>
            <select name="page-create-status" id="page-create-status" class="select-css">
                <option value="Опубликована">Опубликована</option>
                <option value="Черновик">Черновик</option>
            </select>
        </div>
        <div class="form__buttons">
            <button class="button form__button" id="close-modal" type="button">Отменить</button>
            <button class="button form__button" type="button" onclick="page.createPage()">Создать</button>
        </div>
    </form>
</div>