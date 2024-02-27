<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tarea extends Model
{
    use HasFactory;

    // No deja modificar todos los que estén dentro de corchetes, si esta vacio deja modificar todo
    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at'];

    public function etiquetas(): BelongsToMany
    {
        return $this->belongsToMany(Etiqueta::class, 'tarea_etiqueta','tarea_id', 'etiqueta_id');
    }
}
