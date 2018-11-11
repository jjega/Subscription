<?php
/**
 * Created by PhpStorm.
 * User: jega
 * Date: 02/11/2018
 * Time: 23:57
 */

namespace App\Controller;


class Abonnement
{
    public function __construct($mode, $id)
    {
        switch ($mode)
        {
            case 'creer':
                self::showCreate($id);
                break;
            case 'modifier':
                self::showUpdate($id);
                break;
            default:
                self::showList();
        }
    }

    public static function showCreate($id)
    {}

    public static function showUpdate($id)
    {}

    public static function showList()
    {}
}