<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SubcategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SubcategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SubcategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Subcategory::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/subcategory');
        CRUD::setEntityNameStrings(trans('macyo_custom.subcategory'), trans('macyo_custom.subcategories'));
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        /*
        CRUD::column('id');
        CRUD::column('name');
        CRUD::column('category_id');
        CRUD::column('created_at');
        CRUD::column('updated_at');
        */

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */

        $this->crud->addColumn('id');

        $this->crud->addColumn([
            'name' => 'name',
            'label' => trans('backpack::base.name'),
        ]);
        $this->crud->addColumn([
            'name' => 'category',
            'label' => trans('macyo_custom.category'),
            'type' => 'relationship',
            'attribute' => 'name',
        ]);

        $this->crud->addFilter([
            'name'  => 'role',
            'type'  => 'dropdown',
            'label' => trans('macyo_custom.category')
        ], function () {
            return \App\Models\Category::all()->pluck('name', 'id')->all();
        }, function ($value) { // if the filter is active
            $this->crud->addClause('where', 'category_id', $value);
        });

        $this->crud->addFilter([
            'name'  => 'reported',
            'type'  => 'simple',
            'label' => trans('macyo_custom.can_be_deleted'),
        ],
            false,
            function ($value) { // if the filter is active
                $this->crud->addClause('whereDoesntHave', 'stores');
            });

        $this->crud->denyAccess('show');

        $this->crud->removeButton('delete');
        $this->crud->addButton('line', 'delete', 'view', 'crud::buttons.delete_if_no_children', 'end');

    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SubcategoryRequest::class);

        /*
        CRUD::field('id');
        CRUD::field('name');
        CRUD::field('category_id');
        CRUD::field('created_at');
        CRUD::field('updated_at');
        */

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */

        $this->crud->addField([
            'name' => 'name',
            'label' => trans('backpack::base.name'),
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'category_id',
            'label' => trans('macyo_custom.category'),
            'type' => 'select2',
            'entity' => 'category',
            'attribute' => 'name'
        ]);
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
}
