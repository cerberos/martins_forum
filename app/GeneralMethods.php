<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 13/09/2017
 * Time: 15:45
 */

namespace App;


use Hashids\Hashids;


class GeneralMethods
{
    private $hashids;

    public function __construct()
    {
        $this->hashids = new Hashids(env('HASH_SALT'), env('HASH_MIN_NUMBER'), env('HASH_ALPHABET'));
    }

    public function encrypt($value)
    {
        return $this->hashids->encode($value);
    }

    public function decrypt($value)
    {
        return isset($this->hashids->decode($value)[0]) ? $this->hashids->decode($value)[0] : 0;
    }

}