<?php

namespace Creode\LaravelNovaFolders\Events;

class DefineFolderFieldsEvent
{
    /**
     * @var array
     */
    public $fields;

    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }
}
