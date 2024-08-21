<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class CapacitacionServicio extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'capacitacion_servicios';

    public $fillable = [
        'cliente_id',
        'estado_id',
        'equipo_id',
        'user_id',
        'precio',
        'fecha_recepcion',
        'problema',
        'fecha_diagnostico',
        'diagnostico',
        'fecha_entrega',
        'solucion'
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'fecha_recepcion' => 'date:d-m-Y',
        'problema' => 'string',
        'fecha_diagnostico' => 'date:d-m-Y',
        'diagnostico' => 'string',
        'fecha_entrega' => 'date:d-m-Y',
        'solucion' => 'string'
    ];

    public static $rules = [
        'cliente_id' => 'required',
        'estado_id' => 'required',
        'equipo_id' => 'required',
        'user_id' => 'required',
        'precio' => 'nullable|numeric',
        'fecha_recepcion' => 'required',
        'problema' => 'required|string|max:65535',
        'fecha_diagnostico' => 'nullable',
        'diagnostico' => 'nullable|string|max:45',
        'fecha_entrega' => 'nullable',
        'solucion' => 'nullable|string|max:65535',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function showForm()
    {
        $user = Auth::user();
        return view('resources/views/capacitacion_servicios/create.blade.php', ['username' => $user->name]);
    }


    public function cliente(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\CapacitacionCliente::class, 'cliente_id');
    }

    public function equipo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\CapacitacionEquipo::class, 'equipo_id');
    }

    public function estados(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\CapacitacionEstados::class, 'estado_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function getPrecioFormateadoAttribute()
    {
        /*return $this->precio ? number_format($this->precio, 2, '.', ',') : null;*/
        return $this->precio ? 'Q. ' .
            number_format($this->precio, 2, '.', ','): null;
    }
}
