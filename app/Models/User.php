<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public $fillable=['org_id','name','birthday','email','account','password'];

    public function apply_file()
    {
        return $this->belongsTo(ApplyFile::class);
    }
}
