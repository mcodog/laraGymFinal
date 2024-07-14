<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program;

class Account_Programs extends Model
{
    use HasFactory;
    public $table = 'account_programs';

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
