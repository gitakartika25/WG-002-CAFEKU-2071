<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $guarded = ['id'];

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id'); // relasi menu dengan kategori, 1 menu termasuk  dalam satu kategori
    }
}
