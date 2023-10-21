<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateanalisisRequest;
use App\Http\Requests\UpdateanalisisRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\analisis;
use Illuminate\Http\Request;
use Flash;
use Response;

class analisisController extends AppBaseController
{
    /**
     * Display a listing of the analisis.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var analisis $analises */
        $analises = analisis::all();

        return view('analises.index')
            ->with('analises', $analises);
    }

    /**
     * Show the form for creating a new analisis.
     *
     * @return Response
     */
    public function create()
    {
        return view('analises.create');
    }

    /**
     * Store a newly created analisis in storage.
     *
     * @param CreateanalisisRequest $request
     *
     * @return Response
     */
    public function store(CreateanalisisRequest $request)
    {
        $input = $request->all();

        /** @var analisis $analisis */
        $analisis = analisis::create($input);

        Flash::success('Analisis saved successfully.');

        return redirect(route('analises.index'));
    }

    /**
     * Display the specified analisis.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var analisis $analisis */
        $analisis = analisis::find($id);

        if (empty($analisis)) {
            Flash::error('Analisis not found');

            return redirect(route('analises.index'));
        }

        return view('analises.show')->with('analisis', $analisis);
    }

    /**
     * Show the form for editing the specified analisis.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var analisis $analisis */
        $analisis = analisis::find($id);

        if (empty($analisis)) {
            Flash::error('Analisis not found');

            return redirect(route('analises.index'));
        }

        return view('analises.edit')->with('analisis', $analisis);
    }

    /**
     * Update the specified analisis in storage.
     *
     * @param int $id
     * @param UpdateanalisisRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateanalisisRequest $request)
    {
        /** @var analisis $analisis */
        $analisis = analisis::find($id);

        if (empty($analisis)) {
            Flash::error('Analisis not found');

            return redirect(route('analises.index'));
        }

        $analisis->fill($request->all());
        $analisis->save();

        Flash::success('Analisis updated successfully.');

        return redirect(route('analises.index'));
    }

    /**
     * Remove the specified analisis from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var analisis $analisis */
        $analisis = analisis::find($id);

        if (empty($analisis)) {
            Flash::error('Analisis not found');

            return redirect(route('analises.index'));
        }

        $analisis->delete();

        Flash::success('Analisis deleted successfully.');

        return redirect(route('analises.index'));
    }
}
