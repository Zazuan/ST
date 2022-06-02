<?php $this->theme->header(); ?>
<?php Asset::css('assets/styles/singlestyle.css'); ?>
    <article class="main-post">
        <div class="main-post__main-image" style="background-image: url(<?php get_url() ?>assets/img/image.png);"></div>
        <div class="content">
            <a class="main-post__category link" href="#">photodiary</a>
            <h1 class="main-post__title h1-title">The perfect weekend getaway</h1>
            <p class="text main-post__text">
                <?php Page::content();?>
            </p>
            <p class="text main-post__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna
                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            <div class="main-post__image" style="background-image: url(<?php get_url() ?>assets/img/single1.png);"></div>
            <div class="main-post__image" style="background-image: url(<?php get_url() ?>assets/img/single2.png);"></div>
            <div class="main-post__image" style="background-image: url(<?php get_url() ?>assets/img/single3.png);"></div>
            <p class="text italictext main-post__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna
                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            <p class="text main-post__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna
                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis
                et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit
                aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi
                nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
            </p>
            <div class="links flex-row .flex-row_r">
                <a class="links__link link">Share</a>
                <a class="links__logo" href="#"> <img class="fb" alt="facebook" src="assets/img/fb.png"></a>
                <a class="links__logo" href="#"> <img class="tw" alt="twitter" src="assets/img/tw.png"></a>
                <a class="links__logo" href="#"> <img class="google" alt="google" src="assets/img/g+.png"></a>
                <a class="links__logo" href="#"> <img class="tumblr" alt="tumblr" src="assets/img/tumblr.png"></a>
                <a class="links__logo" href="#"> <img class="pinterest" alt="pinterest" src="assets/img/pinterest.png"></a>
            </div>
        </div>
    </article>
</div>
<div class="posts">
    <div class="content">
        <p class="text link content__text">you may also like</p>
        <div class="posts__image flex-row .flex-row_sb">
            <article class="post">
                <div class="post__image" style="background-image: url(<?php get_url() ?>assets/img/smallsingle1.png);"></div>
                <h1 class="post__title h1-title ">Cold winter days</h1>
            </article>
            <article class="post">
                <div class="post__image" style="background-image: url(<?php get_url() ?>assets/img/smallsingle2.png);"></div>
                <h1 class="post__title h1-title">A day exploring the Alps</h1>
            </article>
            <article class="post">
                <div class="post__image" style="background-image: url(<?php get_url() ?>assets/img/smallsingle3.png);"></div>
                <h1 class="post__title h1-title">American dream</h1>
            </article>
        </div>
    </div>
</div>
<div class="comments">
    <div class="content">
        <p class="link content__text">2 comments</p>
        <article class="comment flex-row">
            <div class="comment__image" style="background-image: url(<?php get_url() ?>assets/img/user-img1.png);"></div>
            <div class="comment__content">
                <p class="comment__nickname">John Doe</p>
                <p class="text comment__text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo!</p>
                <a class="comment__reply link">Reply</a>
            </div>
        </article>
        <article class="comment flex-row">
            <div class="comment__image" style="background-image: url(<?php get_url() ?>assets/img/user-img2.png);"></div>
            <div class="comment__content">
                <p class="comment__nickname">John Doe</p>
                <p class="text comment__text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                    accusantium doloremque.</p>
                <a class="comment__reply link">Reply</a>
            </div>
        </article>
        <article class="comment flex-row">
            <div class="comment__image" style="background-image: url(<?php get_url() ?>assets/img/user-img3.png);"></div>
            <div class="form-comment">
                <input type="text" name="reply-text" class="form-comment__input link" placeholder="Join the discussion" required="">
            </div>
        </article>
        <div class="connect flex-row flex-row_r">
            <a class="connect_link links__link link">connected with</a>
            <a class="links__logo" href="#"> <img class="tw" alt="twitter" src="<?php get_url() ?>assets/img/tw.png"></a>
            <a class="links__logo" href="#"> <img class="fb" alt="facebook" src="<?php get_url() ?>assets/img/fb.png"></a>
        </div>
    </div>
</div>
<?php $this->theme->footer(); ?>