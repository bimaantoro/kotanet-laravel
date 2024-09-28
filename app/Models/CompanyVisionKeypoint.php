<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyVisionKeypoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_about_id',
        'keypoint'
    ];
}
