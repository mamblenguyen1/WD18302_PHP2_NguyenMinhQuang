<?php

namespace app\Controller;

use app\Core\RenderBase;

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
        }else{
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
        $data = [
            "user" => [
                [
                    "id" => $id,
                ]
            ]
        ];
        $this->load->render('admin/Pages/User/UserDetail', $data);
    }

    function edit($id)
    {
        $data = [
            "user" => [
                [
                    "id" => $id,

                ]
            ]
        ];
        $this->load->render('admin/Pages/User/UserEdit', $data);
    }
}
