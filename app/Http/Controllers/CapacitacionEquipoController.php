<?php

namespace App\Http\Controllers;

use App\DataTables\CapacitacionEquipoDataTable;
use App\Http\Requests\CreateCapacitacionEquipoRequest;
use App\Http\Requests\UpdateCapacitacionEquipoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\CapacitacionEquipo;
use Illuminate\Http\Request;

class CapacitacionEquipoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Equipos')->only('show');
        $this->middleware('permission:Crear Capacitacion Equipos')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Equipos')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Equipos')->only('destroy');
    }
    /**
     * Display a listing of the CapacitacionEquipo.
     */
    public function index(CapacitacionEquipoDataTable $capacitacionEquipoDataTable)
    {
    return $capacitacionEquipoDataTable->render('capacitacion_equipos.index');
    }


    /**
     * Show the form for creating a new CapacitacionEquipo.
     */
    public function create()
    {
        return view('capacitacion_equipos.create');
    }

    /**
     * Store a newly created CapacitacionEquipo in storage.
     */
    public function store(CreateCapacitacionEquipoRequest $request)
    {
        $input = $request->all();

        /** @var CapacitacionEquipo $capacitacionEquipo */
        $capacitacionEquipo = CapacitacionEquipo::create($input);

        flash()->success('Capacitacion Equipo guardado.');

        return redirect(route('capacitacionEquipos.index'));
    }

    /**
     * Display the specified CapacitacionEquipo.
     */
    public function show($id)
    {
        /** @var CapacitacionEquipo $capacitacionEquipo */
        $capacitacionEquipo = CapacitacionEquipo::find($id);

        if (empty($capacitacionEquipo)) {
            flash()->error('Capacitacion Equipo no encontrado');

            return redirect(route('capacitacionEquipos.index'));
        }

        return view('capacitacion_equipos.show')->with('capacitacionEquipo', $capacitacionEquipo);
    }

    /**
     * Show the form for editing the specified CapacitacionEquipo.
     */
    public function edit($id)
    {
        /** @var CapacitacionEquipo $capacitacionEquipo */
        $capacitacionEquipo = CapacitacionEquipo::find($id);

        if (empty($capacitacionEquipo)) {
            flash()->error('Capacitacion Equipo no encontrado');

            return redirect(route('capacitacionEquipos.index'));
        }

        return view('capacitacion_equipos.edit')->with('capacitacionEquipo', $capacitacionEquipo);
    }

    /**
     * Update the specified CapacitacionEquipo in storage.
     */
    public function update($id, UpdateCapacitacionEquipoRequest $request)
    {
        /** @var CapacitacionEquipo $capacitacionEquipo */
        $capacitacionEquipo = CapacitacionEquipo::find($id);

        if (empty($capacitacionEquipo)) {
            flash()->error('Capacitacion Equipo no encontrado');

            return redirect(route('capacitacionEquipos.index'));
        }

        $capacitacionEquipo->fill($request->all());
        $capacitacionEquipo->save();

        flash()->success('Capacitacion Equipo actualizado.');

        return redirect(route('capacitacionEquipos.index'));
    }

    /**
     * Remove the specified CapacitacionEquipo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var CapacitacionEquipo $capacitacionEquipo */
        $capacitacionEquipo = CapacitacionEquipo::find($id);

        if (empty($capacitacionEquipo)) {
            flash()->error('Capacitacion Equipo no encontrado');

            return redirect(route('capacitacionEquipos.index'));
        }

        $capacitacionEquipo->delete();

        flash()->success('Capacitacion Equipo eliminado.');

        return redirect(route('capacitacionEquipos.index'));
    }
}
