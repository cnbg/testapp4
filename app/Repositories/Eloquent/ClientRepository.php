<?php

namespace App\Repositories\Eloquent;

use App\Models\Client;
use App\Repositories\IClientRepository;

class ClientRepository implements IClientRepository
{
    public function paginate(int $perPage = 15)
    {
        return Client::simplePaginate($perPage);
    }

    public function findById(int $id)
    {
        return Client::find($id);
    }

    public function create(array $params)
    {
        return Client::create($params);
    }

    public function update(int $id, $params)
    {
        return Client::whereId($id)->update($params);
    }

    public function destroy(int $id)
    {
        return Client::destroy($id);
    }
}
