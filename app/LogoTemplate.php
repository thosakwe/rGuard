<?php
/**
 * Created by PhpStorm.
 * User: tobe
 * Date: 11/14/2015
 * Time: 5:41 PM
 */

namespace rGuard;


use Intervention\Image\Filters\FilterInterface;

class LogoTemplate implements FilterInterface
{

    public function applyFilter(\Intervention\Image\Image $image)
    {
        return $image->resize(128, null, function($constraint) {
           $constraint->aspectRatio();
        });
    }
}