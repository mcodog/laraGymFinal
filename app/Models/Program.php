<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\Account_Programs;

class Program extends Model
{
    use HasFactory, Searchable;
    protected $table = 'program';
    protected $primaryKey = 'id';

    public function searchableAs() :string
    {
        return 'programs_index';
    }

    public function accountPrograms()
    {
        return $this->hasMany(Account_Programs::class);
    }
}
