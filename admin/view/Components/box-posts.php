<div class="box" id="box-<?php echo $post->id ?>" data-title="<?php echo $post->title ?>">
  <div class="box__header">
    <div class="box__title"><?php echo $post->title ?></div>
    <div class="box__controls">
        <a onclick="post.showEditor(<?php echo htmlspecialchars(json_encode($post)) ?>)"><img src="/admin/assets/img/edit.svg" alt="edit"/></a>
        <a onclick="post.deletePost(<?php echo $post->id ?>)"><img src="/admin/assets/img/delete.svg" alt="remove"></a>
    </div>
  </div>
  <div class="box__body">
      <div class="box__row">
          <div class="box__item text text_type2">Идентификатор</div>
          <div class="box__item text text_type1" id="post-id"><?php echo $post->id ?></div>
      </div>
    <div class="box__row">
      <div class="box__item text text_type2">Категория</div>
      <div class="box__item text text_type1"><?php echo $post->article_title ?></div>
    </div>
    <div class="box__row">
      <div class="box__item text text_type2">Статус</div>
      <div class="box__item text text_type1"><?php echo $post->status ?></div>
    </div>
    <div class="box__row">
      <div class="box__item text text_type2">Создана</div>
      <div class="box__item text text_type1"><?php echo $post->date_created ?></div>
    </div>
    <div class="box__row">
      <div class="box__item text text_type2">
          <a class="text text_type3" href="<?php echo '/post/' . $post->segment ?>">
              <?php echo $baseUrl . '/post/' . $post->segment ?>
          </a>
      </div>
    </div>
  </div>
</div>