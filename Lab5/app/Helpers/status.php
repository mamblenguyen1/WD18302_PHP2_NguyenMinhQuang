<?php

namespace app\Helpers;


class status
{
    const DEACTIVE = 1;
    const ACTIVE = 0;
    const ADMIN = 1;
    const USER = 2;
    const SHOW = 0 ;
    const HIDDEN = 1;
    public static function getStatus()
    {
        return [
            self::DEACTIVE => 'Vô hiệu hóa',
            self::ACTIVE => 'Đang hoạt động'
        ];
    }

    public static function getRole()
    {
        return [
            self::ADMIN => 'Người quản trị',
            self::USER => 'Khách hàng'
        ];
    }
    public static function getShow()
    {
        return [
            self::SHOW => 'Hiện',
            self::HIDDEN => 'Ẩn'
        ];
    }


}
