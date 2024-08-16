<?php

namespace App\Http\Controllers;

use App\DataTables\CapacitacionServicioDataTable;
use App\Http\Requests\CreateCapacitacionServicioRequest;
use App\Http\Requests\UpdateCapacitacionServicioRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\CapacitacionServicio;
use Illuminate\Http\Request;

class CapacitacionServicioController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Servicios')->only('show');
        $this->middleware('permission:Crear Capacitacion Servicios')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Servicios')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Servicios')->only('destroy');
    }
    /**
     * Display a listing of the CapacitacionServicio.
     */
    public function index(CapacitacionServicioDataTable $capacitacionServicioDataTable)
    {
    return $capacitacionServicioDataTable->render('capacitacion_servicios.index');
    }


    /**
     * Show the form for creating a new CapacitacionServicio.
     */
    public function create()
    {
        return view('capacitacion_servicios.create');
    }

    /**
     * Store a newly created CapacitacionServicio in storage.
     */
    public function store(CreateCapacitacionServicioRequest $request)
    {
        $input = $request->all();

        /** @var CapacitacionServicio $capacitacionServicio */
        $capacitacionServicio = CapacitacionServicio::create($input);

        flash()->success('Capacitacion Servicio guardado.');

        return redirect(route('capacitacionServicios.index'));
    }

    /**
     * Display the specified CapacitacionServicio.
     */
    public function show($id)
    {
        /** @var CapacitacionServicio $capacitacionServicio */
        $capacitacionServicio = CapacitacionServicio::find($id);

        if (empty($capacitacionServicio)) {
            flash()->error('Capacitacion Servicio no encontrado');

            return redirect(route('capacitacionServicios.index'));
        }

        return view('capacitacion_servicios.show')->with('capacitacionServicio', $capacitacionServicio);
    }

    /**
     * Show the form for editing the specified CapacitacionServicio.
     */
    public function edit($id)
    {
        /** @var CapacitacionServicio $capacitacionServicio */
        $capacitacionServicio = CapacitacionServicio::find($id);

        if (empty($capacitacionServicio)) {
            flash()->error('Capacitacion Servicio no encontrado');

            return redirect(route('capacitacionServicios.index'));
        }

        return view('capacitacion_servicios.edit')->with('capacitacionServicio', $capacitacionServicio);
    }

    /**
     * Update the specified CapacitacionServicio in storage.
     */
    public function update($id, UpdateCapacitacionServicioRequest $request)
    {
        /** @var CapacitacionServicio $capacitacionServicio */
        $capacitacionServicio = CapacitacionServicio::find($id);

        if (empty($capacitacionServicio)) {
            flash()->error('Capacitacion Servicio no encontrado');

            return redirect(route('capacitacionServicios.index'));
        }

        $capacitacionServicio->fill($request->all());
        $capacitacionServicio->save();

        flash()->success('Capacitacion Servicio actualizado.');

        return redirect(route('capacitacionServicios.index'));
    }

    /**
     * Remove the specified CapacitacionServicio from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var CapacitacionServicio $capacitacionServicio */
        $capacitacionServicio = CapacitacionServicio::find($id);

        if (empty($capacitacionServicio)) {
            flash()->error('Capacitacion Servicio no encontrado');

            return redirect(route('capacitacionServicios.index'));
        }

        $capacitacionServicio->delete();

        flash()->success('Capacitacion Servicio eliminado.');

        return redirect(route('capacitacionServicios.index'));
    }
}
