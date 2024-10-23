<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name', 
        'original_price', 
        'discount_price', 
        'discount_percentage', 
        'start_time', 
        'end_time', 
        'stock', 
        'status', 
        'image',
    ];

    // Akses untuk menghitung persentase diskon secara otomatis
    public function getDiscountPercentageAttribute()
    {
        if ($this->original_price > 0) {
            return round((($this->original_price - $this->discount_price) / $this->original_price) * 100, 2);
        }

        return 0; // Jika original_price bernilai 0 atau kurang, kembalikan 0
    }
}
