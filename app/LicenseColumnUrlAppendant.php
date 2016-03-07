<?php

namespace rGuard;

use Lang;
use SleepingOwl\Admin\Columns\Column\BaseColumn;

class LicenseColumnUrlAppendant extends BaseColumn
{
    public $url;

    /**
     * @param string $url
     * @param string $label
     */
    function __construct($url, $label = null)
    {
        $this->hidden = true;
        $this->url = $url;
        parent::__construct($url, $label);
    }

    /**
     * @param $instance
     * @param int $totalCount
     * @return string
     */
    public function render($instance, $totalCount)
    {
        $href = $this->url ==
        'app' ? "products/" . $instance->app->id . "/edit" :
            "users/".$instance->user->id."/edit";
        $content = $this->htmlBuilder->tag('i', [
            'class' => 'fa fa-arrow-circle-o-right',
            'data-toggle' => 'tooltip',
            'title' => Lang::get('admin::lang.table.filter-goto')
        ]);
        return $this->htmlBuilder->tag('a', [
            'href' => $href
        ], $content);
    }
}