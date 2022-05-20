<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gender;
use App\Models\User;
use App\Models\Color;
use App\Models\Size;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'size_id',
        'gender_id',
        'product_name',
        'price',
        'sale_price',
        'qty',
        'short_description',
        'description',
        'other_info',
        'product_img',
    ];


    public function productTouser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function productTogender()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'id');
    }

    public function productToColor()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }

    public function productToSize()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }


  
}

