<?php

namespace app\Controller;

use app\Core\Render;


class BaseController
{
    protected Render $load ;
    function __construct()
    {
        $this->load = new Render();
    }

    public function  redirect($url, $refresh = null): void
    {   
        header('location:' . $url);
    }
}
