<?php

namespace app\Controller;

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

    function logIn()
    {
        $LoginRespositoies = new LoginRespositoies();
        if (isset($_POST['login'])) {
            if ($LoginRespositoies->Login()) {
                echo '<script>window.location.href="/?pages=LoginController/logIn/"</script>';
            } else {
                $this->load->render('admin/Pages/Login/Login');
            };
        }else{
            $this->load->render('admin/Pages/Login/Login');
        }
    }

    function logOut()
    {   
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        setcookie("userID", '', time() + 1, "/");
        $this->load->render('admin/Pages/Login/Login');
    }
    function register()
    {
        $this->load->render('admin/Pages/Login/Register');
    }

    function forgot()
    {
        $this->load->render('admin/Pages/Login/forgot');
    }


    // function logOut()
    // {
    //     setcookie("userID", '', time() + 1, "/");
    // }
    // function list()
    // {
    //     $this->load->render('admin/Pages/User/UserList');
    // }

    // function add()
    // {
    //     $this->load->render('admin/Pages/User/UserAdd');
    // }

}
