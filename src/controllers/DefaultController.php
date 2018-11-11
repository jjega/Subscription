<?php
/**
 * Created by PhpStorm.
 * User: jega
 * Date: 03/11/2018
 * Time: 00:04
 */

namespace App\Controller;


class DefaultController
{
    public function __construct($call, $id)
    {
        switch ($_GET['page'])
        {
            case 'abonnement':
                new Abonnement($_GET['mode'], $_GET['id']);
            case 'utilisateur':
                new Utilisateur($_GET['mode'], $_GET['id']);
            case 'adminnistration':
                new Administration();
        }
    }
}