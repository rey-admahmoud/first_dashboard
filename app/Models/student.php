<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="students";
    protected $primaryKey="ssn";  
    protected $hidden=['updated_at','created_at'];
    protected $fillable =['ssn','fname','lname','username','email','dno','gender','image'];

    public function department(){
        return $this->belongsTo(department::class,'dno');
    }
    public  function subject(){
        return $this->belongsToMany(subject::class,'subject_students','id_student','id_subject');
    }
}