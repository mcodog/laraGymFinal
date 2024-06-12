<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Client extends Model
{
    use HasFactory;

    protected $table = 'client';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $fillable = [
        'lname',
        'fname',
        'addressline',
        'phone',
        'zipcode',
        'image_path',
        'gender',
        'age',
        'created_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
