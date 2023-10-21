<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetiendaRequest;
use App\Http\Requests\UpdatetiendaRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\tienda;
use Illuminate\Http\Request;
use Flash;
use Response;

class tiendaController extends AppBaseController
{
    /**
     * Display a listing of the tienda.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var tienda $tiendas */
        $tiendas = tienda::paginate(15);

        return view('tiendas.index')
            ->with('tiendas', $tiendas);
    }

    /**
     * Show the form for creating a new tienda.
     *
     * @return Response
     */
    public function create()
    {
        return view('tiendas.create');
    }

    /**
     * Store a newly created tienda in storage.
     *
     * @param CreatetiendaRequest $request
     *
     * @return Response
     */
    public function store(CreatetiendaRequest $request)
    {
        $input = $request->all();

        /** @var tienda $tienda */
        $tienda = tienda::create($input);

        Flash::success('Tienda saved successfully.');

        return redirect(route('tiendas.index'));
    }

    /**
     * Display the specified tienda.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tienda $tienda */
        $tienda = tienda::find($id);

        if (empty($tienda)) {
            Flash::error('Tienda not found');

            return redirect(route('tiendas.index'));
        }

        return view('tiendas.show')->with('tienda', $tienda);
    }

    /**
     * Show the form for editing the specified tienda.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var tienda $tienda */
        $tienda = tienda::find($id);

        if (empty($tienda)) {
            Flash::error('Tienda not found');

            return redirect(route('tiendas.index'));
        }

        return view('tiendas.edit')->with('tienda', $tienda);
    }

    /**
     * Update the specified tienda in storage.
     *
     * @param int $id
     * @param UpdatetiendaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetiendaRequest $request)
    {
        /** @var tienda $tienda */
        $tienda = tienda::find($id);

        if (empty($tienda)) {
            Flash::error('Tienda not found');

            return redirect(route('tiendas.index'));
        }

        $tienda->fill($request->all());
        $tienda->save();

        Flash::success('Tienda updated successfully.');

        return redirect(route('tiendas.index'));
    }

    /**
     * Remove the specified tienda from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tienda $tienda */
        $tienda = tienda::find($id);

        if (empty($tienda)) {
            Flash::error('Tienda not found');

            return redirect(route('tiendas.index'));
        }

        $tienda->delete();

        Flash::success('Tienda deleted successfully.');

        return redirect(route('tiendas.index'));
    }
}
