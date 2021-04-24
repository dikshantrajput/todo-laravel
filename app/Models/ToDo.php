<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ToDo extends Model
{
    use HasFactory;

    public $fillable = [
        'created_by',
        'todo_text',
        'end_at',
    ];

    public function getCreatedDateAttribute(){
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function getEndingDateAttribute(){
        return Carbon::parse(now())->diffForHumans($this->end_at);
    }
}
