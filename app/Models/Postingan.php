<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory;
    protected $table = 'postingan';
    protected $fillable = [
        'harga', 'deskripsi','gambar','judul','id_pesanan'
    ];

    protected $primaryKey = 'id_postingan';

    protected $guarded =[];

    public function pesanan()
{
    return $this->hasMany(Pesanan::class, 'id_postingan', 'id');
}

}
