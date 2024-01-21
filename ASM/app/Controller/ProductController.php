<?php

namespace app\Controller;

use app\Core\RenderBase;

class ProductController extends BaseController
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
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/Product/ProductList');
        $this->_renderBase->renderFooter();
    }

    function add()
    {
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/Product/ProductAdd');
        $this->_renderBase->renderFooter();
    }


    function details()
    {
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];
        } 
        $data = [
            "product" => [
                [
                    "id" => $userId,
                ]
            ]
        ];
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/Product/ProductDetail', $data);
        $this->_renderBase->renderFooter();
    }

    function edit()
    {
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];
        } 
        $data = [
            "product" => [
                [
                    "id" => $userId,
                ]
            ]
        ];
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/Product/ProductEdit', $data);
        $this->_renderBase->renderFooter();
    }
}
