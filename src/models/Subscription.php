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
    private $id;
    private $min_time;
    private $label;
    private $time_life;
    private $db;

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

        $this->store();
    }

    public function delete()
    {
        // TODO Delete request

        $this->destruct();
    }

    // Data i/o
    public function minTime(int $min_time = null)
    {
        if ($min_time) {
            $this->min_time = $min_time;
        } else {
            return $this->min_time;
        }

    }

    public function label(string $label)
    {
        if ($label) {
            $this->label = $label;
        } else {
            return $this->label;
        }
    }

    /**
     * @param int $time_life timestamp
     * @return mixed timestamp
     */
    public function timeLife(int $time_life)
    {
        if ($time_life) {
            $this->time_life = $time_life;
        } else {
            return $this->time_life;
        }
    }

    public function calcEndDate()
    {
        return time() + $this->time_life;
    }

    private function store()
    {
        //TODO Set on DB
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
}