<?php

namespace rGuard;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\Interfaces\ModelWithFileFieldsInterface;
use SleepingOwl\Models\SleepingOwlModel;

class Download extends SleepingOwlModel implements ModelWithFileFieldsInterface
{
    protected $fillable = ['app_id', 'file', 'virtual_path'];

    protected $hidden = ['file'];

    public function app()
    {
        return $this->belongsTo(App::class);
    }

    /**
     * Get array of file field names and its directories within files folder
     *
     * Keys of array is file field names
     * Values is their directories
     *
     * @return string[]
     */
    public function getFileFields()
    {
        return [
            'file' => 'downloads/'
        ];
    }

    /**
     * @param $field
     * @return bool
     */
    public function hasFileField($field)
    {
        return $field == 'file';
    }
}
