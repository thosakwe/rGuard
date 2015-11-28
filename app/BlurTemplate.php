<?php
/**
 * Created by PhpStorm.
 * User: tobe
 * Date: 11/14/2015
 * Time: 5:07 PM
 */

namespace rGuard;


use Intervention\Image\Filters\FilterInterface;

class BlurTemplate implements FilterInterface
{
    public function applyFilter(\Intervention\Image\Image $image)
    {
        return $image->blur()->brightness(-25);
    }

}