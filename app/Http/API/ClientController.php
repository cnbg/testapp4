<?php

namespace App\Http\API;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Repositories\IClientRepository;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    private IClientRepository $clients;

    public function __construct(IClientRepository $clients)
    {
        $this->clients = $clients;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        return $this->clients->findById($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClientRequest $request
     *
     * @return Response
     */
    public function store(StoreClientRequest $request)
    {
        return $this->clients->create($request->only(Client::FILLABLE));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClientRequest $request
     * @param int $id
     *
     * @return Response
     */
    public function update(UpdateClientRequest $request, int $id)
    {
        return $this->clients->update($id, $request->only(Client::FILLABLE));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(int $id)
    {
        return $this->clients->destroy($id);
    }
}
