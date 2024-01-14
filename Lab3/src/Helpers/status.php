<?php

namespace src\Helpers;


class status
{
    const DEACTIVE = 1;
    const ACTIVE = 0;

    public static function getStatus()
    {
        return [
            self::DEACTIVE => 'Vô hiệu hóa',
            self::ACTIVE => 'Đang hoạt động'
        ];
    }
}
