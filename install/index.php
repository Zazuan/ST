<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../potato/defines.php';

if (version_compare($ver = PHP_VERSION, $req = PHP_MIN, '<')) {
    die(sprintf('You are running PHP %s, but CMS needs at least PHP %s to run.', $ver, $req));
}

$request = new \Potato\core\request\Request();

$isInstall = false;

if (is_file($request->server['DOCUMENT_ROOT'] . '/config/connect.php')) {
    $isInstall = true;
}

if (!empty($request->post())) {
    $delete = $request->post('delete_install');
    if ($delete == 1){
        if (\Potato\helper\FileSystem::delTree($request->server['DOCUMENT_ROOT'] . '/install')) {
            header('Location: /');
            exit;
        }
    }
}

if (!empty($request->post()) and $isInstall == false) {
    $config['host']     = $request->post('host');
    $config['db_name']  = $request->post('db_name');
    $config['username'] = $request->post('username');
    $config['password'] = $request->post('password');
    $config['charset']  = 'utf8';

    $result = [];

    if (!class_exists('\\PDO')) {
        $result['error'][] = 'The server does not have PDO installed';
    }

    $link = mysqli_connect($config['host'], $config['username'], $config['password'], $config['db_name']);
    if (!$link) {
        $result['error'][] = 'Could not connect to database';
    } else {
        mysqli_close($link);

        $sql = file_get_contents('database.sql');

        $db = new \Potato\core\database\Db($config);
        $db->execute($sql);

        $codeConfig = "<?php
return [
    'host'     => '{$config['host']}',
    'db_name'  => '{$config['db_name']}',
    'username' => '{$config['username']}',
    'password' => '{$config['password']}',
    'charset'  => '{$config['charset']}'
];
        ";

        file_put_contents($request->server['DOCUMENT_ROOT'] . '/config/connect.php', $codeConfig);

        header('Location: /install/');
        exit;
    }
}
?>

<!--Добавить Sql строки для установки бд-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Install SampleText</title>

    <link href="/admin/assets/styles/config.css" rel="stylesheet">
    <link href="/admin/assets/styles/settings.css" rel="stylesheet">
    <link href="/admin/assets/styles/login.css" rel="stylesheet">

</head>

<body class="login">
<div class="ui middle aligned center aligned grid">
    <div class="login">
        <?php if ($isInstall): ?>
            <div class="auth">
                <div class="auth__title text">
                    Установка завершена успешно!
                </div>
                <p class="text" style="margin-bottom: 20px; font-size: 14px;">
                    Рекомендуем удалить инсталятор и уже точно начать приключение
                </p>
                <a class="button deleteInstall">
                    Удалить инсталятор
                </a>
            </div>
        <?php else: ?>
            <form id="install" class="auth" method="POST" action="/install/"">
                <h1 class="auth__title text">Установка</h1>
                <p class="text text_type2" style="margin-bottom: 20px; font-size: 14px;">
                    Введите данные для доступа к Вашей БД
                </p>
                <?php if (isset($result['error'])): ?>
                    <div class="ui negative message transition">
                        <i class="close icon"></i>
                        <div class="text">
                            There were errors during the installation
                        </div>
                        <?php foreach ($result['error'] as $error): ?>
                            <p>
                                <?php echo $error ?>
                            </p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                    <input class="input auth__input" type="text" id="host" name="host" placeholder="Host" value="127.0.0.1" required>
                    <input class="input auth__input" type="text" id="db_name" name="db_name" placeholder="Name Database" value="" required>
                    <input class="input auth__input" type="text" id="username" name="username" placeholder="Username" value="root" required>
                    <input class="input auth__input" type="password" id="password" name="password" placeholder="Password" value="">
                <button class="button">
                    Начать приключение
                </button>
            </form>
        <?php endif; ?>
    </div>
</div>

<script src="/admin/assets/static/javascript/jquery-3.6.0.min.js"></script>
<script src="install.js"></script>
</body>
</html>