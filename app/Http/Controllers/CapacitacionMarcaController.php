<?php

namespace App\Http\Controllers;

use App\DataTables\CapacitacionMarcaDataTable;
use App\Http\Requests\CreateCapacitacionMarcaRequest;
use App\Http\Requests\UpdateCapacitacionMarcaRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\CapacitacionMarca;
use Illuminate\Http\Request;

class CapacitacionMarcaController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Capacitacion Marcas')->only('show');
        $this->middleware('permission:Crear Capacitacion Marcas')->only(['create','store']);
        $this->middleware('permission:Editar Capacitacion Marcas')->only(['edit','update']);
        $this->middleware('permission:Eliminar Capacitacion Marcas')->only('destroy');
    }
    /**
     * Display a listing of the CapacitacionMarca.
     */
    public function index(CapacitacionMarcaDataTable $capacitacionMarcaDataTable)
    {
    return $capacitacionMarcaDataTable->render('capacitacion_marcas.index');
    }


    /**
     * Show the form for creating a new CapacitacionMarca.
     */
    public function create()
    {
        return view('capacitacion_marcas.create');
    }

    /**
     * Store a newly created CapacitacionMarca in storage.
     */
    public function store(CreateCapacitacionMarcaRequest $request)
    {
        $input = $request->all();

        /** @var CapacitacionMarca $capacitacionMarca */
        $capacitacionMarca = CapacitacionMarca::create($input);

        flash()->success('Capacitacion Marca guardado.');

        return redirect(route('capacitacionMarcas.index'));
    }

    /**
     * Display the specified CapacitacionMarca.
     */
    public function show($id)
    {
        /** @var CapacitacionMarca $capacitacionMarca */
        $capacitacionMarca = CapacitacionMarca::find($id);

        if (empty($capacitacionMarca)) {
            flash()->error('Capacitacion Marca no encontrado');

            return redirect(route('capacitacionMarcas.index'));
        }

        return view('capacitacion_marcas.show')->with('capacitacionMarca', $capacitacionMarca);
    }

    /**
     * Show the form for editing the specified CapacitacionMarca.
     */
    public function edit($id)
    {
        /** @var CapacitacionMarca $capacitacionMarca */
        $capacitacionMarca = CapacitacionMarca::find($id);

        if (empty($capacitacionMarca)) {
            flash()->error('Capacitacion Marca no encontrado');

            return redirect(route('capacitacionMarcas.index'));
        }

        return view('capacitacion_marcas.edit')->with('capacitacionMarca', $capacitacionMarca);
    }

    /**
     * Update the specified CapacitacionMarca in storage.
     */
    public function update($id, UpdateCapacitacionMarcaRequest $request)
    {
        /** @var CapacitacionMarca $capacitacionMarca */
        $capacitacionMarca = CapacitacionMarca::find($id);

        if (empty($capacitacionMarca)) {
            flash()->error('Capacitacion Marca no encontrado');

            return redirect(route('capacitacionMarcas.index'));
        }

        $capacitacionMarca->fill($request->all());
        $capacitacionMarca->save();

        flash()->success('Capacitacion Marca actualizado.');

        return redirect(route('capacitacionMarcas.index'));
    }

    /**
     * Remove the specified CapacitacionMarca from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var CapacitacionMarca $capacitacionMarca */
        $capacitacionMarca = CapacitacionMarca::find($id);

        if (empty($capacitacionMarca)) {
            flash()->error('Capacitacion Marca no encontrado');

            return redirect(route('capacitacionMarcas.index'));
        }

        $capacitacionMarca->delete();

        flash()->success('Capacitacion Marca eliminado.');

        return redirect(route('capacitacionMarcas.index'));
    }
}
