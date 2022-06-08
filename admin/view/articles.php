<!DOCTYPE html>
<html lang="ru" data-page="cat">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <title>SampleText - Articles</title>
    <link rel="stylesheet" href="/admin/assets/styles/pages.css">
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
              <a class="button" onclick="article.showCreator()">Добавить раздел</a>
          </div>
          <div class="box-row">
              <?php if (!empty($searchText)) {
                  foreach ($articles as $article) {
                      if (stripos($article->title, $searchText) !== false)
                          Theme::block('components/box-cat', [
                                  'article' => $article,
                                  'baseUrl' => $baseUrl
                          ]);
                  }
              }
              else {
                  foreach ($articles as $article) {
                      Theme::block('components/box-cat', [
                          'article' => $article,
                          'baseUrl' => $baseUrl
                      ]);
                  }
              }; ?>
          </div>
        </div>
      </div>
    </div>
  <?php Theme::block('components/modal/articles/create'); ?>
  <?php Theme::block('components/modal/articles/edit'); ?>
<?php Theme::footer(); ?>