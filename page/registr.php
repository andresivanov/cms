<?php
if ($_POST['enter']) {
    echo 'Запрос...';
    exit;
}
?>
<?php
    Head('Регистрация')
?>
<body>
<div class="wrapper">
    <div class="header">
    </div>
<div class="content">
    <?php
        Menu()
    ?>

Заполните форму:
<form method="POST" action="/register">
    <br><input type="text" name="login" required> - Логин
    <br><input type="email" name="email" required> - E-mail
    <br><input type="password" name="password" required> - Пароль
    <br><input type="text" name="name" required> - Имя
    <br><input type="submit" name="enter" value="Реистрация">
    <input type="reset" value="Очистить">
</form>
</div>
</body>
<?php
    Footer()
?>
</html>
