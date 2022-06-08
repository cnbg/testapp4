<?php

namespace App\Repositories;

interface INotificationRepository
{
    public function paginate(int $perPage);

    public function findById(int $id);

    public function create(array $params);

    public function destroy(int $id);
}
