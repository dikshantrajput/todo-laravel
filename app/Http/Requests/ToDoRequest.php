<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ToDoRequest extends FormRequest
{
    protected $yesterday;
    
    protected $stopOnFirstFailure = true;

    public function __construct()
    {
        $this->yesterday = Carbon::yesterday();
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'created_by'=>['required','string','max:100'],
            'end_at'=>['required','date','after:'. $this->yesterday],
            'todo_text'=>['required','string','max:250'],
        ];
    }

    public function messages(){
        return [
            'created_by.required' => 'Name field is required',
            'created_by.max' => 'Name should not be longer than 100 characters',
            'created_by.string' => 'Name should be string',
            
            'todo_text.required' => 'To Do Text field is required',
            'todo_text.max' => 'To Do Text should not be longer than 250 characters',
            'todo_text.string' => 'To Do Text should be string',

            'end_at.required'=>'Deadline field is required',
            'end_at.date'=>'Deadline should be a valid date',
            'end_at.after'=>'Deadline should not be a date less than today',
        ];
    }
}
