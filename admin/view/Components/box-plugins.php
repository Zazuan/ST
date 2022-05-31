<div class="box">
  <div class="box__header">
    <div class="box__title"><?php echo $plugin['title'] ?></div>
    <div class="box__controls">
        <?php if (isset($plugin['is_install'])): ?>
            <?php if ($plugin['is_active']): ?>
            <div class="checkbox form-control__item">
                <input class="checkbox__input" type="checkbox" name="activate-<?php echo $plugin['plugin_id'] ?>" id="activate-<?php echo $plugin['plugin_id'] ?>" onclick="plugin.activatePlugin(this, <?php echo $plugin['plugin_id'] ?>)" data-active="<?php echo $plugin['is_active'] ?>" checked/>
                <label class="text text_type2 checkbox__text" for="activate-<?php echo $plugin['plugin_id'] ?>">Активирован</label>
            </div>
            <?php else: ?>
                <div class="checkbox form-control__item">
                    <input class="checkbox__input" type="checkbox" name="activate-<?php echo $plugin['plugin_id'] ?>" id="activate-<?php echo $plugin['plugin_id'] ?>" onclick="plugin.activatePlugin(this, <?php echo $plugin['plugin_id'] ?>)" data-active="<?php echo $plugin['is_active'] ?>"/>
                    <label class="text text_type2 checkbox__text" for="activate-<?php echo $plugin['plugin_id'] ?>">Активировать</label>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
  </div>
  <div class="box__body">
    <div class="box__row">
      <div class="box__item text text_type2">Автор</div>
      <div class="box__item text text_type1"><?php echo $plugin['author'] ?></div>
    </div>
    <div class="box__row">
      <div class="box__item text text_type2">Последнее обновление</div>
      <div class="box__item text text_type1"><?php echo $plugin['update'] ?></div>
    </div>
    <div class="box__row">
      <div class="box__item text text_type2">Описание</div>
    </div>
    <div class="box__row">
      <div class="box__item text text_type3"><?php echo $plugin['description'] ?></div>
    </div>
  </div>
  <div class="box__footer">
      <?php if (isset($plugin['is_install'])): ?>
          <a class="button" onclick="plugin.deletePlugin('<?php echo $plugin['plugin_id'] ?>')">Удалить</a>
      <?php else: ?>
          <a class="button" onclick="plugin.installPlugin('<?php echo $directory ?>')">Установить</a>
      <?php endif; ?>
  </div>
</div>