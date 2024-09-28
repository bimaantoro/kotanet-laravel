<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAbout extends Model
{
    use HasFactory;

    protected $fillable = [
        'description'
    ];

    public function visionKeypoints()
    {
        return $this->hasMany(CompanyVisionKeypoint::class);
    }

    public function missionKeypoints()
    {
        return $this->hasMany(CompanyMissionKeypoint::class);
    }
}
