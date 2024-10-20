<?php

namespace App\Models;

use App\Casts\CurrencyBr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'publisher',
        'price',
        'edition',
        'publication_year',
    ];

    protected $attributes = [
        'title' => null,
        'publisher' => null,
        'price' => null,
        'edition' => null,
        'publication_year' => null,
    ];

    protected $casts = [
        'price' => CurrencyBr::class,
        'edition' => 'integer',
        'publication_year' => 'integer',
    ];

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class);
    }
}
