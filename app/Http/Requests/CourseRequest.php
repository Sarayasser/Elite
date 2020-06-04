<?php

namespace App\Http\Requests;
use App\Models\Course;
use Illuminate\Validation\Rule;
use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   $id = $this->route('id');
        return [
            'name'=> ['required','unique:courses,name,'.$id],
            'instructor_id' => "required|exists:instructors,id",
            'description' => 'required|min:3',
            'age'=>'required|gte:3|lte:120',
            'duration'=>'required|gte:1|lte:12',
            'capacity'=>'required|gte:10|lte:100',
            'price'=>'required|gte:0|lte:10000',
            'rate'=>'required|gte:1|lte:5',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
