<?php $this->theme->header(); ?>
<?php $this->theme->sidebar(); ?>


<div class="wrapper">
    <p class="wrapper__comment">Меню</p>
    <div class="row">
        <div class="col-4">
            <h4 class="heading-setting-section">
                Список меню
                <a class="btn btn-primary" id="add-menu-button"> Добавить меню </a>
            </h4>
            <?php if(!empty($menus)): ?>
                <div class="menu-list">
                    <ul class="nav flex-column">
                        <?php foreach($menus as $menu): ?>
                            <li class="nav-item">
                                <a class="nav-link<?php if ($menuId == $menu->id) echo ' active'; ?>" href="?menu_id=<?php echo $menu->id ?>">
                                    <?php echo $menu->title ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php else: ?>
                <div class="empty-items">
                    <p>Меню отсутствуют</p>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-8">
            <?php if ($menuId !== null): ?>
                <h4 class="heading-setting-section"> Изменить меню </h4>
                <input type="hidden" id="sortMenuId" value="<?php echo $menuId ?>" />
                <ol id="listItems" class="edit-menu">
                    <?php foreach($editMenu as $item):?>
                        <li class="menu-item-<?= $item->id ?>" data-id="<?= $item->id ?>">
                            <i class="icon-pencil icons"></i> <input type="text" value="<?= $item->title ?>">
                            <i class="icon-link icons"></i> <input type="text" value="<?= $item->link ?>">
                            <div class="menu-item-event">
                                <button class="button-remove" id="<?= $item->id ?>">
                                    <i class="icon-trash icons"></i>
                                </button>
                                <i class="icon-cursor-move icons"></i>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ol>
                <button class="add-item-button">
                    <i class="icon-plus icons"></i> Добавить элемент меню
                </button>
            <?php endif; ?>
        </div>
    </div>

<div id="" class="modal modalCreateMenu">
    <div class="modal-content" id="create-menu">
        <div class="modal-content__title flex-row_sb">
            <p class="modal-title">Создать меню</p>
        </div>
        <div class="modal-content__body">
            <form id="modal__create-menu" class="modal__create">
                <div class="form-title">
                    <p class="form-title__title">Название меню<p>
                        <input class="form-title__input" id="create-menu-input-title" type="text" placeholder="Название меню" name="menu-title" required />
                </div>
                <div class="modal-buttons flex-row_sb">
                    <div class="modal-buttons__close">
                        <a>Отменить</a>
                    </div>
                    <button class="modal-buttons__apply options-button__button" type="submit">
                        <p class="modal-buttons_p-save">Сохранить</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->theme->footer(); ?>
