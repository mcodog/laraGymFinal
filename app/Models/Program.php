<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Searchable\Searchable as SpatieSearchable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\Account_Programs;

use Spatie\Searchable\SearchResult;

class Program extends Model implements SpatieSearchable
{
    use HasFactory, Searchable;
    protected $table = 'program';
    protected $primaryKey = 'id';

    public function getSearchResult(): SearchResult
     {
        $url = route('programs2', $this->slug);
     
         return new \Spatie\Searchable\SearchResult(
            $this->title,
            $url
         );
     }


    public function searchableAs() :string
    {
        return 'programs_index';
    }

    public function accountPrograms()
    {
        return $this->hasMany(Account_Programs::class);
    }

    public function getSearchableTitle(): string
    {
        return $this->title;
    }
}
