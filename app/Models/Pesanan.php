<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $fillable = [
        'name', 'email','phone','id_postingan'
    ];

    protected $primaryKey = 'id_pesanan';

    public function postingan()
{
    return $this->belongsTo(Postingan::class, 'id_postingan', 'id');
}

}
