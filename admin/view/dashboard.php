<!DOCTYPE html>
<html lang="ru" data-page="dashboard">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <title>SampleText - Dashboard</title>
    <link rel="stylesheet" href="/admin/assets/styles/dashboard.css">
    <script src="/admin/assets/javascript/app.js" async type="module"></script>
</head>
<body class="app notranslate">
    <?php Theme::header(); ?>
    <div class="flex-row">
        <?php Theme::sidebar(); ?>
      <div class="main">
        <div class="container">
          <div class="grid">
              <?php Theme::block('components/control-panel') ?>
              <?php Theme::block('components/activity') ?>
              <?php Theme::block('components/publish') ?>
              <?php Theme::block('components/optimization') ?>
              <?php Theme::block('components/users', [
                      'users' => $users,
              ]) ?>
          </div>
        </div>
      </div>
    </div>
    <?php Theme::footer(); ?>