<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'salary',
        'company_size',
        'profile_pic'
    ];
    public function getProfilePicAttribute($value)
    {
        return 'storage/' . $value;
    }
}
