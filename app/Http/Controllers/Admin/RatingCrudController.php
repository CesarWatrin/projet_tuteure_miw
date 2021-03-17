<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RatingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

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
        CRUD::setEntityNameStrings('rating', 'ratings');

        $this->crud->addColumn([
            'name' => 'user',
            'label' => 'First name',
            'type' => 'relationship',
            'attribute' => 'firstname',
        ]);
        $this->crud->addColumn([
            'name' => 'user',
            'label' => 'Surname',
            'type' => 'relationship',
            'attribute' => 'surname',
            'key' => 'user_surname'
        ]);

        $this->crud->addColumn([
            'name' => 'store',
            'type' => 'relationship',
            'attribute' => 'name',
        ]);

        $this->crud->addColumn([
            'name' => 'rating',
            'suffix' => '/5'
        ]);

        $this->crud->addColumn([
            'name' => 'comment',
        ]);

        $this->crud->addColumn([
            'name' => 'reported',
            'type' => 'boolean'
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
//        CRUD::column('user_id');
//        CRUD::column('store_id');
//        CRUD::column('rating');
//        CRUD::column('comment');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */

        /*$this->crud->addColumn([
            'name' => 'surname'
        ]);

        $this->crud->addColumn([
            'name' => 'firstname',
            'label' => 'First name'
        ]);*/

        $this->crud->addFilter([
            'name'  => 'reported',
            'type'  => 'simple',
            'label' => 'Reported ratings only'
        ],
        false,
        function ($value) { // if the filter is active
            $this->crud->addClause('where', 'reported', '!=', $value);
        });

        $this->crud->orderBy('reported', 'desc');

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

//        CRUD::field('user_id');
//        CRUD::field('store_id');
//        CRUD::field('rating');
//        CRUD::field('comment');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
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

        $content = $this->traitShow($id);

        return $content;
    }

}
