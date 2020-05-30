<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ScheduleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ScheduleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ScheduleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Schedule');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/schedule');
        $this->crud->setEntityNameStrings('schedule', 'schedules');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();
        $this->crud->addColumns([
            [   // Start Date
                'name'  => 'start_date',
                'label' => 'StartDate',
                'type'  => 'date'
            ],
            [   // End Date
                'name'  => 'end_date',
                'label' => 'EndDate',
                'type'  => 'date'
            ],
            [   // Date
                'name'  => 'time',
                'label' => 'Time',
                'type'  => 'time'
            ],
            [  // Select
                'label'     => "Instructor",
                'type'      => 'select',
                'name'      => 'instructor_id',
                'entity'    => 'instructor', 
                'attribute' => 'name', 
                'model' => 'App\Instructor',
            ],
            [  // Select
                'label'     => "Course",
                'type'      => 'select',
                'name'      => 'course_id',
                'entity'    => 'course', 
                'attribute' => 'name', 
                'model' => 'App\Models\Course',
            ]
            ]);
    }
    protected function setupShowOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();
        $this->crud->addColumns([
            [   // Start Date
                'name'  => 'start_date',
                'label' => 'StartDate',
                'type'  => 'date'
            ],
            [   // End Date
                'name'  => 'end_date',
                'label' => 'EndDate',
                'type'  => 'date'
            ],
            [   // Date
                'name'  => 'time',
                'label' => 'Time',
                'type'  => 'time'
            ],
            [  // Select
                'label'     => "Instructor",
                'type'      => 'select',
                'name'      => 'instructor_id',
                'entity'    => 'instructor', 
                'attribute' => 'name', 
                'model' => 'App\Instructor',
            ],
            [  // Select
                'label'     => "Course",
                'type'      => 'select',
                'name'      => 'course_id',
                'entity'    => 'course', 
                'attribute' => 'name', 
                'model' => 'App\Models\Course',
            ]
            ]);
    }
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ScheduleRequest::class);
        $this->crud->addFields([
            [   // Start Date
                'name'  => 'start_date',
                'label' => 'StartDate',
                'type'  => 'date'
            ],
            [   // End Date
                'name'  => 'end_date',
                'label' => 'EndDate',
                'type'  => 'date'
            ],
            [   // Date
                'name'  => 'time',
                'label' => 'Time',
                'type'  => 'time'
            ],
            [  // Select
                'label'     => "Instructor",
                'type'      => 'select',
                'name'      => 'instructor_id',
                'entity'    => 'instructor', 
                'attribute' => 'name', 
                'model' => 'App\Instructor',
            ],
            [  // Select
                'label'     => "Course",
                'type'      => 'select',
                'name'      => 'course_id',
                'entity'    => 'course', 
                'attribute' => 'name', 
                'model' => 'App\Models\Course',
            ]
            ]);
        // TODO: remove setFromDb() and manually define Fields
        // $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
