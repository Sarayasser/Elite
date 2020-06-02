<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CourseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Course;
use App\User;

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

    // public function index(){
        
    //     $courses=Course::all();
    //     return view('courses.index',[
    //         'courses'=>$courses
    //     ]);
    // }
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
            [   // Number
                'name' => 'age',
                'label' => 'Class Age',
                'type' => 'number',
                // optionals
                // 'attributes' => ["step" => "any"], // allow decimals
                // 'prefix' => "",
                'suffix' => "Years",
            ],
            [   // Number
                'name' => 'duration',
                'label' => 'Duration',
                'type' => 'number',
                // optionals
                'attributes' => ["step" => "any"], // allow decimals
                // 'prefix' => "",
                'suffix' => "Month",
            ],
            [   // Number
                'name' => 'capacity',
                'label' => 'Class Capacity',
                'type' => 'number',
                // optionals
                // 'attributes' => ["step" => "any"], // allow decimals
                // 'prefix' => "",
                'suffix' => "Student",
            ],
            [   // Textarea
                'name' => 'description',
                'label' => 'Description',
                'type' => 'textarea'
            ],
            [   // Number
                'name' => 'price',
                'label' => 'Price',
                'type' => 'number',
                // optionals
                // 'attributes' => ["step" => "any"], // allow decimals
                'prefix' => "$",
                'suffix' => ".00",
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
            [   // Number
                'name' => 'age',
                'label' => 'Class Age',
                'type' => 'number',
                // optionals
                // 'attributes' => ["step" => "any"], // allow decimals
                // 'prefix' => "",
                'suffix' => "Years",
            ],
            [   // Number
                'name' => 'duration',
                'label' => 'Duration',
                'type' => 'number',
                // optionals
                'attributes' => ["step" => "any"], // allow decimals
                // 'prefix' => "",
                'suffix' => "Month",
            ],
            [   // Number
                'name' => 'capacity',
                'label' => 'Class Capacity',
                'type' => 'number',
                // optionals
                // 'attributes' => ["step" => "any"], // allow decimals
                // 'prefix' => "",
                'suffix' => "Student",
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
