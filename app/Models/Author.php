<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors'; // Nombre de la tabla

    protected $fillable = ['name', 'country']; // Atributos asignables en masa

    // Relación con las reseñas
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
