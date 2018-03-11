<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\TaskRequest as StoreRequest;
use App\Http\Requests\TaskRequest as UpdateRequest;

class TaskCrudController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel('App\Models\Task');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/task');
        $this->crud->setEntityNameStrings('task', 'tasks');

        $this->crud->addColumn('name');
        $this->crud->addColumn('description');
        $this->crud->addColumn([
            'label' => "Status",
            'type' => "select",
            'name' => 'status_id',
            'entity' => 'status',
            'attribute' => "name",
            'model' => "App\Models\Status",
        ]);
        $this->crud->addColumn('due_to');

        $this->crud->addField([
            'name' => 'name',
            'label' => "Name"
        ]);
        $this->crud->addField([
            'name' => 'description',
            'label' => "Description"
        ]);

        $this->crud->addField([
            'label' => "Status",
            'type' => 'select2',
            'name' => 'status_id',
            'entity' => 'status',
            'attribute' => 'name',
            'model' => "App\Models\Status"
        ]);

        $this->crud->addField([
            'name' => 'due_to',
            'label' => "End date"
        ]);

        $this->crud->addField(
            [   // DateTime
                'name' => 'due_to',
                'label' => 'End date',
                'type' => 'datetime_picker',
                // optional:
                'datetime_picker_options' => [
                    'format' => 'DD/MM/YYYY HH:mm',
                    'language' => 'fr'
                ],
                'allows_null' => true,
            ]
        );

        $this->crud->addButtonFromView('line', 'status', 'markTaskStatusAsFinished', 'end');
        //$this->crud->addButtonFromView('line', 'Delete', '', 'end');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
