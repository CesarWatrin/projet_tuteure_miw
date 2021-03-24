<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreRequest;
use App\Models\Moderation;
use App\Models\Store;
use App\Notifications\StoreDisabled;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class StoreCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class StoreCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation { show as traitShow; }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Store::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/store');
        CRUD::setEntityNameStrings(trans('macyo_custom.store'), trans('macyo_custom.stores'));

        $this->tableauState = [
            1 => trans('macyo_custom.store_disabled'),
            2 => trans('macyo_custom.first_validation_pending'),
            3 => trans('macyo_custom.validation_pending'),
            4 => trans('macyo_custom.store_enabled'),
        ];

    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

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
            'name' => 'address1',
            'label' => trans('macyo_custom.address1'),
        ]);

        $this->crud->addColumn([
            'name' => 'zip',
            'label' => trans('macyo_custom.zip'),
        ]);

        $this->crud->addColumn([
            'name' => 'city',
            'label' => trans('macyo_custom.city'),
        ]);

        $this->crud->addColumn([
            'name' => 'state',
            'label' => trans('macyo_custom.state'),
            'type' => 'select_from_array',
            'options' => $this->tableauState,
            'wrapper' => [
                'element' => 'span',
                'class' => function ($crud, $column, $entry, $related_key) {

                    switch ($entry->state) {
                        case 1: return 'badge badge-error';
                        case 2: return 'badge badge-warning';
                        case 3: return 'badge badge-info';
                        case 4: return 'badge badge-success';
                        default: return null;
                    }

                },
            ],
        ]);

        $this->crud->addColumn([
            'name' => 'manager_id',
            'label' => trans('macyo_custom.manager'),
            'type' => 'relationship',
            'attribute' => 'fullname',
            'wrapper' => [
                'element' => 'a',
                'href' => function ($crud, $column, $entry, $related_key) {
                    return backpack_url('user/'.$related_key.'/show');
                },
            ]
        ]);

        // dropdown filter
        $this->crud->addFilter([
            'name'  => 'state',
            'type'  => 'dropdown',
            'label' => trans('macyo_custom.state_long')
        ],
        $this->tableauState
        , function($value) { // if the filter is active
            $this->crud->addClause('where', 'state', $value);
        });

        $this->crud->removeButton('create');
        $this->crud->removeButton('update');
        $this->crud->removeButton('delete');

    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(StoreRequest::class);

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

        $this->crud->addColumn('id');

        $this->crud->addColumn([
            'name' => 'name',
            'label' => trans('backpack::base.name'),
        ]);

        $this->crud->addColumn([
            'name' => 'description',
            'label' => trans('macyo_custom.description'),
        ]);

        $this->crud->addColumn([
            'name' => 'category',
            'label' => trans('macyo_custom.category'),
            'type' => 'relationship',
            'attribute' => 'name',
        ]);

        $this->crud->addColumn([
            'name' => 'subcategory',
            'label' => trans('macyo_custom.subcategory'),
            'type' => 'relationship',
            'attribute' => 'name',
        ]);

        $this->crud->addColumn([
            'name' => 'state',
            'label' => trans('macyo_custom.state'),
            'type' => 'select_from_array',
            'options' => $this->tableauState,
            'wrapper' => [
                'element' => 'span',
                'class' => function ($crud, $column, $entry, $related_key) {

                    switch ($entry->state) {
                        case 1: return 'badge badge-error';
                        case 2: return 'badge badge-warning';
                        case 3: return 'badge badge-info';
                        case 4: return 'badge badge-success';
                        default: return null;
                    }

                },
            ],
        ]);

        $this->crud->addColumn([
            'name' => 'address1',
            'label' => trans('macyo_custom.address1'),
        ]);

        $this->crud->addColumn([
            'name' => 'address2',
            'label' => trans('macyo_custom.address2'),
        ]);

        $this->crud->addColumn([
            'name' => 'zip',
            'label' => trans('macyo_custom.zip'),
        ]);

        $this->crud->addColumn([
            'name' => 'city',
            'label' => trans('macyo_custom.city'),
        ]);

        $this->crud->addColumn([
            'name' => 'email',
            'type' => 'email',
            'label' => trans('backpack::base.email_address')
        ]);

        $this->crud->addColumn([
            'name' => 'phonenumber',
            'type' => 'phone',
            'label' => trans('macyo_custom.phonenumber')
        ]);

        $this->crud->addColumn([
            'name' => 'siret',
            'label' => trans('macyo_custom.siret'),
        ]);

        $this->crud->addColumn([
            'name' => 'catalog',
            'label' => trans('macyo_custom.catalog'),
            'type' => 'ckeditor',
        ]);

        $this->crud->addColumn([
            'name' => 'delivery',
            'label' => trans('macyo_custom.delivery'),
            'type' => 'boolean'
        ]);

        $this->crud->addColumn([
            'name' => 'delivery_conditions',
            'label' => trans('macyo_custom.delivery_conditions'),
        ]);

        $this->crud->addColumn([
            'name' => 'comments_code',
            'label' => trans('macyo_custom.comments_code'),
        ]);

        $this->crud->addColumn([
            'name' => 'website',
            'label' => trans('macyo_custom.website'),
            'wrapper' => [
                'element' => 'a',
                'href' => function ($crud, $column, $entry, $related_key) {
                    return $entry->website;
                },
            ]
        ]);

        $this->crud->addColumn([
            'name' => 'opening_hours',
            'label' => trans('macyo_custom.opening_hours'),
        ]);

        $this->crud->addColumn([
            'name' => 'manager_id',
            'label' => trans('macyo_custom.manager'),
            'type' => 'relationship',
            'attribute' => 'fullname',
            'wrapper' => [
                'element' => 'a',
                'href' => function ($crud, $column, $entry, $related_key) {
                    return backpack_url('user/'.$related_key.'/show');
                },
            ]
        ]);

        $content = $this->traitShow($id);

        $this->crud->removeButton('create');
        $this->crud->removeButton('update');
        $this->crud->removeButton('delete');

        $this->crud->addButtonFromView('line', 'disable_store', 'disable_store', 'beginning');
        $this->crud->addButtonFromView('line', 'enable_store', 'enable_store', 'beginning');

        return $content;
    }

    public function changeStoreState(Request $request) {
        $user_id = backpack_user()->id;
        $store_id = $request->input('store_id');
        $state = $request->input('state');
        $comment = $request->input('comment');

        // ajout entrée table moderations
        $moderation = new Moderation();
        $moderation->fill([
            'user_id' => $user_id,
            'store_id' => $store_id,
            'state' => $state,
            'comment' => $comment,
        ]);

        if($state == 1) {
            $moderation->sendStoreDisabledNotification();
        } elseif($state == 4) {
            $moderation->sendStoreEnabledNotification();
        }

        $moderationOK = $moderation->save();

        // changement state du store
        $store = Store::find($store_id);
        $store->state = $state;
        $storeOK = $store->save();

        return $storeOK && $moderationOK;
    }
}
