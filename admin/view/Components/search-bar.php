<form class="search-bar" onsubmit="searching.find()">
  <input class="input search-bar__input" type="text" id="search" placeholder="Поиск" onkeyup="searching.find();"/>
  <button class="search-bar__btn" type="button" onclick="searching.find()">
      <img src="/admin/assets/img/search.svg" alt="search"/>
  </button>
</form>
