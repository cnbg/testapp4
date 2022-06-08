<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const FILLABLE = ['firstName', 'lastName', 'email', 'phoneNumber'];

    protected $table = 'clients';
    protected $fillable = self::FILLABLE;

    public function routeNotificationForTwilio()
    {
        return $this->phoneNumber;
    }
}
