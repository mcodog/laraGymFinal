<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public $table = "account";

    public $fillable = [
        'client_id',
        'membership_id',
        'total_cost',
        'duration',
        'free_session',
        'status',
        'start_date',
        'end_date',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
