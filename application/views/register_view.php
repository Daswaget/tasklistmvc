<div class='block2'>
    <div><h5 style='margin-top: 5px;'>Регистрация</h5></div>
    <form action="/register_check" method="post">
        <button type="submit" class="button">Готово</button>
        <input type="text" name="login" maxlength="20" placeholder="Введите логин" style="width: 350px; margin-bottom: 10px;" /><br />
        <input type="password" name="password" maxlength="20" value="<?php $_POST["password"] ?>" placeholder="Введите пароль" style="width: 350px" />
    </form>
    <a href="/main">Назад</a>
</div>