<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>Sample Text - Login</title>

	<link rel="stylesheet" href="/admin/assets/styles/login.css">
	
</head>
<body>
	<div class="container">
		<form class="form" role="form" method="POST" action="/admin/auth/">
			<h2 class="form__heading">SampleText</h2>
			<input class="inputs__email input" name="email" type="email" placeholder="Email" required autofocus>
			<input class="inputs__password input" name="password" type="password" placeholder="Password" required>
			<div class="flex-row_aic">
				<button class="form__button" type="submit">Авторизоваться</button>
			</div>
			
		</form>
	</div>
</body>
</html>