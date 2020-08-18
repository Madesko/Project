<?php
namespace Alexandr\Vatutin\School619\Controllers;
use Alexandr\Vatutin\School619\Base\Controller;
use Alexandr\Vatutin\School619\Base\Request;
use Alexandr\Vatutin\School619\Services\AccountService;

class AccountController extends Controller
{
    private $accountService;
    public function __construct()
    {
        $this->accountService = new AccountService();
    }

    public function showRegForm(){
        $content = 'registration.php';
        $data = [
            'page_title'=>'Регистрация'
        ];
        return $this->generateResponse($content,$data);
    }


    public function regUser(Request $request){

        $result = $this->accountService->addUser($request->post());
        $content = 'registration.php';
        $data = [
            'page_title'=>'Регистрация',
            'reg_result' => $result
        ];
        return $this->generateResponse($content,$data);
    }

    public function account(){
        if (!isset($_SESSION['email'])) header('Location: /');
        $content = 'account.php';
        $data = [
            'page_title'=>'Личный Кабинет'
        ];
        return $this->generateResponse($content,$data);
    }


    public function login(Request $request){
        $auth_data = $request->post();

        $result = $this->accountService->auth($auth_data);
        if ($result === AccountService::AUTH_SUCCESS){
            $_SESSION['email'] = $auth_data['email'];
        }
        // return $this->ajaxResponse($result);
        return $this->account();
    }
    public function logout() {
        $_SESSION=[];
        header('Location: /');
    }
    public function errors() {
        $content = 'error.php';
        $data = [
            'page_title'=>'Ошибка'
        ];
        return $this->generateResponse($content,$data);
    }
}
