<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function candidats()
    {
        return $this->hasMany(Candidat::class, 'school_id');
    }

    public function moniteurs()
    {
        return $this->hasMany(Moniteur::class, 'school_id');
    }

    public function cars()
    {
        return $this->hasMany(Car::class, 'school_id');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'school_id');
    }


    public function phoneNumber($number)
    {
        $ac = substr($number, 0, 2);
        $prefix = substr($number, 2, 2);
        $suffix = substr($number, 4, 2);
        $last = substr($number, 6, 2);
        $digit = substr($number, 8);

        $formatted = "{$ac}-{$prefix}-{$suffix}-{$last}-{$digit}";
        return $formatted;
    }
}
