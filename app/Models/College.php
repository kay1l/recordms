<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;
    /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $guarded = [];

    public function activity(){
        return $this->hasMany(Activity::class,'collegeCode', 'collegeCode');
    }
 public function programs()
 {
     return $this->hasMany(Program::class);
 }
 public function reports()
 {
     return $this->hasMany(Report::class, 'collegeCode', 'collegeCode');
 }
 protected $primaryKey = 'collegeCode';

}
