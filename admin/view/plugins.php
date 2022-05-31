<!DOCTYPE html>
<html lang="ru" data-page="plugins">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <title>SampleText - Plugins</title>
    <link rel="stylesheet" href="/admin/assets/styles/plugins.css">
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
                <a class="button" onclick="page.showCreator()" id="add-plugin-button">Добавить плагин</a>
            </div>
            <div class="box-row">
                <?php if (!empty($searchText)) {
                    foreach ($plugins as $directory => $plugin) {
                        if (stripos($plugin->title, $searchText) !== false)
                            Theme::block('components/box-plugins', [
                                    'plugin' => $plugin,
                                    'directory' => $directory
                            ]);
                    }
                }
                else {
                    foreach ($plugins as $directory => $plugin) {
                        Theme::block('components/box-plugins', [
                            'plugin' => $plugin,
                            'directory' => $directory
                        ]);
                    }
                }; ?>
            </div>
        </div>
    </div>
</div>
<?php Theme::footer(); ?>