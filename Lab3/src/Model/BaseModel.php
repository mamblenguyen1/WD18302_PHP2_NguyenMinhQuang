<?php

namespace src\Model ;

class Model{
    public $data = 'test';

    public function __get($name)
    {
        echo $this->$name;
    }


}



?>