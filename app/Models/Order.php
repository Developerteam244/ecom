<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order_item;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public function orderItems()
    {
        return $this->hasMany(Order_item::class);
    }

    public function order_test()
    {
       return  $this->select('*');
    }
}
