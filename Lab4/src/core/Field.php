<?php

namespace src\core;

class Field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';


    public string $type;
    public string $attribute;

    public function __construct(string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf(
            '
            <div class="form-group">
            <label>%s</label>
            <input type="%s" name="%s">
            </div>
        
        ',
            $this->getLabel($this->attribute),
            $this->type,
            $this->attribute
        );
    }


    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }


    public function Label(): array
    {
        return[
            'userName' => "Tên Tài Khoản",
            'userPhone' => "Số Điện thoại",
            'userEmail' => "Email",
            'password' => "Mật khẩu",
            'confirmPassword' => "Nhập lại mật khẩu",

        ];
    }

    public function getLabel($attribute)
    {
        return $this->Label()[$attribute] ?? $attribute;
    }


    public function GetInfo()
    {
        
    }
}
