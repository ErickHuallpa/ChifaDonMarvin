<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use HasFactory, Notifiable;
    protected $table = 'users';

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'usuario',
        'password',
        'rol',
        'estado',
    ];

    /**
     * Los atributos que deben estar ocultos cuando el modelo se serializa.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que se deben castear a otros tipos de datos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'estado' => 'boolean',
    ];

    /**
     * Relación con el modelo Persona (opcional, por la clave foránea)
     */
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id', 'id');
    }

    /**
     * Si quieres devolver algún valor útil como iniciales (opcional)
     */
    public function initials(): string
    {
        // Suponiendo que haya relación con Persona, podrías hacer:
        return $this->persona
            ? strtoupper(substr($this->persona->nombre, 0, 1) . substr($this->persona->apellido, 0, 1))
            : '';
    }
};
