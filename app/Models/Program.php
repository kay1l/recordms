<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $guarded = [];

 public function college(){
    return $this->belongsTo(College::class, 'collegeCode', 'collegeCode');
}
 public function activities(){
    return $this->hasmany(Activity::class, 'programId', 'proponentId');
}
public function reports()
{
    return $this->hasMany(Report::class, 'programId', 'programId');
}
protected $primaryKey = 'programId';
}








