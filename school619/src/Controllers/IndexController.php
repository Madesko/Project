<?php
namespace Alexandr\Vatutin\School619\Controllers;

use Alexandr\Vatutin\School619\Base\Controller;
use Alexandr\Vatutin\School619\Base\DBConnection;

class IndexController extends Controller
{
    public function indexAction(){
        $content = 'auth.php';
        $data = [
            'title' => 'Авторизация'
        ];
        return $this->generateResponse($content, $data);
    }
}