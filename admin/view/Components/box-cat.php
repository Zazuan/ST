<div class="box" id="box-<?php echo $article->id ?>">
  <div class="box__header">
    <div class="box__title"><?php echo $article->title ?></div>
    <div class="box__controls">
        <a onclick="article.showEditor(<?php echo htmlspecialchars(json_encode($article)) ?>)"><img src="/admin/assets/img/edit.svg" alt="edit"/></a>
        <a onclick="article.deleteArticle(<?php echo $article->id ?>)"><img src="/admin/assets/img/delete.svg" alt="remove"/></a>
    </div>
  </div>
  <div class="box__body">
    <div class="box__row">
      <div class="box__item text text_type2">Идентификатор</div>
      <div class="box__item text text_type1" id="article-id"><?php echo $article->id ?></div>
    </div>
    <div class="box__row">
      <div class="box__item text text_type2">Публикаций</div>
      <div class="box__item text text_type1"><?php echo countPostsByArticle($article->id, $posts) ?></div>
    </div>
  </div>
</div>