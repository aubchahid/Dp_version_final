<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moniteur extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class);
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
