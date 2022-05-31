<div class="box" id="box-<?php echo $data['id'] ?>">
  <div class="box__header">
    <div class="box__title"><?php echo $data['title'] ?></div>
    <div class="box__controls">
        <a onclick="post.showEditor(<?php echo htmlspecialchars(json_encode($data)) ?>)"><img src="/admin/assets/img/edit.svg" alt="edit"/></a>
        <a onclick="post.deletePost(<?php echo $data['id'] ?>)"><img src="/admin/assets/img/delete.svg" alt="remove"></a>
    </div>
  </div>
  <div class="box__body">
      <div class="box__row">
          <div class="box__item text text_type2">Идентификатор</div>
          <div class="box__item text text_type1" id="post-id"><?php echo $data['id'] ?></div>
      </div>
    <div class="box__row">
      <div class="box__item text text_type2">Категория</div>
      <div class="box__item text text_type1"><?php echo $data['article'] ?></div>
    </div>
    <div class="box__row">
      <div class="box__item text text_type2">Статус</div>
      <div class="box__item text text_type1"><?php echo $data['status'] ?></div>
    </div>
    <div class="box__row">
      <div class="box__item text text_type2">Создана</div>
      <div class="box__item text text_type1"><?php echo $data['date_created'] ?></div>
    </div>
  </div>
</div>