<?php

namespace rGuard;

use SleepingOwl\Models\SleepingOwlModel;

class Page extends SleepingOwlModel
{

    protected $guarded = ['id'];

    protected $table = 'pages';
}
