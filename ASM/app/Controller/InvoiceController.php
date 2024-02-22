<?php

namespace app\Controller;

use app\Core\RenderBase;
use app\Responsitories\InvoicesRespon;
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
    function editProduct($id)
    {
        $data = [
            "product" => [
                [
                    "id" => $id,
                ]
            ]
        ];
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/Invoices/InvoicesEditProduct', $data);
        $this->_renderBase->renderFooter();
    }

    function edit($id)
    {
        
        $data = [
            "product" => [
                [
                    "id" => $id,
                ]
            ]
        ];
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/Invoices/InvoicesEdit', $data);
        $this->_renderBase->renderFooter();
    }
    function  RemoveInvoice($id)
    {
        $InvoicesRespon = new InvoicesRespon();
        // $InvoicesRespon->RemoveInvoices($id);
       if( $InvoicesRespon->RemoveInvoices($id)){
        $this->redirect('?pages=InvoiceController/list');
       }
    }
}
