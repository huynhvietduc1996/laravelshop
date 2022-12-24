<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Attribute extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $type = [
        1 => 'Đôi',
        2 => 'Năng lượng',
        3 => 'Loại dây',
        4 => 'Loại vỏ'
    ];

    public function getType()
    {
        return Arr::get($this->type, $this->atb_type, '---');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'atb_category_id');
    }
}
