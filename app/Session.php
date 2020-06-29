<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use SoftDeletes;
    
    public $table = 'sessions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'active_at'
    ];

    protected $fillable = [
        'active_at',
        'exam_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }


    public function sessionResults()
    {
        return $this->hasMany(Result::class, 'session_id', 'id');
    }

    
}
