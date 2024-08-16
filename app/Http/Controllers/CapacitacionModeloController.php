<?php

namespace App\Http\Controllers;

use App\DataTables\CapacitacionModeloDataTable;
use App\Http\Requests\CreateCapacitacionModeloRequest;
use App\Http\Requests\UpdateCapacitacionModeloRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\CapacitacionModelo;
use Illuminate\Http\Request;

class CapacitacionModeloController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Modelos')->only('show');
        $this->middleware('permission:Crear Capacitacion Modelos')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Modelos')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Modelos')->only('destroy');
    }
    /**
     * Display a listing of the CapacitacionModelo.
     */
    public function index(CapacitacionModeloDataTable $capacitacionModeloDataTable)
    {
    return $capacitacionModeloDataTable->render('capacitacion_modelos.index');
    }


    /**
     * Show the form for creating a new CapacitacionModelo.
     */
    public function create()
    {
        return view('capacitacion_modelos.create');
    }

    /**
     * Store a newly created CapacitacionModelo in storage.
     */
    public function store(CreateCapacitacionModeloRequest $request)
    {
        $input = $request->all();

        /** @var CapacitacionModelo $capacitacionModelo */
        $capacitacionModelo = CapacitacionModelo::create($input);

        flash()->success('Capacitacion Modelo guardado.');

        return redirect(route('capacitacionModelos.index'));
    }

    /**
     * Display the specified CapacitacionModelo.
     */
    public function show($id)
    {
        /** @var CapacitacionModelo $capacitacionModelo */
        $capacitacionModelo = CapacitacionModelo::find($id);

        if (empty($capacitacionModelo)) {
            flash()->error('Capacitacion Modelo no encontrado');

            return redirect(route('capacitacionModelos.index'));
        }

        return view('capacitacion_modelos.show')->with('capacitacionModelo', $capacitacionModelo);
    }

    /**
     * Show the form for editing the specified CapacitacionModelo.
     */
    public function edit($id)
    {
        /** @var CapacitacionModelo $capacitacionModelo */
        $capacitacionModelo = CapacitacionModelo::find($id);

        if (empty($capacitacionModelo)) {
            flash()->error('Capacitacion Modelo no encontrado');

            return redirect(route('capacitacionModelos.index'));
        }

        return view('capacitacion_modelos.edit')->with('capacitacionModelo', $capacitacionModelo);
    }

    /**
     * Update the specified CapacitacionModelo in storage.
     */
    public function update($id, UpdateCapacitacionModeloRequest $request)
    {
        /** @var CapacitacionModelo $capacitacionModelo */
        $capacitacionModelo = CapacitacionModelo::find($id);

        if (empty($capacitacionModelo)) {
            flash()->error('Capacitacion Modelo no encontrado');

            return redirect(route('capacitacionModelos.index'));
        }

        $capacitacionModelo->fill($request->all());
        $capacitacionModelo->save();

        flash()->success('Capacitacion Modelo actualizado.');

        return redirect(route('capacitacionModelos.index'));
    }

    /**
     * Remove the specified CapacitacionModelo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var CapacitacionModelo $capacitacionModelo */
        $capacitacionModelo = CapacitacionModelo::find($id);

        if (empty($capacitacionModelo)) {
            flash()->error('Capacitacion Modelo no encontrado');

            return redirect(route('capacitacionModelos.index'));
        }

        $capacitacionModelo->delete();

        flash()->success('Capacitacion Modelo eliminado.');

        return redirect(route('capacitacionModelos.index'));
    }
}
