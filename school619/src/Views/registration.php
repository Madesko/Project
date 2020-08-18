<h3>Форма регистрации</h3>
<p><? echo $reg_result; ?></p>
<form action="/registration" method="post">
    <input type="text" name="staff_name" placeholder="Имя">
    <input type="text" name="staff_surname" placeholder="Фамилия">
    <input type="text" name="subdivision" placeholder="Подразделение">
    <input type="text" name="post" placeholder="Должность">
    <input type="email" name="email" required placeholder="email@email.com">
    <input type="password" name="password" required placeholder="Пароль">
    <input type="submit" value="Отправить">
</form>