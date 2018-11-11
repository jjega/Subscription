<?php
/**
 * Created by PhpStorm.
 * User: jonathanega
 * Date: 18/10/2018
 * Time: 21:32
 */

namespace AdoptUnService;

use AdoptUnTestClass;

class UserTransactionSubs
{
    public $user;
    public $transaction;
    public $subscription;

    public function getUser($id):AdoptUnTestClass\User
    {
        return $this->user = new AdoptUnTestClass\User($id);
    }

    public function getSubscription($id):AdoptUnTestClass\Subscription
    {
        return $this->user = new AdoptUnTestClass\User($id);
    }

    public function getTransaction($id):AdoptUnTestClass\Transaction
    {
        $this->transaction = new AdoptUnTestClass\Transaction($id);
        $this->getUser($this->transaction->user_id);

        // TODO get from DB Table Transaction subscription_id
        $this->getSubscription($subscription_id);

        return $this->transaction;
    }

    public function setTransaction($amount)
    {
        $this->transaction = AdoptUnAPI::CREATE_TRANSACTION($this->user->id, $amount);
        $subs_end_date = $this->subscription->calcEndDate();

        // TODO Set in DB table Transaction user_id, transaction_id & subscription_id
        // TODO Set in DB table UserSubscription user_id, subscription_id, renewable = true  & end_date = $subs_end_date
    }
}