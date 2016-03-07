<?php
/**
 * Created by PhpStorm.
 * User: tobe
 * Date: 12/24/2015
 * Time: 1:01 PM
 */

namespace rGuard\Traits;


/**
 * Class AngularDateTrait
 * @package rGuard\Traits
 * @deprecated
 */
trait AngularDateTrait
{

    /**
     * Leave as Timestamps for Angular
     * @return array
     */
    public function getDates()
    {
        return [];
    }

    public function getCreatedAtAttribute($value)
    {
        $value = date('U', strtotime($value));
        return $value * 1000;
    }

    public function getUpdatedAtAttribute($value)
    {
        $value = date('U', strtotime($value));
        return $value * 1000;
    }
}