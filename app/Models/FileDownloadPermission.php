<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileDownloadPermission extends Model
{
    protected $fillable = ['user_id', 'can_download'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
