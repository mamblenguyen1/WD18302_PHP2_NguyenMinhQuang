<?php

namespace app\Controller;

use app\Core\RenderBase;
use app\Model\UserModel;
use  app\Responsitories\UserRespon;

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

        // $this->list();
    }

    // function Controller()
    // {
    //     $this->homePage();
    // }

    // function homePage()
    // {
    //     // dữ liệu ở đây lấy từ responsitories hoặc model
    //     $data = [
    //         "products" => [
    //             [
    //                 "id" => 1,
    //                 "name" => "Sản phẩm"
    //             ]
    //         ]
    //     ];

    //     $this->_renderBase->renderHeader();
    //     $this->load->render('admin/include/sidebar');
    //     $this->load->render('admin/Pages/Dashboard');
    //     $this->_renderBase->renderFooter();
    // }

    function list()
    {
        $this->load->render('admin/Pages/User/UserList');
    }

    function add()
    {
        $this->load->render('admin/Pages/User/UserAdd');
    }


    function details($id)
    {
        $UserModel = new UserModel();


        // var_dump($user);
        // die;
        $data = [
            "user" =>  $UserModel->getInfoUserById($id)
        ];
        $this->load->render('admin/Pages/User/UserDetail', $data);
    }

    function edit($id)
    {
        $UserModel = new UserModel();
        $data = [
            "user" =>  $UserModel->getInfoUserById($id)
        ];
        $this->load->render('admin/Pages/User/UserEdit', $data);
    }
    public function handleCreate()
    {
        $data = isset($_GET['data']) ? json_decode(base64_decode($_GET['data']), true) : [];

        unset($data['create']);
        //   var_dump($data);
        // die;
        $UserRespon = new UserRespon();
        if ($UserRespon->AddUserResponse($data)) {
            header('location: /?pages=UserController/list/');
        } else {
            $this->_renderBase->renderHeader();
            $this->load->render('admin/include/sidebar');
            $this->load->render('admin/Pages/User/UserAdd');
            $this->_renderBase->renderFooter();
        }
    }
    public function handleUpdate()
    {
        $data = isset($_GET['data']) ? json_decode(base64_decode($_GET['data']), true) : [];
        $UserRespon = new UserRespon();
        unset($data['update']);
        if ($UserRespon->UpdateUserResponse($data)) {
            // header('location: /?pages=UserController/list/');
        } else {
            $this->_renderBase->renderHeader();
            $this->load->render('admin/include/sidebar');
            $this->load->render('admin/Pages/User/UserEdit', $data);
            $this->_renderBase->renderFooter();
        }
    }
}
