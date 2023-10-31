<?php

namespace Creode\LaravelNovaFolders\Nova;

use App\Nova\Resource;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Creode\LaravelFolderTaxonomy\Models\Folder;
use Creode\LaravelNovaFolders\Events\DefineFolderFieldsEvent;
use Creode\LaravelNovaFolders\Events\DefineFolderActionsEvent;
use Laravel\Nova\Fields\BelongsTo;

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
            BelongsTo::make('Parent', 'parent', FolderResource::class)->nullable(), // TODO: Show slug.
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
