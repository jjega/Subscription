<?php
/**
 * Created by PhpStorm.
 * User: jonathanega
 * Date: 18/10/2018
 * Time: 20:12
 */

use \AdoptUnController

switch ($_GET['page'])
{
    case 'abonnement':
        $abonnement = new Abonnement();
        switch ($_GET['mode'])
        {
            case 'creer':
                $abonnement->showCreate($_GET['id']);
                break;
            case 'modifier':
                $abonnement->showUpdate($_GET['id']);
                break;
            default:
                $abonnement->showList();
        }
    case 'utilisateur':
        $utilisateur = new Utilisateur();
        switch ($_GET['mode'])
        {
            case 'infos':
                $utilisateur->showPaymentInfos($_GET['id']);
                break;
            case 'abonement':
            default:
                $utilisateur->showAbonnement($_GET['id']);
                break;
        }
    case 'adminnistration':
        $administration = new Administration();
        $administration->showList();
}