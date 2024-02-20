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
        $LoginRespositoies = new LoginRespositoies();
        if ($LoginRespositoies->Login()) {
            header('location: ?pages=UserController/list');
        }else{
            $this->logIn();            
        }
    }



    function logIn()
    {
        $LoginRespositoies = new LoginRespositoies();
        if (isset($_POST['login'])) {
            if ($LoginRespositoies->Login()) {
                echo '<script>window.location.href="/?pages=LoginController/logIn/"</script>';
            } else {
                $this->load->render('admin/Pages/Login/Login');
            };
        } else {
            $this->load->render('admin/Pages/Login/Login');
        }
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
        $LoginRespositoies = new LoginRespositoies();
        if ($LoginRespositoies->register()) {
            header('location: ?pages=UserController/list');
        }else{
            $this->register();            
        }
    }

    function forgot()
    {
        $this->load->render('admin/Pages/Login/forgot');
    }


}
