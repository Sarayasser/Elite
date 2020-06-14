<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PostCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PostCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Post');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/post');
        $this->crud->setEntityNameStrings('post', 'posts');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->addColumns([
            ['name' => 'title', 'type' => 'text', 'label' => 'Title'],
            [  // Select
                'label'     => "Author",
                'type'      => 'select',
                'name'      => 'user_id',
                'entity'    => 'user', 
                'attribute' => 'name',
                // 'model'     => "App\User",
                // 'options'   => (function ($query) {
                //     return $query->orderBy('name', 'ASC')->where('depth', 1)->get();
                // }),
            ],
            [
                'label'        => "Image",
                'name'         => "image",
                'type'         => 'image',
                'upload'       => true,
                'crop'         => false, 
                'aspect_ratio' => 0, 
            ],
            [   // URL
                'name'            => 'video',
                'label'           => 'Link to video file on YouTube or Vimeo',
                'type'            => 'video',
                'youtube_api_key' => 'AIzaSycLRoVwovRmbIf_BH3X12IcTCudAErRlCE',
            ],
        ]);

        $this->crud->filters();
    }

    protected function setupShowOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->addColumns([
            ['name' => 'title', 'type' => 'text', 'label' => 'Title'],
            ['name' => 'description', 'type' => 'textarea', 'label' => 'Description'],
            [  // Select
                'label'     => "Author",
                'type'      => 'select',
                'name'      => 'user_id',
                'entity'    => 'user', 
                'attribute' => 'name', 
            ],
            [
                'label'        => "Image",
                'name'         => "image",
                'type'         => 'image',
                'upload'       => true,
                'crop'         => false,
                'aspect_ratio' => 0, 
            ],
            [   // URL
                'name'            => 'video',
                'label'           => 'Link to video file on YouTube or Vimeo',
                'type'            => 'video',
                'youtube_api_key' => 'AIzaSycLRoVwovRmbIf_BH3X12IcTCudAErRlCE',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(PostRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->addFields([
            ['name' => 'title', 'type' => 'text', 'label' => 'Title'],
            [   // CKEditor
                'name'          => 'description',
                'label'         => 'Description',
                'type'          => 'summernote',
            ],
            [  // Select
                'label'     => "Author",
                'type'      => 'select',
                'name'      => 'user_id',
                'entity'    => 'user', 
                'attribute' => 'name',
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
                }),
            ],
            [
                'label'        => "Image",
                'name'         => "image",
                'type'         => 'image',
                'upload'       => true,
                'crop'         => false, // set to true to allow cropping, false to disable
                'aspect_ratio' => 0, // ommit or set to 0 to allow any aspect ratio
                // 'disk'      => 's3_bucket', // in case you need to show images from a different disk
                // 'prefix'    => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
            ],
            [   // URL
                'name'            => 'video',
                'label'           => 'Link to video on Vimeo',
                'type'            => 'video',
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
