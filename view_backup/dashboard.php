<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>Sample Text</title>

	<link rel="stylesheet" href="/admin/assets/styles/style.css">
</head>
<body>
    <?php $this->theme->header(); ?>
	<div class="wrapper">
		<p class="wrapper__comment">Мои сайты:</p>
		<div class="cards">
            <?php foreach ($sites as $site): ?>
            <section id="card-'.$row['id'].'" class="card">
                <div class="card__content">
                    <p class="card__title" id="name-site"><?= $site->title ?></p>
                    <div class="card__footer flex-row_sb">
                        <div class="card__edit flex-row">
                            <img src="/admin/assets/img/pencil.svg">
                            <a href="/admin/settings/">Редактировать сайт</a>
                        </div>
                        <div class="card__preview">
                            <img src="/admin/assets/img/preview.svg">
                            <a href="">Предпросмотр</a>
                        </div>
                    </div>
                </div>
            </section>
            <?php endforeach; ?>
			<div class="card card-new flex-row_aic">
				<a href="create-site">
					<img src="../admin/assets/img/add-button.svg">
				</a>
			</div>
		</div>
	</div>
</body>
</html>



        	