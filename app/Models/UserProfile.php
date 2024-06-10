<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'street_addr_1',
        'street_addr_2',
        'phone_number',
        'pin_code',
        'CIN',
        'linkedin_url',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function Document() {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }
    public function Reclamation() {
        return $this->hasOne(Reclamation::class, 'user_id', 'id');
    }

}
