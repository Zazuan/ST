<?php $this->theme->header(); ?>
<link rel="stylesheet" href="/admin/assets/styles/modal.css">
<div id="openModal" class="modal">
    <div class="modal-content" id="create-page">
        <div class="modal-content__title flex-row_sb">
            <p class="modal-title">Создать страницу</p>
        </div>
        <div class="modal-content__body">
            <form id="modal__create-page" class="modal__create">
                <div class="form-title">
                    <p class="form-title__title">Название страницы<p>
                        <input class="form-title__input" id="page-input-title" type="text" placeholder="Название страницы" name="page-title" required />
                </div>
                <div class="modal-buttons flex-row_sb">
                    <div class="modal-buttons__close">
                        <a href="/admin/settings/">Отменить</a>
                    </div>
                    <button class="modal-buttons__apply options-button__button" data-loading-text="Отправка..." type="submit">
                        <p class="modal-buttons_p-save">Сохранить</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>