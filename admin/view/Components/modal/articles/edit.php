<link rel="stylesheet" href="/admin/assets/styles/modal.css">
<div class="modal modalEditArticle">
    <form class="modal__form" method="POST">
        <h3 class="form__title text">Редактировать раздел</h3>
        <div class="form__field">
            <input id="articleId" class="form__input input" type="hidden" name="article-id" placeholder="Идентификатор" required disabled>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="article-title">Название</label>
            <input id="articleTitle" class="form__input input" type="text" name="article-title" placeholder="Название" required>
        </div>
        <div class="form__field">
            <label class="text text_type2" for="article-segment">Сегмент</label>
            <input id="articleSegment" class="form__input input" type="text" name="article-segment" placeholder="Сегмент" required>
        </div>
        <div class="form__buttons">
            <button class="button form__button" id="close-modal" type="button">Отменить</button>
            <button class="button form__button" type="button" onclick="article.editArticle()">Сохранить</button>
        </div>
    </form>
</div>