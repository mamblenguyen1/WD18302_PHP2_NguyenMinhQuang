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
    // function __construct()
    // {
    //     parent::__construct();
    //     $this->_renderBase = new RenderBase();
    // }


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

    function HomeController()
    {
        $this->home();
    }

    function home()
    {
        // dữ liệu ở đây lấy từ responsitories hoặc model
        $this->_renderBase->renderHeader();
        $this->load->render('admin/include/sidebar');
        $this->load->render('admin/Pages/Dashboard');
        $this->_renderBase->renderFooter();

    }

    function Error()
    {      
        $this->load->render('admin/include/error');
    }

}
