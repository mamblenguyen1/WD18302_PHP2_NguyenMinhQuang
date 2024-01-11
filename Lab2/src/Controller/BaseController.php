<?php
namespace src\Controller;

use src\Model\UserFunction;

class BaseController {
    private $user;
    private $db;
    function Render_user()  {
        $user = new UserFunction();
       return $user->Get_User_DB();
    }

    function Delete_User($user_name , $user_password, $user_email, $user_phone){
        
    }
}
?>