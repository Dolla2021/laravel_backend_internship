<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'image',
        'price',
        'category',
        'colors'
    ];
    protected $casts = [
        'colors' => 'array',
        'price' => 'decimal:2'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}