
    <?php $this->theme->header(); ?>
    <?php $this->theme->sidebar(); ?>

	<div class="wrapper">
        <div class="settings">
            <p class="wrapper__comment">Мой сайт</p>
            <div class="wrapper__upper">
                <div class="wrapper__head">
                    <form class="wrapper__options-button" id="form-settings">
                    <?php foreach ($settings as $setting): ?>
                        <div class="head__content-settings">
                            <p class="head__title"><?= $setting->name ?></p>
                            <input class="wrapper__title" id="name-site" type="text"
                                   placeholder="Мой первый сайт" name="<?= $setting->name ?>"
                                   value="<?= $setting->value ?>">
                        </div>
                    <?php endforeach; ?>
                        <button id="settings-optionsButton" class="options-button__button flex-row_sb" type="submit">
                            <p>Сохранить</p>
                        </button>
                    </form>
                </div>
            </div>
        </div>
	</div>

    <?php $this->theme->footer(); ?>
<!--	<div id="openModal" class="modal">-->
<!---->
<!--		<div class="modal-content" id="create-category">-->
<!--			<div class="modal-content__title flex-row_sb">-->
<!--				<p class="modal-title">Создать раздел</p>-->
<!--				<div class="modal-close">-->
<!--					<img src="../assets/img/cross.svg"></img>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="modal-content__body">-->
<!--				<form id="modal__create-category" class="modal__create" method="POST">-->
<!--					<div class="form-f-param form-title">-->
<!--						<p class="form-title__title">Название раздела<p>-->
<!--						<input class="form-title__input" id="category-input-title" type="text" placeholder="Название раздела" name="category-title" required />-->
<!--					</div>-->
<!--					<div class="modal-buttons flex-row_sb">-->
<!--						<div class="modal-buttons__close">-->
<!--							 <a rel="modal:close">Отменить</a>-->
<!--						</div>-->
<!--						<button class="modal-buttons__apply options-button__button" data-loading-text="Отправка..." type="submit">-->
<!--							<p class="modal-buttons_p-save">Сохранить</p>-->
<!--						</button>-->
<!--					</div>-->
<!--				</form>-->
<!--			</div>-->
<!--		</div>-->
<!--		<div class="modal-content" id="create-post">-->
<!--			<div class="modal-content__title flex-row_sb">-->
<!--				<p class="modal-title">Создать публикацию</p>-->
<!--				<div class="modal-close">-->
<!--					<img src="../assets/img/cross.svg"></img>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="modal-content__body">-->
<!--				<form id="modal__create-post" class="modal__create" method="POST">-->
<!--					<div class="form-title">-->
<!--						<p class="form-title__title">Название страницы<p>-->
<!--						<input class="form-title__input" id="post-input-title" type="text" placeholder="Название страницы" name="post-title" required />-->
<!--					</div>-->
<!--					<div class="modal-buttons flex-row_sb">-->
<!--						<div class="modal-buttons__close">-->
<!--							 <a rel="modal:close">Отменить</a>-->
<!--						</div>-->
<!--						<button class="modal-buttons__apply options-button__button" data-loading-text="Отправка..." type="submit">-->
<!--							<p class="modal-buttons_p-save">Сохранить</p>-->
<!--						</button>-->
<!--					</div>-->
<!--				</form>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
