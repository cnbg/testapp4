<?php

namespace App\Repositories\Eloquent;

use App\Models\Notification;
use App\Repositories\INotificationRepository;

class NotificationRepository implements INotificationRepository
{
    public function paginate(int $perPage = 15)
    {
        return Notification::simplePaginate($perPage);
    }

    public function findById(int $id)
    {
        return Notification::find($id);
    }

    public function create(array $params)
    {
        return Notification::create($params);
    }

    public function destroy(int $id)
    {
        return Notification::destroy($id);
    }
}
