<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use App\Http\Resources\UserResource;
use App\Models\Succursale;
use App\Models\User;
use App\Traits\Format;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{
    use Format;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allUsers = UserResource::collection(User::all());
        return $this->response(Response::HTTP_ACCEPTED, "", [$allUsers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserPostRequest $request)
    {
        $succursale = $request->succursale_id;
        $succursaleExist = Succursale::find($succursale);
        if ($succursaleExist) {
            $newUser = User::create($request->all());
            $data = new UserResource($newUser);
            return $this->response(Response::HTTP_ACCEPTED, "Insertion réussie !", [$data]);
        } else {
            return $this->response(Response::HTTP_UNAUTHORIZED, "Insertion impossible !", []);
        }
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
