<?php

namespace App\Http\Controllers;

use App\DataTables\CapacitacionEstadosDataTable;
use App\Http\Requests\CreateCapacitacionEstadosRequest;
use App\Http\Requests\UpdateCapacitacionEstadosRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\CapacitacionEstados;
use Illuminate\Http\Request;

class CapacitacionEstadosController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Estados')->only('show');
        $this->middleware('permission:Crear Capacitacion Estados')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Estados')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Estados')->only('destroy');
    }
    /**
     * Display a listing of the CapacitacionEstados.
     */
    public function index(CapacitacionEstadosDataTable $capacitacionEstadosDataTable)
    {
    return $capacitacionEstadosDataTable->render('capacitacion_estados.index');
    }


    /**
     * Show the form for creating a new CapacitacionEstados.
     */
    public function create()
    {
        return view('capacitacion_estados.create');
    }

    /**
     * Store a newly created CapacitacionEstados in storage.
     */
    public function store(CreateCapacitacionEstadosRequest $request)
    {
        $input = $request->all();

        /** @var CapacitacionEstados $capacitacionEstados */
        $capacitacionEstados = CapacitacionEstados::create($input);

        flash()->success('Capacitacion Estados guardado.');

        return redirect(route('capacitacionEstados.index'));
    }

    /**
     * Display the specified CapacitacionEstados.
     */
    public function show($id)
    {
        /** @var CapacitacionEstados $capacitacionEstados */
        $capacitacionEstados = CapacitacionEstados::find($id);

        if (empty($capacitacionEstados)) {
            flash()->error('Capacitacion Estados no encontrado');

            return redirect(route('capacitacionEstados.index'));
        }

        return view('capacitacion_estados.show')->with('capacitacionEstados', $capacitacionEstados);
    }

    /**
     * Show the form for editing the specified CapacitacionEstados.
     */
    public function edit($id)
    {
        /** @var CapacitacionEstados $capacitacionEstados */
        $capacitacionEstados = CapacitacionEstados::find($id);

        if (empty($capacitacionEstados)) {
            flash()->error('Capacitacion Estados no encontrado');

            return redirect(route('capacitacionEstados.index'));
        }

        return view('capacitacion_estados.edit')->with('capacitacionEstados', $capacitacionEstados);
    }

    /**
     * Update the specified CapacitacionEstados in storage.
     */
    public function update($id, UpdateCapacitacionEstadosRequest $request)
    {
        /** @var CapacitacionEstados $capacitacionEstados */
        $capacitacionEstados = CapacitacionEstados::find($id);

        if (empty($capacitacionEstados)) {
            flash()->error('Capacitacion Estados no encontrado');

            return redirect(route('capacitacionEstados.index'));
        }

        $capacitacionEstados->fill($request->all());
        $capacitacionEstados->save();

        flash()->success('Capacitacion Estados actualizado.');

        return redirect(route('capacitacionEstados.index'));
    }

    /**
     * Remove the specified CapacitacionEstados from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var CapacitacionEstados $capacitacionEstados */
        $capacitacionEstados = CapacitacionEstados::find($id);

        if (empty($capacitacionEstados)) {
            flash()->error('Capacitacion Estados no encontrado');

            return redirect(route('capacitacionEstados.index'));
        }

        $capacitacionEstados->delete();

        flash()->success('Capacitacion Estados eliminado.');

        return redirect(route('capacitacionEstados.index'));
    }
}
