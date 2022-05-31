
<div class="m-items__row menu-item-<?php echo $item->id ?>" data-id="<?= $item->id ?>">
  <div class="m-items__subrow">
    <div class="m-items__edit">
        <img src="/admin/assets/img/edit.svg" alt="edit"/>
    </div>
    <div class="m-items__name">
        <input class="input settings__input" name="<?= $item->title ?>"
               value="<?= $item->title ?>" type="text" onchange="menuItems.updateItem(<?= $item->id ?>, 'title', this)">
    </div>
  </div>
  <div class="m-items__url">
      <input class="input settings__input" name="<?= $item->link ?>"
             value="<?= $item->link ?>" type="text" onchange="menuItems.updateItem(<?= $item->id ?>, 'link', this)">
  </div>
  <div class="m-items__controls">
      <img src="/admin/assets/img/delete.svg" alt="delete" onclick="menuItems.removeItem(<?php echo $item->id ?>)"/>
      <img class="dragdrop" src="/admin/assets/img/dragdrop.svg" alt="dragdrop"/>
  </div>
</div>