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
    private $_id;
    private $_user_id;
    private $_amount;

    public function __construct($id)
    {
        $oTransaction = AdoptUnAPI::GET_TRANSACTION($id);

        $this->_id = $oTransaction->transaction_id;
        $this->_amount = $oTransaction->amount;
        $this->_user_id = $oTransaction->user_id;

    }

    public static function CREATE($user_id, $amount)
    {
        $id = AdoptUnAPI::CREATE_TRANSACTION($user_id, $amount);

        return new Transaction($id);
    }
}