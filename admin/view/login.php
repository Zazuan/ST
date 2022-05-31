<!DOCTYPE html>
<html lang="ru" data-page="login">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <title>SampleText - Login</title>
    <link rel="stylesheet" href="/admin/assets/styles/login.css">
    <script src="/admin/assets/javascript/app.js" async type="module"></script>
  </head>
</html>
<body class="login">
  <form class="auth" action="/admin/auth/" method="POST">
    <h1 class="auth__title text">Авторизация</h1>
    <input class="auth__input input" type="email" name="email" placeholder="Email" required>
    <input class="auth__input input" type="password" name="password"  placeholder="Пароль" required>
    <div class="flex-row flex-row_sb flex-row_ac auth__data">
      <div class="saveme">
        <div class="flex-row flex-row_ac">
          <div class="checkbox">
            <input class="checkbox__input" type="checkbox" name="saveme" id="saveme">
            <label class="text text_type2 checkbox__text" for="saveme">Запомнить меня</label>
          </div>
        </div>
      </div><a class="link text text_type2" href="#">Забыли пароль?</a>
    </div>
    <button class="button auth__button" type="submit">Войти</button>
  </form>
</body>