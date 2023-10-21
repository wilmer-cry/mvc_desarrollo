<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecategoriasRequest;
use App\Http\Requests\UpdatecategoriasRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\categorias;
use Illuminate\Http\Request;
use Flash;
use Response;

class categoriasController extends AppBaseController
{
    /**
     * Display a listing of the categorias.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var categorias $categorias */
        $categorias = categorias::paginate(15);

        return view('categorias.index')
            ->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new categorias.
     *
     * @return Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created categorias in storage.
     *
     * @param CreatecategoriasRequest $request
     *
     * @return Response
     */
    public function store(CreatecategoriasRequest $request)
    {
        $input = $request->all();

        /** @var categorias $categorias */
        $categorias = categorias::create($input);

        Flash::success('Categorias saved successfully.');

        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified categorias.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var categorias $categorias */
        $categorias = categorias::find($id);

        if (empty($categorias)) {
            Flash::error('Categorias not found');

            return redirect(route('categorias.index'));
        }

        return view('categorias.show')->with('categorias', $categorias);
    }

    /**
     * Show the form for editing the specified categorias.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var categorias $categorias */
        $categorias = categorias::find($id);

        if (empty($categorias)) {
            Flash::error('Categorias not found');

            return redirect(route('categorias.index'));
        }

        return view('categorias.edit')->with('categorias', $categorias);
    }

    /**
     * Update the specified categorias in storage.
     *
     * @param int $id
     * @param UpdatecategoriasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecategoriasRequest $request)
    {
        /** @var categorias $categorias */
        $categorias = categorias::find($id);

        if (empty($categorias)) {
            Flash::error('Categorias not found');

            return redirect(route('categorias.index'));
        }

        $categorias->fill($request->all());
        $categorias->save();

        Flash::success('Categorias updated successfully.');

        return redirect(route('categorias.index'));
    }

    /**
     * Remove the specified categorias from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var categorias $categorias */
        $categorias = categorias::find($id);

        if (empty($categorias)) {
            Flash::error('Categorias not found');

            return redirect(route('categorias.index'));
        }

        $categorias->delete();

        Flash::success('Categorias deleted successfully.');

        return redirect(route('categorias.index'));
    }
}
