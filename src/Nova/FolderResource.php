<?php

namespace Creode\LaravelNovaFolders\Nova;

use App\Nova\Resource;
use Creode\CollapsibleRadios\Field\CollapsibleRadios;
use Creode\LaravelFolderTaxonomy\Models\Folder;
use Creode\LaravelNovaFolders\Events\DefineFolderActionsEvent;
use Creode\LaravelNovaFolders\Events\DefineFolderFieldsEvent;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class FolderResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\Creode\LaravelFolderTaxonomy\Models\Folder>
     */
    public static $model = Folder::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
        'slug',
    ];

    /**
     * Overwrites name (label) of resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'Folders';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        $defaultFields = [
            Text::make('Name', 'name')
                ->sortable()
                ->rules('required', 'max:255'),
            Slug::make('Slug', 'slug')
                ->from('Name')
                ->separator('-')
                ->rules('required', 'max:255'),
            CollapsibleRadios::make('Parent', 'parent_id')
                ->options(
                    Folder::all()
                        ->filter(
                            function ($option) {
                                // Filter out the current folder so it can't be parented to itself.
                                return $option->id !== $this->id;
                            }
                        )->map(
                            function ($model) {
                                return [
                                    'label' => $model->name,
                                    'value' => $model->id,
                                    'id' => $model->id,
                                    'parent_id' => $model->parent_id ?: null,
                                ];
                            }
                        )
                )->nullable(),
        ];

        // Trigger an event for adding fields.
        $event = new DefineFolderFieldsEvent($defaultFields);
        event($event);

        return $event->fields;
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        // Trigger an event for adding fields.
        $event = new DefineFolderActionsEvent(config('nova-folders.default_actions', []));
        event($event);

        return $event->actions;
    }
}
