<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RatingRequest;
use App\Models\Rating;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;

/**
 * Class RatingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RatingCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation { show as traitShow; }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Rating::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/rating');
        CRUD::setEntityNameStrings(trans('macyo_custom.rating'), trans('macyo_custom.ratings'));

        $this->crud->addColumn('id');

        $this->crud->addColumn([
            'name' => 'user',
            'label' => trans('macyo_custom.user'),
            'type' => 'relationship',
            'attribute' => 'fullname',
            'wrapper' => [
                'element' => 'a',
                'href' => function ($crud, $column, $entry, $related_key) {
                    return backpack_url('user/'.$related_key.'/show');
                },
            ]
        ]);

        $this->crud->addColumn([
            'name' => 'store',
            'label' => trans('macyo_custom.store'),
            'type' => 'relationship',
            'attribute' => 'name',
            'wrapper' => [
                'element' => 'a',
                'href' => function ($crud, $column, $entry, $related_key) {
                    return backpack_url('store/'.$related_key.'/show');
                },
            ]
        ]);

        $this->crud->addColumn([
            'name' => 'rating',
            'label' => trans('macyo_custom.rating_value'),
            'suffix' => '/5'
        ]);

        $this->crud->addColumn([
            'name' => 'comment',
            'label' => trans('macyo_custom.comment'),
        ]);

        $this->crud->addColumn([
            'name' => 'reported',
            'label' => trans('macyo_custom.reported'),
            'type' => 'boolean',
            'wrapper' => [
                'element' => 'span',
                'class' => function ($crud, $column, $entry, $related_key) {

                    if($entry->reported)
                        return 'badge badge-error';

                    return 'badge badge-secondary';

                },
            ],
        ]);

        $this->crud->denyAccess('create');
        $this->crud->denyAccess('update');

    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        $this->crud->addFilter([
            'name'  => 'reported',
            'type'  => 'simple',
            'label' => trans('macyo_custom.reported_only'),
        ],
        false,
        function ($value) { // if the filter is active
            $this->crud->addClause('where', 'reported', '!=', $value);
        });

        //$this->crud->orderBy('reported', 'desc');

        $this->crud->addButton('line', 'remove_report', 'view', 'crud::buttons.remove_report', 'end');

    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(RatingRequest::class);

    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function show($id)
    {
        $this->crud->set('show.setFromDb', false);
        $this->crud->addButton('line', 'remove_report', 'view', 'crud::buttons.remove_report', 'end');

        $content = $this->traitShow($id);

        return $content;
    }

    public function removeReport($id) {
        $rating = Rating::find($id);
        $rating->reported = false;
        return $rating->save();
    }

}
