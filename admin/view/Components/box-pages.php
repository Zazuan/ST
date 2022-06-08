<div class="box" id="box-<?php echo $page->id ?>" data-title="<?php echo $page->title ?>">
  <div class="box__header">
    <div class="box__title" id="page-title"><?php echo $page->title ?></div>
    <div class="box__controls">
        <a onclick="page.showEditor(<?php echo htmlspecialchars(json_encode($page)) ?>)"><img src="/admin/assets/img/edit.svg" alt="edit"/></a>
        <a onclick="page.deletePage(<?php echo $page->id ?>)"><img src="/admin/assets/img/delete.svg" alt="remove"/></a>
    </div>
  </div>
  <div class="box__body">
    <div class="box__row">
      <div class="box__item text text_type2">Идентификатор</div>
      <div class="box__item text text_type1" id="page-id"><?php echo $page->id ?></div>
    </div>
    <div class="box__row">
      <div class="box__item text text_type2">Тип</div>
      <div class="box__item text text_type1"><?php echo $page->type ?></div>
    </div>
    <div class="box__row">
      <div class="box__item text text_type2">Статус</div>
      <div class="box__item text text_type1"><?php echo $page->status ?></div>
    </div>
    <div class="box__row">
      <div class="box__item text text_type2">Последнее изменение</div>
      <div class="box__item text text_type1"><?php echo $page->date ?></div>
    </div>
    <div class="box__row">
      <div class="box__item text text_type2">
          <?php if ($page->type != 'single') :?>
              <a class="text text_type3" href="<?php echo '/' . $page->segment ?>">
                  <?php echo $baseUrl . '/' . $page->segment ?>
              </a>
          <?php endif; ?>
      </div>
    </div>
  </div>
<!--  <div class="box__footer"><a class="button" href="#">Открыть в редакторе</a></div>-->
</div>