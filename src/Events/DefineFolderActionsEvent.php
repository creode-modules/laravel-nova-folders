<?php

namespace Creode\LaravelNovaFolders\Events;

class DefineFolderActionsEvent
{
    /**
     * @var array
     */
    public $actions;

    public function __construct(array $actions)
    {
        $this->actions = $actions;
    }
}
