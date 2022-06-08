<?php

namespace App\Repositories;

interface IClientRepository
{
    public function paginate(int $perPage);

    public function findById(int $id);

    public function create(array $params);

    public function update(int $id, array $params);

    public function destroy(int $id);
}
