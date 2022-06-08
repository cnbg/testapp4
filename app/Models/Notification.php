<?php

namespace App\Models;

use App\Events\NotificationCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const FILLABLE = ['client_id', 'channel', 'content'];

    protected $table = 'notifications';

    protected $fillable = self::FILLABLE;

    protected static function booted()
    {
        static::created(static function ($model) {
            event(new NotificationCreated($model));
        });
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
