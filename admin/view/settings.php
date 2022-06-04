<!DOCTYPE html>
<html lang="ru" data-page="settings">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <title>SampleText - Settings</title>
    <link rel="stylesheet" href="/admin/assets/styles/settings.css">
    <script src="/admin/assets/javascript/app.js" async type="module"></script>
  </head>
  <?php Theme::header() ?>
  <div class="flex-row">
    <?php Theme::sidebar(); ?>
    <div class="main">
      <div class="container">
        <form class="settings" id="form-settings">
          <h1 class="settings__title">Настройки сайта</h1>
            <?php foreach ($settings as $setting): ?>
                <?php if($setting->name != 'Active theme'): ?>
                    <div class="settings__item">
                        <label class="text text_type2" for="name"><?= $setting->name ?></label>
                        <input class="input settings__input" name="<?= $setting->name ?>"
                           value="<?= $setting->value ?>" type="text">
                    </div>
                <?php else: ?>
                    <div class="settings__item">
                        <label class="text text_type2" for="name"><?= $setting->name ?></label>
                        <input class="input settings__input text_type2" name="<?= $setting->name ?>"
                            value="<?= $setting->value ?>" type="text" disabled>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
          <button class="button settings__button" type="submit">Сохранить изменения</button>
        </form>
      </div>
    </div>
  </div>
<?php Theme::footer(); ?>