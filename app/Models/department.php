<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class department extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="departments";
    protected $primaryKey="dno"; 
    protected $hidden=['updated_at','created_at'];
    protected $fillable=['dno','dname'] ;
    public function student(){
        return $this->hasMany(student::class,'dno');
    }
    public function subject(){
        return $this->belongsToMany(subject::class,'subject_departs','dno','id_subject');
    }
}
