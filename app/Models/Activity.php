<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

   protected $primaryKey = 'activity_code';
   public $incrementing = false;
   protected $keyType = 'string';
   protected $casts = [ 'start' => 'date', 'end' => 'date'];
   

    

    public function college()
    {
        return $this->belongsTo(College::class, 'collegeCode', 'collegeCode');
    }
    public function program()
    {
        return $this->belongsTo(Program::class, 'proponentId', 'programId',);
    }
    public function reports()
    {
        return $this->hasMany(Report::class, 'activity_code', 'activity_code');
    }

        public function getProgress(){
            $totalFiles = 5;
            $uploadedFiles = 0;

            if ($this->moa_uploaded) $uploadedFiles++;
            if ($this->proposal_uploaded) $uploadedFiles++;
            if ($this->attendance_uploaded) $uploadedFiles++;
            if ($this->evaluation_uploaded) $uploadedFiles++;
            if ($this->terminal_uploaded) $uploadedFiles++;

            return ($uploadedFiles / $totalFiles) * 100;
        }
        public function updateStatus(){
            $progress =$this->getProgress();

            if ($progress <= 20) {
                $this->status = 'Pending';
            } elseif ($progress >= 40 && $progress < 100) {
                $this->status = 'In Progress';
            } elseif ($progress == 100) {
                $this->status = 'Completed';
            }
            $this->save();
        }




    /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'activity_code',
    'activity_name',
    'collegeCode',
    'proponentId',
    'collegeCode1',
    'proponentId1',
    'proponent',
    'proponents',
    'proponent_update',
    'proponents_update',
    'year',
    'year_update',
    'budget',
    'start',
    'end',
    'start_update',
    'end_update',
    'status',
    'moa_uploaded',
    'proposal_uploaded',
    'attendance_uploaded',
    'evaluation_uploaded',
    'terminal_uploaded',
    'created_at',
    'updated_at',
];
  
 
}
