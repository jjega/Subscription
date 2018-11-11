<?php
/**
 * Created by PhpStorm.
 * User: jonathanega
 * Date: 18/10/2018
 * Time: 22:35
 */

namespace AdoptUnTestClass;

use AdoptUnService\AdoptUnAPI;

class Transaction
{
    private $id;
    private $user;
    private $amount;

    public function __construct($id)
    {
        $oTransaction = AdoptUnAPI::GET_TRANSACTION($id);

        $this->id = $oTransaction->transaction_id;
        $this->amount = $oTransaction->amount;
        $this->user = new User($oTransaction->user_id);

    }

    public static function CREATE(User $user, $amount)
    {
        $id = AdoptUnAPI::CREATE_TRANSACTION($user->id(), $amount);

        return new Transaction($id);
    }
}