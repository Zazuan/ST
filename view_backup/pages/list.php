<?php $this->theme->header(); ?>
<?php $this->theme->sidebar(); ?>
<div class="wrapper">
    <div class="pages">
        <p class="wrapper__comment">Страницы сайта</p>
        <div id="pages__data-js">
            <?php foreach ($pages as $page): ?>
            <div class="page flex-row_sb" id="page-<?= $page->id ?>">
                <div class="page__title flex-row_sb">
                    <p class="title__text" id="page-title-<?= $page->id ?>"><?= $page->title ?></p>
                </div>
                <div class="page__right">
                    <div class="right__options">
                        <a id="<?= $page->id ?>" >Открыть в редакторе</a>
                        <a id="<?= $page->id ?>" class="editPage">Изменить</a>
                        <a id="<?= $page->id ?>" class="deletePage">Удалить</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="pages__add-page">
            <a id="add-page-button" class="add-page__link"">
                <img src="../assets/img/add-button.svg">
            </a>
        </div>
    </div>
 </div>


<div id="" class="modal modalCreatePage">
    <div class="modal-content" id="create-page">
        <div class="modal-content__title flex-row_sb">
            <p class="modal-title">Создать страницу</p>
        </div>
        <div class="modal-content__body">
            <form id="modal__create-page" class="modal__create">
                <div class="form-title">
                    <p class="form-title__title">Название страницы<p>
                    <input class="form-title__input" id="create-page-input-title" type="text" placeholder="Название страницы" name="page-title" required />
                </div>
                <div class="modal-buttons flex-row_sb">
                    <div class="modal-buttons__close">
                        <a>Отменить</a>
                    </div>
                    <button class="modal-buttons__apply options-button__button" data-loading-text="Отправка..." type="submit">
                        <p class="modal-buttons_p-save">Сохранить</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="" class="modal modalEditPage">
    <div class="modal-content" id="edit-page">
        <div class="modal-content__title flex-row_sb">
            <p class="modal-title">Изменить страницу</p>
        </div>
        <div class="modal-content__body">
            <form id="modal__edit-page" class="modal__edit">
                <input class="form-title__input" id="edit-page-input-id" type="hidden" name="page-id" required />
                <div class="form-title">
                    <p class="form-title__title">Название страницы<p>
                    <input class="form-title__input" id="edit-page-input-title" type="text" placeholder="Название страницы" name="page-title" required />
                </div>
                <div class="modal-buttons flex-row_sb">
                    <div class="modal-buttons__close">
                        <a>Отменить</a>
                    </div>
                    <button class="modal-buttons__apply options-button__button" data-loading-text="Отправка..." type="submit">
                        <p class="modal-buttons_p-save">Сохранить</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->theme->footer(); ?>