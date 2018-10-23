<?php
/**
 * Created by PhpStorm.
 * User: jonathanega
 * Date: 18/10/2018
 * Time: 20:21
 */

namespace AdoptUnTestClass;


use phpDocumentor\Reflection\Types\Integer;

class Subscription
{
    private $_id;
    private $_min_time;
    private $_label;
    private $_time_life;
    private $_db;

    public function __construct($id)
    {
        //TODO: Get from database Table Subscription
    }

    public static function CREATE(int $min_time, string $label, int $payment_cycle, int $time_life)
    {
        //TODO Create on database get the last insert id set it into $return_id

        return new Subscription($return_id);
    }

    public function update()
    {
        // TODO Data check

        $this->_store();
    }

    public function delete()
    {
        // TODO Delete request

        $this->__destruct();
    }

    // Data i/o
    public function minTime(int $min_time = null)
    {
        if ($min_time) {
            $this->_min_time = $min_time;
        } else {
            return $this->_min_time;
        }

    }

    public function label(string $label)
    {
        if ($label) {
            $this->_label = $label;
        } else {
            return $this->_label;
        }
    }

    /**
     * @param int $time_life timestamp
     * @return mixed timestamp
     */
    public function timeLife(int $time_life)
    {
        if ($time_life) {
            $this->_time_life = $time_life;
        } else {
            return $this->_time_life;
        }
    }

    public function calcEndDate()
    {
        return time() + $this->_time_life;
    }

    private function _store()
    {
        //TODO Set on DB
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
}