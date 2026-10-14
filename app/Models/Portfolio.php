<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolios';

    protected $fillable = [
        'title', 'category', 'description', 'image',
        'client_name', 'project_date', 'is_featured'
    ];

    protected $casts = [
        'project_date' => 'date',
        'is_featured' => 'boolean',
    ];
}
