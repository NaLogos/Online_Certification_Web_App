<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Exam extends Model
{
    use SoftDeletes;

    public $table = 'exams';


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function examQuestions()
    {
        return $this->hasMany(Question::class, 'exam_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
