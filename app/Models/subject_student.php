<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject_student extends Model
{
    use HasFactory;
    protected $table='subject_students';
    protected $primaryKey='id';
    protected $hidden=['updated_at','created_at'];
    protected $fillable=['id_subject','id_student'];
}
