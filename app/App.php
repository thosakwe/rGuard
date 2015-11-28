<?php

namespace rGuard;

use Illuminate\Database\Eloquent\Model;
use Image;
use SleepingOwl\Admin\Exceptions\ValidationException;
use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\Interfaces\ValidationModelInterface;
use SleepingOwl\Models\SleepingOwlModel;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;

class App extends SleepingOwlModel implements ModelWithImageFieldsInterface, ValidationModelInterface
{
    protected $fillable = [
        'id', 'image', 'name', 'tagline',
        'version', 'price', 'featured', 'description'
    ];

    //use ModelWithImageOrFileFieldsTrait;

    public function getImageFields()
    {
        return [
            'image' => ''
        ];
    }

    /**
     * @param $field
     * @return bool
     */
    public function hasImageField($field)
    {
        return $field == 'image';
    }

    /**
     * @param $data
     * @param array $rules
     * @throws \SleepingOwl\Admin\Exceptions\ValidationException
     * @return void
     */
    public function validate($data, $rules = [])
    {
        $validator = \Validator::make($data, $rules);
        if ($validator->fails()) throw new ValidationException($validator->errors());
    }

    /**
     * @return array
     */
    public function getValidationRules()
    {
        return [
            'name' => 'required|string',
            'tagline' => 'string',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'version' => 'string'
        ];
    }
}
