<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'cliente_id',
        'producto_id',
        'cantidad',
        'precio',
    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }


    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public static function boot()
    {
        parent::boot();
        static::created(function ($venta) {
            $producto = $venta->producto;
            $producto->stock -= $venta->cantidad;
            $producto->save();
});
}
}
