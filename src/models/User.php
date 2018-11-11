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
    private $id;
    private $card_number;
    private $cvv;

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

        $this->id = $oUser->user_id;
        $this->card_number = $oUser->card_number;
        $this->cvv = $oUser->cvv;
    }

    public function id() {
        return $this->id;
    }

    public function cardNumber(int $card_number = null)
    {
        if ($card_number) {
            $this->card_number = $card_number;
        } else {
            return $this->card_number;
        }

    }

    public function ccv(int $ccv = null)
    {
        if ($ccv) {
            $this->cvv = $ccv;
        } else {
            return $this->cvv;
        }
    }

    public function update()
    {
        // TODO Check Data

        AdoptUnAPI::UPDATE_USER($this->id, $this->cvv, $this->card_number);
    }
}