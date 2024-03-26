<?php

namespace app\Controller;

use app\Core\RenderBase;

// use app\Model\UserModel;
use app\Model\UserModel;
use app\Responsitories\UserRespon;

class UserController extends BaseController
{

    private $_renderBase;

    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    function __construct()
    {
        if (!isset($_COOKIE['userID'])) {
            parent::__construct();
            $this->_renderBase = new RenderBase();
            $this->_renderBase->renderLogin();
            die;
        } else {
            parent::__construct();
            $this->_renderBase = new RenderBase();
        }
    }

    function list()
    {
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/User/UserList');
        $this->_renderBase->renderFooter();
    }

    function add()
    {
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/User/UserAdd');
        $this->_renderBase->renderFooter();
    }
    public function handleCreate()
    {
       
        $data = isset($_GET['data']) ? json_decode(base64_decode($_GET['data']), true) : [];

        $UserRespon = new UserRespon();
        if($UserRespon->AddUserResponse($data)){
            header('location: /?pages=UserController/list/');
        }else{
            $this->_renderBase->renderHeader();
            $this->load->render('admin/include/sidebar');
            $this->load->render('admin/Pages/User/UserAdd');
            $this->_renderBase->renderFooter();
        }
    }

    public function handleChange()
    {
        $data = isset($_GET['data']) ? json_decode(base64_decode($_GET['data']), true) : [];
        $UserRespon = new UserRespon();
        if($UserRespon->changePass($data)){
            header('location: /?pages=UserController/list/');
        }else{
            $this->_renderBase->renderHeader();
            $this->load->render('admin/include/sidebar');
            $this->load->render('admin/Pages/User/UserAdd');
            $this->_renderBase->renderFooter();
        }
    }
    function change()
    {

        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/User/ChangPass');
        $this->_renderBase->renderFooter();
    }
    function changeOne($id)
    {
        $UserModel = new UserModel();
        $data = [
            "user" => $UserModel->getInfoPUserById($id)
        ];
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/User/ChangeOneUser', $data);
        $this->_renderBase->renderFooter();
    }



    function details($id)
    {
        $UserModel = new UserModel();
        $data = [
            "user" => $UserModel->getInfoPUserById($id)
        ];
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/User/UserDetail', $data);
        $this->_renderBase->renderFooter();
    }

    
    function edit($id)
    {
        $UserModel = new UserModel();
        $data = [
            "user" => $UserModel->getInfoPUserById($id)
        ];
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/User/UserEdit', $data);
        $this->_renderBase->renderFooter();
    }
    function handleDelete()
    {
        $UserRespon = new UserRespon();
        if($UserRespon->HiddenUserResponse($_POST)){
            $UserRespon->HiddenUserResponse($_POST);
        }else{
         $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/User/UserList');
        $this->_renderBase->renderFooter();
        }
    }
    function handleRecovery()
    {
        $UserRespon = new UserRespon();
        if($UserRespon->RecoveryUserResponse($_POST)){
            $UserRespon->RecoveryUserResponse($_POST);
        }else{
            $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/User/UserList');
        $this->_renderBase->renderFooter();
        }
    }


    
    public function handleUpdate()
    {
        $data = isset($_GET['data']) ? json_decode(base64_decode($_GET['data']), true) : [];
        $UserRespon = new UserRespon();

        if($UserRespon->UpdateUserResponse($data)){
            header('location: /?pages=UserController/list/');
        }else{
            $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/User/UserEdit', $data);
        $this->_renderBase->renderFooter();
        }
    }
}
