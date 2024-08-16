<?php

namespace App\Http\Controllers;

use App\DataTables\CapacitacionClienteDataTable;
use App\Http\Requests\CreateCapacitacionClienteRequest;
use App\Http\Requests\UpdateCapacitacionClienteRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\CapacitacionCliente;
use Illuminate\Http\Request;

class CapacitacionClienteController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Clientes')->only('show');
        $this->middleware('permission:Crear Capacitacion Clientes')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Clientes')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Clientes')->only('destroy');
    }
    /**
     * Display a listing of the CapacitacionCliente.
     */
    public function index(CapacitacionClienteDataTable $capacitacionClienteDataTable)
    {
    return $capacitacionClienteDataTable->render('capacitacion_clientes.index');
    }


    /**
     * Show the form for creating a new CapacitacionCliente.
     */
    public function create()
    {
        return view('capacitacion_clientes.create');
    }

    /**
     * Store a newly created CapacitacionCliente in storage.
     */
    public function store(CreateCapacitacionClienteRequest $request)
    {
        $input = $request->all();

        /** @var CapacitacionCliente $capacitacionCliente */
        $capacitacionCliente = CapacitacionCliente::create($input);

        flash()->success('Capacitacion Cliente guardado.');

        return redirect(route('capacitacionClientes.index'));
    }

    /**
     * Display the specified CapacitacionCliente.
     */
    public function show($id)
    {
        /** @var CapacitacionCliente $capacitacionCliente */
        $capacitacionCliente = CapacitacionCliente::find($id);

        if (empty($capacitacionCliente)) {
            flash()->error('Capacitacion Cliente no encontrado');

            return redirect(route('capacitacionClientes.index'));
        }

        return view('capacitacion_clientes.show')->with('capacitacionCliente', $capacitacionCliente);
    }

    /**
     * Show the form for editing the specified CapacitacionCliente.
     */
    public function edit($id)
    {
        /** @var CapacitacionCliente $capacitacionCliente */
        $capacitacionCliente = CapacitacionCliente::find($id);

        if (empty($capacitacionCliente)) {
            flash()->error('Capacitacion Cliente no encontrado');

            return redirect(route('capacitacionClientes.index'));
        }

        return view('capacitacion_clientes.edit')->with('capacitacionCliente', $capacitacionCliente);
    }

    /**
     * Update the specified CapacitacionCliente in storage.
     */
    public function update($id, UpdateCapacitacionClienteRequest $request)
    {
        /** @var CapacitacionCliente $capacitacionCliente */
        $capacitacionCliente = CapacitacionCliente::find($id);

        if (empty($capacitacionCliente)) {
            flash()->error('Capacitacion Cliente no encontrado');

            return redirect(route('capacitacionClientes.index'));
        }

        $capacitacionCliente->fill($request->all());
        $capacitacionCliente->save();

        flash()->success('Capacitacion Cliente actualizado.');

        return redirect(route('capacitacionClientes.index'));
    }

    /**
     * Remove the specified CapacitacionCliente from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var CapacitacionCliente $capacitacionCliente */
        $capacitacionCliente = CapacitacionCliente::find($id);

        if (empty($capacitacionCliente)) {
            flash()->error('Capacitacion Cliente no encontrado');

            return redirect(route('capacitacionClientes.index'));
        }

        $capacitacionCliente->delete();

        flash()->success('Capacitacion Cliente eliminado.');

        return redirect(route('capacitacionClientes.index'));
    }
}
