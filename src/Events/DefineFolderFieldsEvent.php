<?php

namespace Creode\LaravelNovaFolders\Events;

class DefineFolderFieldsEvent
{
    /**
     * @var array
     */
    public $fields;

    /**
     * @param array $fields
     */
    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }
}
