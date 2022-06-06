
<div class="pusblish formx">
  <div class="formx__header">
    <div class="formx__title">Добавить публикацию</div>
    <div class="formx__action"><a href="/admin/posts/"><img src="/admin/assets/img/expand.svg"/></a></div>
  </div>
  <div class="formx__main">
    <form class="formx_form-publish">
      <input class="input formx__input" id="name" type="text" name="post-title" placeholder="Название"/>
      <textarea class="input formx__textarea" id="content" type="text" name="post-content" placeholder="Контент"></textarea>
      <div class="formx__buttons"> 
        <button class="button formx__button" type="button">Загрузить фото</button>
        <button class="button formx__button" type="button" onclick="post.createPost()">Опубликовать</button>
      </div>
    </form>
  </div>
</div>