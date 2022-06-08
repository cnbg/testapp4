<?php

namespace App\Http\API;

use App\Http\Requests\StoreNotificationRequest;
use App\Models\Notification;
use App\Repositories\IClientRepository;
use App\Repositories\INotificationRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotificationController extends Controller
{
    private IClientRepository $clients;
    private INotificationRepository $notifications;

    public function __construct(
        IClientRepository $clients,
        INotificationRepository $notifications
    ) {
        $this->clients = $clients;
        $this->notifications = $notifications;
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function clients(Request $request)
    {
        $perPage = config('app.notification.clientsPerPage', $request->get('perPage', 3));

        return $this->clients->paginate($perPage);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function client($id)
    {
        return $this->clients->findById($id);
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $perPage = config('app.notification.perPage', $request->get('perPage', 3));

        return $this->notifications->paginate($perPage);
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
        return $this->notifications->findById($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreNotificationRequest $request
     *
     * @return Response
     */
    public function store(StoreNotificationRequest $request)
    {
        return $this->notifications->create($request->only(Notification::FILLABLE));
    }
}
