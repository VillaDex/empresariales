<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable =[
        'nombre',
        'email',
        'telefono',
    ];

    public function productos(){
        return $this->belongsToMany(Producto::class, 'ventas');
}
}
