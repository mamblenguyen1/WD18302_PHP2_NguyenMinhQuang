<?php


namespace app\Core;

use Exception;

class Render
{
    function __construct(){
        
    }
    /**
     * render là hàm dùng để gọi các trang trong Views
     *
     * @param  string $file
     * @param  array $data
     * @return void
     */
    public function render($file, $data = array())
    {
        extract($data);
        require 'app/View/' . $file . '.php';
        // var_dump('app/View/' . $file . '.php');
        $viewPath = __DIR__ . '/../View/' .  $file . '.php';
        // kiểm tra file view có tồn tại không
        if (!file_exists($viewPath)) {
            throw new Exception('Không tìm thấy view nha');
        }
    }

    /**
     * renderModel là hàm dùng để gọi file model trong Models
     *
     * @param  string $file
     * @return string
     */
    public function renderModel($file)
    {
        require 'app/Model/' . $file . '.php';
        return new $file();
    }
}
