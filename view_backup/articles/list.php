<?php $this->theme->header(); ?>
<?php $this->theme->sidebar(); ?>
<div class="wrapper">
    <div class="category">
        <p class="wrapper__comment">Разделы</p>
        <form class="table-form">
            <div id="category" >
                <div class="category__title articles">

                </div>
                    <?php if(!empty($articles)): ?>
                        <ol id="listItems" class="articles">
                        <?php foreach($articles as $article): ?>
                            <li class="flex-row_sb article-item-<?= $article->id ?>" id="article-<?= $article->id ?>">
                                <img class="edit-pencil" src="/admin/assets/img/pencil.svg" alt="pencil"> <input type="text" value="<?= $article->title ?>">
                                <img src="" alt="#"> <input type="text" value="<?= $article->title ?>">
                                <div class="menu-item-event flex-row_aic">
                                    <button id="<?= $article->id ?>" class="deleteArticle" onclick="">
                                        <img src="/admin/assets/img/trash.svg" alt="trash">
                                    </button>
                                    <img src="/admin/assets/img/drag.svg" alt="drag">
                                </div>
                            </li>
                        <?php endforeach; ?>
                            <li class="add-new-article">Добавить новый раздел</li>
                        </ol>
                    <?php else: ?>
                        <li class="add-new-article">Добавить новый раздел</li>
                        <p class="no-data">Разделы отсутствуют</p>
                    <?php endif; ?>
            </div>
        </form>
    </div>
 </div>

<div id="" class="modal modalCreateArticle">
    <div class="modal-content" id="create-article">
        <div class="modal-content__title flex-row_sb">
            <p class="modal-title">Создать раздел</p>
        </div>
        <div class="modal-content__body">
            <form id="modal__create-article" class="modal__create">
                <div class="form-title">
                    <p class="form-title__title">Название раздела<p>
                        <input class="form-title__input" id="create-article-input-title" type="text" placeholder="Название раздела" name="article-title" required />
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
