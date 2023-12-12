<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'profile_photo',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
