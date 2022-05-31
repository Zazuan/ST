
<div class="users formx">
  <div class="formx__header">
    <div class="formx__title">Пользователи</div>
    <div class="formx__action">
        <a href="#">
            <img src="/admin/assets/img/expand.svg"/>
        </a>
    </div>
  </div>
  <div class="formx__main">
      <?php foreach ($users as $user):?>
    <div class="users__wrap flex-row flex-row_sb">
      <div class="users__title text text_type1"><?php echo $user->email ?></div>
      <div class="users__text text text_type2"><?php echo $user->date_reg ?></div>
      <div class="users__text text text_type2"><?php echo $user->role ?></div>
    </div>
    <hr class="formx__hr"/>
      <?php endforeach; ?>
  </div>
</div>