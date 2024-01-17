<?php

namespace src\Responsitories;

class Validator
{
    public function validateRegex($input, $pattern, $errorMessage)
    {
        if (!preg_match($pattern, $input)) {
            throw new ValidationException($errorMessage);
        }
    }


    
}



class ValidationException extends \Exception
{
    // Bổ sung các logic cụ thể cho ngoại lệ khi cần thiết
}
