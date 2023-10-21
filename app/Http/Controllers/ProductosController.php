<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductosRequest;
use App\Http\Requests\UpdateProductosRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Productos;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProductosController extends AppBaseController
{
    /**
     * Display a listing of the Productos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Productos $productos */
        $productos = Productos::all();

        return view('productos.index')
            ->with('productos', $productos);
    }

    /**
     * Show the form for creating a new Productos.
     *
     * @return Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created Productos in storage.
     *
     * @param CreateProductosRequest $request
     *
     * @return Response
     */
    public function store(CreateProductosRequest $request)
    {
        $input = $request->all();

        /** @var Productos $productos */
        $productos = Productos::create($input);

        Flash::success('Productos saved successfully.');

        return redirect(route('productos.index'));
    }

    /**
     * Display the specified Productos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Productos $productos */
        $productos = Productos::find($id);

        if (empty($productos)) {
            Flash::error('Productos not found');

            return redirect(route('productos.index'));
        }

        return view('productos.show')->with('productos', $productos);
    }

    /**
     * Show the form for editing the specified Productos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Productos $productos */
        $productos = Productos::find($id);

        if (empty($productos)) {
            Flash::error('Productos not found');

            return redirect(route('productos.index'));
        }

        return view('productos.edit')->with('productos', $productos);
    }

    /**
     * Update the specified Productos in storage.
     *
     * @param int $id
     * @param UpdateProductosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductosRequest $request)
    {
        /** @var Productos $productos */
        $productos = Productos::find($id);

        if (empty($productos)) {
            Flash::error('Productos not found');

            return redirect(route('productos.index'));
        }

        $productos->fill($request->all());
        $productos->save();

        Flash::success('Productos updated successfully.');

        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified Productos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Productos $productos */
        $productos = Productos::find($id);

        if (empty($productos)) {
            Flash::error('Productos not found');

            return redirect(route('productos.index'));
        }

        $productos->delete();

        Flash::success('Productos deleted successfully.');

        return redirect(route('productos.index'));
    }
}
