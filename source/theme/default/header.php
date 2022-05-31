<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php Theme::title() ?></title>

    <?php Asset::render('css'); ?>
</head>
<body class="">
<div class="wrapper">
    <header class="header wrapper">
        <div class="header__logo">
            <a href="/"><img class="logo" alt="logo" src="<?php get_url() ?>assets/img/minimø.png"></a>
        </div>
        <nav class="header__nav">
            <?php foreach(Menu::getItems() as $item):?>
                <a href="#" class=""><?= $item->title ?></a>
            <?php endforeach; ?>
<!--            <a href="#" class="">photodiary</a>-->
<!--            <a href="#" class="">music</a>-->
<!--            <a href="#" class="">travel</a>-->
        </nav>
    </header>