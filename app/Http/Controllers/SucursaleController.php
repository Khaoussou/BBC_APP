<?php

namespace App\Http\Controllers;

use App\Http\Requests\SucursalePostRequest;
use App\Http\Resources\SucursaleResource;
use App\Models\Succursale;
use App\Traits\Format;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class SucursaleController extends Controller
{
    use Format;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $succursales = SucursaleResource::collection(Succursale::all());
        return $this->response(Response::HTTP_ACCEPTED, "", [$succursales]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SucursalePostRequest $request)
    {
        $newSuccursale = new SucursaleResource(Succursale::create($request->all()));
        return $this->response(Response::HTTP_ACCEPTED, "Insertion réussie", [$newSuccursale]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
