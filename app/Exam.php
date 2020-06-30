<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;


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

    public function deleteImage(){
        if(Storage::exists(substr($this->image,8))){
            Storage::delete(substr($this->image,8));
        }
    }
    
    public function examQuestions()
    {
        return $this->hasMany(Question::class, 'exam_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function examSessions()
    {
        return $this->hasMany(Session::class, 'exam_id', 'id');
    }
    
    public function activeSessions()
    {
        return $this->hasMany(Session::class, 'exam_id', 'id')->where('active_at', '>=', now());
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tagId){
        return in_array($tagId,$this->tags->pluck('id')->toArray());
    }

    public function scopeSearched($query)
    {
        $search = request()->query('search');
        
        if(!$search){
            return $query;
        }
        return $query->where('title', 'LIKE', "%{$search}%");
    }


}
