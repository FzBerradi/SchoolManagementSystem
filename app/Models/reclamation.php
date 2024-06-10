<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reclamation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'object',
        'subject',
        'file'
    ];
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function userProfile() {
        return $this->hasOne(UserProfile::class, 'id', 'user_id');
    }
}
