<?php

namespace app\Core;

use app\Controller\BaseController;

class RenderBase extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    // public function renderHeader(){
    //     $this->load->render('admin/include/header');
    // }
    // public function renderFooter(){
    //     $this->load->render('admin/include/footer');
    // }
}