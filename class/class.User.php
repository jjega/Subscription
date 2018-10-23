<?php
/**
 * Created by PhpStorm.
 * User: jonathanega
 * Date: 18/10/2018
 * Time: 21:08
 */

namespace AdoptUnTestClass;

use AdoptUnService\AdoptUnAPI;

class User
{
    private $_id;
    private $_card_number;
    private $_cvv;

    public static function CREATE($cvv, $card_number)
    {
        // TODO CREATE USER IN DB GET IS $id_db

        AdoptUnAPI::CREATE_USER($id_db, $cvv, $card_number);

        return new User($id_db);
    }

    public function __construct(int $user_id)
    {
        // TODO Get data from DB Table User

        $oUser = AdoptUnAPI::GET_USER($user_id);

        $this->_id = $oUser->user_id;
        $this->_card_number = $oUser->card_number;
        $this->_cvv = $oUser->cvv;
    }

    public function id() {
        return $this->_id;
    }

    public function cardNumber(int $card_number = null)
    {
        if ($card_number) {
            $this->_card_number = $card_number;
        } else {
            return $this->_card_number;
        }

    }

    public function ccv(int $ccv = null)
    {
        if ($ccv) {
            $this->_cvv = $ccv;
        } else {
            return $this->_cvv;
        }
    }

    public function update()
    {
        // TODO Check Data

        AdoptUnAPI::UPDATE_USER($this->_id, $this->_cvv, $this->_card_number);
    }
}