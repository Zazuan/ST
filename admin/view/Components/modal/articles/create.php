<link rel="stylesheet" href="/admin/assets/styles/modal.css">
<div class="modal modalCreateArticle">
    <form class="modal__form" method="POST">
        <h3 class="form__title text">Создать раздел</h3>
        <div class="form__field">
            <label class="text text_type2" for="article-title">Название</label>
            <input class="form__input input" type="text" name="article-title" placeholder="Название" required>
        </div>
        <div class="form__buttons">
            <button class="button form__button" id="close-modal" type="button">Отменить</button>
            <button class="button form__button" type="button" onclick="article.createArticle()">Создать</button>
        </div>
    </form>
</div>