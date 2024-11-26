<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Task extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $table='tasks';
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'due_date',
        'category_id',
    ];
}
