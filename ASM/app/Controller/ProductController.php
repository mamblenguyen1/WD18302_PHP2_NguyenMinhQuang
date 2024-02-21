<?php

namespace app\Controller;

use app\Core\RenderBase;
use app\Model\ProductModel;
use app\Responsitories\ProductRespon;
class ProductController extends BaseController
{

    private $_renderBase;
    private $data ; 
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


    function details($id)
    {
        $ProductModel = new ProductModel();
        $data = [
            "product" => $ProductModel->getInfoProductById($id)
        ];
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/Product/ProductDetail', $data);
        $this->_renderBase->renderFooter();
    }

    function edit($id)
    {
        $ProductModel = new ProductModel();
        $data = [
            "products" => $ProductModel->getInfoProductById($id)
        ];
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/Product/ProductEdit', $data);
        $this->_renderBase->renderFooter();
    }

    function handleDelete()
    {
        $ProductRespon = new ProductRespon();
        if($ProductRespon->HiddenProductResponse($_POST)){
            $ProductRespon->HiddenProductResponse($_POST);
        }else{
         $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/User/UserList');
        $this->_renderBase->renderFooter();
        }
    }

    function handleRecovery()
    {
        $ProductRespon = new ProductRespon();
        if($ProductRespon->RecoveryProductResponse($_POST)){
            $ProductRespon->RecoveryProductResponse($_POST);
        }else{
         $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/User/UserList');
        $this->_renderBase->renderFooter();
        }
    }

    public function handleCreate()
    {
        $data = isset($_GET['data']) ? json_decode(base64_decode($_GET['data']), true) : [];
        unset($data['create']); 

        $ProductRespon = new ProductRespon();
        if($ProductRespon->AddProductResponse($data)){
            header('location: /?pages=ProductController/list/');
        }else{
            $this->_renderBase->renderHeader();
            $this->load->render('admin/include/sidebar');
            $this->load->render('admin/Pages/Product/ProductAdd');
            $this->_renderBase->renderFooter();
        }
    }

    public function handleUpdate()
    {
        $data = isset($_GET['data']) ? json_decode(base64_decode($_GET['data']), true) : [];
        unset($data['updatepro']); 

        $ProductRespon = new ProductRespon();
        if($ProductRespon->UpdateProductResponse($data)){
            header('location: /?pages=ProductController/list/');
        }else{
            $this->_renderBase->renderHeader();
            $this->load->render('admin/include/sidebar');
            $this->load->render('admin/Pages/Product/ProductAdd');
            $this->_renderBase->renderFooter();
        }
    }

}
