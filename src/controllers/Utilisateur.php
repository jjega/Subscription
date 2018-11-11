<?php
/**
 * Created by PhpStorm.
 * User: jega
 * Date: 02/11/2018
 * Time: 23:58
 */

namespace App\Controller;


class Utilisateur
{
    public function __construct($mode, $id)
    {
        switch ($mode)
        {
            case 'infos':
                self::showPaymentInfos($id);
                break;
            case 'abonement':
            default:
                self::showAbonnement($id);
                break;
        }
    }
}