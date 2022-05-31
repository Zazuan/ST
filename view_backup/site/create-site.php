<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>Sample Text</title>

	<link rel="stylesheet" href="../../assets/styles/create-style.css">
	
</head>
<body>
	<header class="header">
		<?php include('header.php'); ?>
	</header>
	<div class="wrapper">
		<p class="wrapper__comment">Создание сайта: ( 1 / 2 )</p>
		<form class="wrapper__create-site">
			<div class="flex-row_aic">
				<input class="wrapper__input" id="name-site" type="text" placeholder="Введите название" required></input>
			</div>
			<div class="cards">
				<div class="card" role="button" tabindex="0" aria-disabled="false" id="first-choose" onclick="javascript:document.forms[0].submit()">
					<div class="card__content">
						<p class="card__title">Создать макет с нуля</p>
						<p class="card__text">
							Создать пустую страницу с возможностью создания и редактирования предложенных элементов
						</p>
					</div>
				</div>
				<div class="card" role="button" tabindex="0" aria-disabled="false" id="second-choose">
					<div class="card__content">
						<p class="card__title">Загрузить макет</p>
						<p class="card__text">
							Загрузите собственный макет в виде папки с файлами html и css
						</p>
					</div>
				</div>
				<div class="card" role="button" tabindex="0" aria-disabled="false" id="third-choose">
					<div class="card__content">
						<p class="card__title">Выбрать готовую тему</p>
						<p class="card__text">
							Выберите готовую тему, из множества уже разработаннах сообществом 
						</p>
					</div>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="../../assets/javascript/index.js"></script>
</body>
</html>
