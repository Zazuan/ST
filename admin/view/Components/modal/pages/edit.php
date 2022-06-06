<link rel="stylesheet" href="/admin/assets/styles/modal.css">
<div class="modal modalEditPage">
    <form class="modal__form" method="POST">
        <h3 class="form__title text">Редактировать страницу</h3>
        <div class="form__field">
            <input id="pageId" class="form__input input" type="hidden" name="page-id" placeholder="Идентификатор" required disabled>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="page-title">Название</label>
            <input id="pageTitle" class="form__input input" type="text" name="page-title" placeholder="Название" required>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="page-content">Контент</label>
            <textarea id="pageContent" class="form__input input" type="text" name="page-content" placeholder="Контент" required></textarea>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="page-type">Тип страницы</label>
            <input id="pageType" class="form__input input" type="text" name="page-type" placeholder="Тип страницы" required>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="page-status">Статус</label>
            <input id="pageStatus" class="form__input input" type="text" name="page-status" placeholder="Статус" required>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="page-date">Дата создания</label>
            <input class="form__input input" type="text" name="page-date" placeholder="Дата создания" required disabled>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="page-segment">Сегмент</label>
            <input id="pageSegment" class="form__input input" type="text" name="page-segment" placeholder="Сегмент" required>
        </div>
        <div class="form__buttons">
            <button class="button form__button" id="close-modal" type="button">Отменить</button>
            <button class="button form__button" type="button" onclick="page.editPage()">Сохранить</button>
        </div>
    </form>
</div>