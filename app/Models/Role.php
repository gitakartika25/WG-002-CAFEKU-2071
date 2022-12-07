<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table;
    protected $guarded = ['id'];

    public function user() {
        return $this->hasMany(User::class); // relasi role dengan user, 1 role memiliki banyak user
    }
}
