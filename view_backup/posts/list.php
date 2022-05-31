<?php $this->theme->header(); ?>
<?php $this->theme->sidebar(); ?>
<div class="wrapper">
    <div class="category">
        <p class="wrapper__comment">Публикации</p>
        <form class="table-form">
            <div id="post" >
                <div class="posts__title posts">

                </div>
                <?php if(!empty($posts)): ?>
                    <ol id="listItems" class="posts">
                        <?php foreach($posts as $post): ?>
                            <li class="flex-row_sb post-item-<?= $post->id ?>" id="post-<?= $post->id ?>">
                                <img class="edit-pencil" src="/admin/assets/img/pencil.svg" alt="pencil"> <input type="text" value="<?= $post->title ?>">
                                <img src="" alt="#"> <input type="text" value="<?= $post->content ?>">
                                <div class="menu-item-event flex-row_aic">
                                    <button id="<?= $post->id ?>" class="deletePost" onclick="">
                                        <img src="/admin/assets/img/trash.svg" alt="trash">
                                    </button>
                                    <img src="/admin/assets/img/drag.svg" alt="drag">
                                </div>
                            </li>
                        <?php endforeach; ?>
                        <li class="add-new-post">Добавить новую публикацию</li>
                    </ol>
                <?php else: ?>
                    <li class="add-new-post">Добавить новую публикацию</li>
                    <p class="no-data">Публикации отсутствуют</p>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<div id="" class="modal modalCreatePost">
    <div class="modal-content" id="create-post">
        <div class="modal-content__title flex-row_sb">
            <p class="modal-title">Создать публикацию</p>
        </div>
        <div class="modal-content__body">
            <form id="modal__create-post" class="modal__create">
                <div class="form-title">
                    <p class="form-title__title">Название публикации<p>
                        <input class="form-title__input" id="create-post-input-title" type="text" placeholder="Название публикации" name="post-title" required />
                </div>
                <div class="form-title">
                    <p class="form-title__title">Контент публикации<p>
                        <input class="form-title__input" id="create-post-input-title" type="text" placeholder="Контент публикации" name="post-content" required />
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
