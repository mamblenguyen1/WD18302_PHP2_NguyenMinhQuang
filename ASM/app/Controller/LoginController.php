<?php

namespace app\Controller;

use app\Model\UserModel;
use app\Core\RenderBase;
use app\Responsitories\LoginRespositoies;

class LoginController extends BaseController
{

    private $_renderBase;

    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
        // $this->logIn();
        // die;
    }


    function LoginController()
    {
        $this->logIn();
    }



    function HandleLogin()
    {
        $data = isset($_GET['data']) ? json_decode(base64_decode($_GET['data']), true) : [];
        unset($data['login']);
        $LoginRespositoies = new LoginRespositoies();
        if ($LoginRespositoies->Login($data)) {
            header('location: ?pages=UserController/list');
        } else {
            $this->logIn();
        }
    }



    function logIn()
    {
        $data = isset($_GET['data']) ? json_decode(base64_decode($_GET['data']), true) : [];
        $LoginRespositoies = new LoginRespositoies();
        if ($LoginRespositoies->Login($data)) {
            echo '<script>window.location.href="/?pages=LoginController/logIn/"</script>';
        } else {
            $this->load->render('admin/Pages/Login/Login');
        };
    }


    function logOut()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION);
        setcookie("userID", '', time() + 1, "/");
        // session_destroy();
        $this->load->render('admin/Pages/Login/Login');
    }
    function register()
    {
        $this->load->render('admin/Pages/Login/Register');
    }
    function HandleRegister()
    {
        $data = isset($_GET['data']) ? json_decode(base64_decode($_GET['data']), true) : [];
        unset($data['register']);
        $LoginRespositoies = new LoginRespositoies();
        if ($LoginRespositoies->register($data)) {
            header('location: ?pages=UserController/list');
        } else {
            $this->register();
        }
    }

    function forgot()
    {
        $this->load->render('admin/Pages/Login/forgot');
    }
}
