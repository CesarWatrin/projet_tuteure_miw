<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserRequestUpdate;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation { show as traitShow; }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings(trans('macyo_custom.user'), trans('macyo_custom.users'));

        $this->crud->addColumn([
            'name' => 'surname',
            'label' => trans('macyo_custom.surname')
        ]);

        $this->crud->addColumn([
            'name' => 'firstname',
            'label' => trans('macyo_custom.firstname')
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
            'name' => 'role',
            'type' => 'relationship',
            'label' => trans('macyo_custom.role'),
            'entity'    => 'role',
            'attribute' => 'name','wrapper' => [
                'element' => 'span',
                'class' => function ($crud, $column, $entry, $related_key) {

                    switch ($entry->role_id) {
                        case 1: return 'badge badge-secondary';
                        case 2: return 'badge badge-primary';
                        case 3: return 'badge badge-dark';
                        default: return null;
                    }

                },
            ],
        ]);
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::column('surname');
        //CRUD::column('firstname');
        //CRUD::column('phonenumber');
        //CRUD::column('email');
        //CRUD::column('password');
        //CRUD::column('role_id');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */

        $this->crud->addFilter([
            'name'  => 'role',
            'type'  => 'dropdown',
            'label' => trans('macyo_custom.role')
        ], function () {
            return \App\Models\Role::all()->pluck('name', 'id')->all();
        }, function ($value) { // if the filter is active
            $this->crud->addClause('where', 'role_id', $value);
        });

        //$this->crud->denyAccess('show');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);

        //CRUD::field('surname');
        //CRUD::field('firstname');
        //CRUD::field('phonenumber');
        //CRUD::field('email');
        //CRUD::field('password');
        //CRUD::field('role_id');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */

        $this->crud->addField([
            'name' => 'surname',
            'label' => trans('macyo_custom.surname')
        ]);
        $this->crud->addField([
            'name' => 'firstname',
            'label' => trans('macyo_custom.firstname'),
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'email',
            'label' => trans('backpack::base.email_address'),
            'type' => 'email'
        ]);
        $this->crud->addField([
            'name' => 'phonenumber',
            'label' => trans('macyo_custom.phonenumber'),
            'type' => 'text',
            'attributes' => ['maxlength' => '10']
        ]);
        $this->crud->addField([
            'name' => 'role_id',
            'label' => trans('macyo_custom.role'),
            'type' => 'select2',
            'entity' => 'role',
            'attribute' => 'name'
        ]);
        $this->crud->addField([
            'name' => 'password',
            'label' => trans('backpack::base.password'),
            'type' => 'password'
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
        $this->crud->setValidation(UserRequestUpdate::class);

        if($this->crud->getCurrentEntry()->role_id === 1) {
            $this->crud->removeField('phonenumber');
        }
    }

    public function store()
    {
        $this->crud->setRequest($this->crud->validateRequest());

        /** @var \Illuminate\Http\Request $request */
        $request = $this->crud->getRequest();

        // Encrypt password if specified.
        if ($request->input('password')) {
            $request->request->set('password', Hash::make($request->input('password')));
        } else {
            $request->request->remove('password');
        }

        $this->crud->setRequest($request);
        $this->crud->unsetValidation(); // Validation has already been run

        return $this->traitStore();
    }

    public function update()
    {
        $this->crud->setRequest($this->crud->validateRequest());

        /** @var \Illuminate\Http\Request $request */
        $request = $this->crud->getRequest();

        // Encrypt password if specified.
        if ($request->input('password')) {
            $request->request->set('password', Hash::make($request->input('password')));
        } else {
            $request->request->remove('password');
        }

        $this->crud->setRequest($request);
        $this->crud->unsetValidation(); // Validation has already been run

        return $this->traitUpdate();
    }

    public function show($id)
    {
        $this->crud->set('show.setFromDb', false);

        $content = $this->traitShow($id);

        return $content;
    }
}
