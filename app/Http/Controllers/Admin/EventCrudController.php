<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Requests\EventRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Instructor;
/**
 * Class EventCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EventCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Event');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/event');
        $this->crud->setEntityNameStrings('event', 'events');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();
        $this->crud->addColumns([
            ['name' => 'name', 'type' => 'text', 'label' => 'Name'],
            ['name' => 'description', 'type' => 'text', 'label' => 'Description'],
            ['name' => 'location' , 'type' => 'text' , 'label' => 'Location'],
            ['name' => 'date' , 'type' => 'date' , 'label' => 'Date'],
            [
                'label'        => "Image",
                'name'         => "image",
                'type'         => 'image',
                'upload'       => true,
                'crop'         => false,
                'aspect_ratio' => 0,
            ],
            [  // Select
                'label'     => "Instructor",
                'type'      => 'select',
                'name'      => 'user_id', // the db column for the foreign key
                'entity'    => 'user', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
            ]
        ]);
            // $this->crud->addButton();
        $this->crud->filters();
    }
    protected function setupShowOperation(){
        $this->crud->addColumns([
        ['name' => 'name', 'type' => 'text', 'label' => 'Name'],
        ['name' => 'description', 'type' => 'text', 'label' => 'Description'],
        ['name' => 'location' , 'type' => 'text' , 'label' => 'Location'],
        ['name' => 'date' , 'type' => 'date' , 'label' => 'Date'],
        [
                'label'        => "Image",
                'name'         => "image",
                'type'         => 'image',
                'upload'       => true,
                'crop'         => false,
                'aspect_ratio' => 0, 
        ],
        [  // Select
            'label'     => "Instructor",
            'type'      => 'select',
            'name'      => 'user_id', // the db column for the foreign key
            'entity'    => 'user', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
        ]
        ]);
    }
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(EventRequest::class);
        $this->crud->addFields([
        [   // Name
            'name'  => 'name',
            'label' => 'Name',
            'type'  => 'text'
        ],
        [   // Description
            'name'  => 'description',
            'label' => 'Description',
            'type'  => 'ckeditor'
        ],
        [   // Date
            'name'  => 'date',
            'label' => 'Date',
            'type'  => 'date'
        ],
        [   // location
            'name'  => 'location',
            'label' => 'Location',
            'type'  => 'address'
        ],
        [   // Image
            'label'        => "Profile Image",
            'name'         => "image",
            'filename'     => "image_filename", // set to null if not needed
            'type'         => 'base64_image',
            'aspect_ratio' => 1, // set to 0 to allow any aspect ratio
            'crop'         => true, // set to true to allow cropping, false to disable
            'src'          => NULL,
        ],
        [  // Select
            'label'     => "Instructor",
            'type'      => 'select',
            'name'      => 'user_id', // the db column for the foreign key
            'entity'    => 'user', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user

            // optional
            'model'     => "App\User",
            'options'   => (function ($query) {
                $instructors = [];
                 $users = $query->get();
                 foreach ($users as $user){
                     if ($user->hasRole('instructor'))
                        $instructors[] = $user;
                 }
                 return $instructors;
             }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
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
