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
            [
                'label'        => "Course Image",
                'name'         => "image",
                'type'         => 'image',
                'upload'       => true,
                'crop'         => true, // set to true to allow cropping, false to disable
                'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
                // 'disk'      => 's3_bucket', // in case you need to show images from a different disk
                // 'prefix'    => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
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
            [   // Number
                'name' => 'rate',
                'label' => 'Course Rate',
                'type' => 'number',
                // optionals
                'attributes' => ["step" => "0.5"], // allow decimals
                // 'prefix' => "",
                'suffix' => "Stars out of 5",
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
            [
                'label'        => "Course Image",
                'name'         => "image",
                'type'         => 'image',
                'upload'       => true,
                'crop'         => true, // set to true to allow cropping, false to disable
                'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
                // 'disk'      => 's3_bucket', // in case you need to show images from a different disk
                // 'prefix'    => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
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
            [   // Number
                'name' => 'rate',
                'label' => 'Course Rate',
                'type' => 'number',
                // optionals
                'attributes' => ["step" => "0.5"], // allow decimals
                // 'prefix' => "",
                'suffix' => "Stars out of 5 Stars",
            ],
            
            
            
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
