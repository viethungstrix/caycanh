<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    // Tên bảng
    protected $table = 'plants';

    // Các thuộc tính có thể fill
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'quantity',
    ];
}
