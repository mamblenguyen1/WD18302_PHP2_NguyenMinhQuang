<?php

namespace app\Controller;

use app\Core\RenderBase;

class InvoiceController extends BaseController
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

    function list()
    {
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/Invoices/InvoicesList');
        $this->_renderBase->renderFooter();
    }

    function choose()
    {
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/Invoices/ChooseCustormer');
        $this->_renderBase->renderFooter();
    }

    function detail()
    {
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];
        }
        $data = [
            "Invoice" => [
                [
                    "id" => $userId,
                ]
            ]
        ];
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/Invoices/InvoicesDetail', $data);
        $this->_renderBase->renderFooter();
    }


    function add()
    {
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];
        }
        $data = [
            "Invoice" => [
                [
                    "id" => $userId,
                ]
            ]
        ];
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/Invoices/InvoicesAdd', $data);
        $this->_renderBase->renderFooter();
    }

    function addProduct()
    {
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/Invoices/InvoicesAddProduct');
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
