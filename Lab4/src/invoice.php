<?php

namespace src;


class invoice
{
    public static function index(): string
    {
        return 'Invoices';
    }

    public static function create(): string
    {
        return 'Create invoice';
    }
}
