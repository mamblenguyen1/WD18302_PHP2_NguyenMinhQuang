<?php

namespace app\Helpers;


class status
{
    const DEACTIVE = 1;
    const ACTIVE = 0;
    const ADMIN = 1;
    const USER = 2;
    const SHOW = 0;
    const HIDDEN = 1;
    const PENDING = 1;
    const CONFIRMED = 2;
    const CANCELLED = 3;
    const DELIVERING = 4;
    const DELIVERED = 5;

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


    public static function GetStatusInvoice()
    {
        return [
            self::PENDING => 'Chờ xác nhận',
            self::CONFIRMED => 'Đã xác nhận',
            self::CANCELLED => 'Đã hủy',
            self::DELIVERING => 'Đang giao',
            self::DELIVERED => 'Đã giao'
        ];
    }
}
