<?php

namespace app\Controller;

use app\Core\RenderBase;

class HomeController extends BaseController
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
    }

    function HomeController()
    {
        $this->home();
    }

    // function home()
    // {
    //     // dữ liệu ở đây lấy từ responsitories hoặc model
    //     $this->load->render('admin/Pages/Dashboard');

    // }
    function home()
    {
        $this->load->render('admin/Pages/User/UserList');
    }

    function add()
    {
        $this->load->render('admin/Pages/User/UserAdd');
    }


    function details()
    {
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];
        } 
        $data = [
            "user" => [
                [
                    "id" => $userId,
                ]
            ]
        ];
        $this->load->render('admin/Pages/User/UserDetail', $data);
    }

    function edit()
    {
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];
        } 
        $data = [
            "user" => [
                [
                    "id" => $userId,
                ]
            ]
        ];
        $this->load->render('admin/Pages/User/UserEdit', $data);
    }
}
