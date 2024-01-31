<?php

namespace app\Controller;

use app\Core\RenderBase;

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
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/User/UserList');
        $this->_renderBase->renderFooter();
    }

    function add()
    {
        $UserRespon = new UserRespon();
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/User/UserAdd');
        $this->_renderBase->renderFooter();
        if (isset($_POST['addUser'])) {
            $UserRespon->AddUserResponse();
        }
    }


    function details($id)
    {
        $data = [
            "user" => [
                [
                    "id" => $id,
                ]
            ]
        ];
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/User/UserDetail', $data);
        $this->_renderBase->renderFooter();
    }

    function edit($id)
    {
        $UserRespon = new UserRespon();

        $data = [
            "user" => [
                [
                    "id" => $id,
                ]
            ]
        ];
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/User/UserEdit', $data);
        $this->_renderBase->renderFooter();
        $user_id = $data['user'][0]['id'];
        if (isset($_POST['editUser'])) {
            $UserRespon->UpdateUserResponse($user_id);
        }
    }
}
