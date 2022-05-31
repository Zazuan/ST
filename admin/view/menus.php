<!DOCTYPE html>
<html lang="ru" data-page="menus">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <title>SampleText - Menu</title>
    <link rel="stylesheet" href="/admin/assets/styles/menus.css">
    <script src="/admin/assets/javascript/app.js" async type="module"></script>
  </head>
</html>
<body>
<?php Theme::header(); ?>
  <div class="flex-row">
      <?php Theme::sidebar(); ?>
    <div class="main">
      <div class="container">
        <div class="flex-row flex-row_sb flex-row_as">
          <div class="menus">
          <?php if(!empty($menus)): ?>
            <?php foreach ($menus as $menu): ?>
            <div class="menus__item <?php if ($menuId == $menu->id) echo ' menus__item_active'; ?>"
            id="menu-<?= $menu->id ?>">
<!--
                    need to fix:
                    when choose menu to edit -> redirect to ?menu
-->
              <span class="menus__name" onclick="menu.chooseMenu(<?= $menu->id ?>)"><?= $menu->title ?></span>
              <div class="menus__controls">
                  <a onclick="menu.showEditor(<?php echo htmlspecialchars(json_encode($menu)) ?>)"><img src="/admin/assets/img/edit.svg" alt="edit"></a>
                  <a onclick="menu.deleteMenu(<?php echo $menu->id ?>)"><img src="/admin/assets/img/delete.svg" alt="delete"></a>
              </div>
            </div>
            <?php endforeach; ?>
          <?php else: ?>
              <h3 class="form__title text">Нет добавленных меню</h3>
          <?php endif; ?>
            <div class="menus__button">
                <a class="button" onclick="menu.showCreator()">Добавить меню</a>
            </div>
          </div>
          <div class="m-items">
            <div id="draggable" class="edit-menu">
            <?php if(!empty($editMenu)): ?>
                <?php foreach ($editMenu as $item){
                    Theme::block('components/m-items', ['item' => $item]);
                }; ?>
            <?php else: ?>
                <h3 class="form__title text text_type1">Нет добавленных элементов меню</h3>
            <?php endif; ?>
            </div>
            <div class="m-items__button">
                <a class="button" onclick="menuItems.addItem(<?php echo $menuId; ?>)">Добавить элемент</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php Theme::block('components/modal/menus/create'); ?>
  <?php Theme::block('components/modal/menus/edit'); ?>
  <?php Theme::block('components/modal/menuItems/create'); ?>
  <?php Theme::block('components/modal/menuItems/edit'); ?>

<?php Theme::footer(); ?>