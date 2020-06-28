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
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function sessionsExams()
    {
        return $this->belongsToMany(Exam::class);
    }
}
