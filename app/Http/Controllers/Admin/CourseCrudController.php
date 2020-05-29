<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CourseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CourseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CourseCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Course');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/course');
        $this->crud->setEntityNameStrings('course', 'courses');
    }

    protected function setupListOperation()
    {
        
        $this->crud->addColumns([
            ['name' => 'name', 'type' => 'text', 'label' => 'Course name'],
            [  // Select
                'label'     => "Instructor",
                'type'      => 'select',
                'name'      => 'instructor_id',
                'entity'    => 'instructor', 
                'attribute' => 'name', 
                'model' => 'App\Instructor',
            ],
           
        ]);
        $this->crud->filters();
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        $this->crud->addColumns([
            ['name' => 'name', 'type' => 'text', 'label' => 'Course name'],
            [  // Select
                'label'     => "Instructor",
                'type'      => 'select',
                'name'      => 'instructor_id',
                'entity'    => 'instructor', 
                'attribute' => 'name', 
                'model' => 'App\Instructor',
            ],
           
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CourseRequest::class);

        $this->crud->addFields([
            ['name' => 'name', 'type' => 'text', 'label' => 'Course name'],
            [  // Select
                'label'     => "Instructor",
                'type'      => 'select',
                'name'      => 'instructor_id',
                'entity'    => 'instructor', 
                'attribute' => 'name', 
                'model' => 'App\Instructor',
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
