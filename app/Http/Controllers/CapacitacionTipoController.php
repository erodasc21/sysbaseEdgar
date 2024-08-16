<?php

namespace App\Http\Controllers;

use App\DataTables\CapacitacionTipoDataTable;
use App\Http\Requests\CreateCapacitacionTipoRequest;
use App\Http\Requests\UpdateCapacitacionTipoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\CapacitacionTipo;
use Illuminate\Http\Request;

class CapacitacionTipoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Tipos')->only('show');
        $this->middleware('permission:Crear Capacitacion Tipos')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Tipos')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Tipos')->only('destroy');
    }
    /**
     * Display a listing of the CapacitacionTipo.
     */
    public function index(CapacitacionTipoDataTable $capacitacionTipoDataTable)
    {
    return $capacitacionTipoDataTable->render('capacitacion_tipos.index');
    }


    /**
     * Show the form for creating a new CapacitacionTipo.
     */
    public function create()
    {
        return view('capacitacion_tipos.create');
    }

    /**
     * Store a newly created CapacitacionTipo in storage.
     */
    public function store(CreateCapacitacionTipoRequest $request)
    {
        $input = $request->all();

        /** @var CapacitacionTipo $capacitacionTipo */
        $capacitacionTipo = CapacitacionTipo::create($input);

        flash()->success('Capacitacion Tipo guardado.');

        return redirect(route('capacitacionTipos.index'));
    }

    /**
     * Display the specified CapacitacionTipo.
     */
    public function show($id)
    {
        /** @var CapacitacionTipo $capacitacionTipo */
        $capacitacionTipo = CapacitacionTipo::find($id);

        if (empty($capacitacionTipo)) {
            flash()->error('Capacitacion Tipo no encontrado');

            return redirect(route('capacitacionTipos.index'));
        }

        return view('capacitacion_tipos.show')->with('capacitacionTipo', $capacitacionTipo);
    }

    /**
     * Show the form for editing the specified CapacitacionTipo.
     */
    public function edit($id)
    {
        /** @var CapacitacionTipo $capacitacionTipo */
        $capacitacionTipo = CapacitacionTipo::find($id);

        if (empty($capacitacionTipo)) {
            flash()->error('Capacitacion Tipo no encontrado');

            return redirect(route('capacitacionTipos.index'));
        }

        return view('capacitacion_tipos.edit')->with('capacitacionTipo', $capacitacionTipo);
    }

    /**
     * Update the specified CapacitacionTipo in storage.
     */
    public function update($id, UpdateCapacitacionTipoRequest $request)
    {
        /** @var CapacitacionTipo $capacitacionTipo */
        $capacitacionTipo = CapacitacionTipo::find($id);

        if (empty($capacitacionTipo)) {
            flash()->error('Capacitacion Tipo no encontrado');

            return redirect(route('capacitacionTipos.index'));
        }

        $capacitacionTipo->fill($request->all());
        $capacitacionTipo->save();

        flash()->success('Capacitacion Tipo actualizado.');

        return redirect(route('capacitacionTipos.index'));
    }

    /**
     * Remove the specified CapacitacionTipo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var CapacitacionTipo $capacitacionTipo */
        $capacitacionTipo = CapacitacionTipo::find($id);

        if (empty($capacitacionTipo)) {
            flash()->error('Capacitacion Tipo no encontrado');

            return redirect(route('capacitacionTipos.index'));
        }

        $capacitacionTipo->delete();

        flash()->success('Capacitacion Tipo eliminado.');

        return redirect(route('capacitacionTipos.index'));
    }
}
