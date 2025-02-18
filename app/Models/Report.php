<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_code', 'activity_code');
    }

    // A report belongs to a college
    public function college()
    {
        return $this->belongsTo(College::class, 'collegeCode', 'collegeCode');
    }

    // A report belongs to a program
    public function program()
    {
        return $this->belongsTo(Program::class, 'programId', 'programId');
    }
    use HasFactory;

    protected $guarded = [];
}
