<!DOCTYPE html>
<html lang="ru" data-page="themes">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <title>SampleText - Themes</title>
    <link rel="stylesheet" href="/admin/assets/styles/themes.css">
    <script src="/admin/assets/javascript/app.js" async type="module"></script>
  </head>
  <body>
  <?php Theme::header(); ?>
    <div class="flex-row">
        <?php Theme::sidebar(); ?>
      <div class="main">
        <div class="container">
          <div class="search">
              <?php Theme::block('components/search-bar'); ?>
              <a class="button" onclick="theme.showCreator()" id="add-theme-button">Добавить тему</a>
          </div>
          <div class="box-row">
              <?php if (!empty($searchText)) {
                  foreach ($themes as $theme) {
                      if (stripos($theme->title, $searchText) !== false)
                          Theme::block('components/box-themes', [
                                  'theme' => $theme,
                                  'activeTheme' => $activeTheme,
                          ]);
                  }
              }
              else {
                  foreach ($themes as $theme) {
                      Theme::block('components/box-themes', [
                                'theme' => $theme,
                                'activeTheme' => $activeTheme,
                          ]);
                  }
              }; ?>
          </div>
        </div>
      </div>
    </div>
  <?php Theme::block('components/modal/themes/create'); ?>
  <?php Theme::block('components/modal/themes/edit'); ?>
<?php Theme::footer(); ?>