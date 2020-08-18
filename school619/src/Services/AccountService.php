<?php
namespace Alexandr\Vatutin\School619\Services;
use Alexandr\Vatutin\School619\Base\Service;

class AccountService extends Service
{
    const REGISTRATION_SUCCESS = 'Регистрация прошла успешно';
    const REGISTRATION_ERROR = 'Ошибка регистрации';
    const USER_EXISTS = 'Пользователь с таким логином уже существует';

    const AUTH_LOGIN_ERROR = 'Ошибка LOGIN авторизации';
    const AUTH_PWD_ERROR = 'Ошибка PWD авторизации';
    const AUTH_SUCCESS = 'Авторизация прошла успешно';

    public function addUser(array $reg_data){


        $email = $reg_data['email'];
        if ($this->getUser($email)) return self::USER_EXISTS;
        $pwd = $reg_data['password'];
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);

        $user_sql = 'INSERT INTO staff(email, password, staff_surname, staff_name, subdivision, post)
                        VALUES (:email, :password, :staff_surname, :staff_name, :subdivision, :post)';


        try {

            $this->dbConnection->getConnection()->beginTransaction();
            $user_params = [
                'email'=>$email,
                'password'=>$pwd,
                'staff_surname' => $reg_data['staff_surname'],
                'staff_name' =>$reg_data['staff_name'],
                'subdivision' =>$reg_data['subdivision'],
                'post' =>$reg_data['post']
            ];
            $this->dbConnection->executeSql($user_sql, $user_params);


            $this->dbConnection->getConnection()->commit();
            return self::REGISTRATION_SUCCESS;
        } catch (Exception $exception){

            $this->dbConnection->getConnection()->rollBack();
            return self::REGISTRATION_ERROR;
        }
    }
    public function auth(array $auth_data) {
        $email = $auth_data['email'];
        $pwd = $auth_data['password'];

        $user = $this->getUser($email);

        if(!$user) return self::AUTH_LOGIN_ERROR;

        if (!password_verify($pwd, $user['password'])){

            return self::AUTH_PWD_ERROR;
        }
        return self::AUTH_SUCCESS;

    }

    private function getUser($email){
        $sql = 'select * from staff where email = :email';
        $user = $this->dbConnection->execute(
            $sql,
            ['email' => $email],
            false
        );
        return $user;
    }
}