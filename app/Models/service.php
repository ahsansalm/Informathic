<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\config\product;

class service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

     public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
}
