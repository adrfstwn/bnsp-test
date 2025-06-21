<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'product';
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
    ];

    public function scopeFilter($query, Request $request)
    {
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        return $query;
    }
}
