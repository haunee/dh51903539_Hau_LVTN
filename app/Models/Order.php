<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamp = false;
    protected $fillable = ['idCustomer','Address','Payment','PhoneNumber','CustomerName','ReceiveDate','created_at','Status','TotalBill'];
    protected $primaryKey = 'idOrder';
    protected $table = 'order';
}