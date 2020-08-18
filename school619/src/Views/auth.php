<style type="text/css" media="all">
@import url("/assets/css/login-page.css");
</style>
<div class="content">
            <div id="login">
                <div class="container">
                    <div id="login-row" class="row justify-content-center align-items-center">
                        <div id="login-column" class="col-md-6">
                            <div id="login-box" class="col-md-12">
                                <form id="login-form" class="form" action="/login" method="POST">
                                    <h3 class="text-center text-info">Войти</h3>
                                    <div class="form-group">
                                        <label for="username" class="text-info">Логин</label><br>
                                        <input type="username" name="email" placeholder="Имя пользователя" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="text-info">Пароль</label><br>
                                        <input type="password" name="password" id="password" placeholder="Пароль" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="remember-me" class="text-info"><span>Запомнить</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                        <input type="submit" name="submit" class="btn btn-info btn-md" value="Войти">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="assets/js/libs/jquery-3.3.1.min.js"></script>
<script src="assets/js/libs/bootstrap-4.3.1.js"></script>