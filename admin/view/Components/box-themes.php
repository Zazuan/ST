<div class="box" id="box-<?php echo $theme->id ?>" data-title="<?php echo $theme->title ?>">
  <div class="box__header">
    <div class="box__title"><?php echo $theme->title ?></div>
    <div class="box__controls">
        <a onclick="theme.showEditor(<?php echo htmlspecialchars(json_encode($theme)) ?>)">
            <img src="/admin/assets/img/edit.svg"/>
        </a>
        <a onclick="theme.deleteTheme('<?= $theme->dirTheme ?>')">
            <img src="/admin/assets/img/delete.svg"/>
        </a>
    </div>
  </div>
  <div class="box__body">
    <div class="box__row">
      <div class="box__item text text_type2">Описание</div>
      <div class="box__item text text_type1"><?php echo $theme->description ?></div>
    </div>
    <div class="box__row">
      <div class="box__item text text_type2">Автор</div>
      <div class="box__item text text_type1"><?php echo $theme->author ?></div>
    </div>
    <div class="box__row">
      <div class="box__item text text_type2">Версия</div>
      <div class="box__item text text_type1"><?php echo $theme->version ?></div>
    </div>
    <div class="box__row">
      <label class="radio">
        <?php if ($theme->dirTheme == $activeTheme): ?>
            <input class="box__item box__item_radio radio__input" type="radio" name="theme" checked="checked"/>
        <?php else: ?>
            <input class="box__item box__item_radio radio__input" type="radio" name="theme" onclick="theme.setActiveTheme('<?= $theme->dirTheme ?>')"/>
        <?php endif; ?>
          <span class="box__item text text_type2 radio__text">Активировать</span>
      </label>
    </div>

  </div>
  <div class="box__footer">
      <img class="box__picture" src="<?php echo $theme->screen ?>" alt="Theme preview not found"/>
  </div>
</div>