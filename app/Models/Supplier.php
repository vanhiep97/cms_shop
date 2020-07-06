<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $timestamps = true;

    protected $table = 'suppliers';

    protected $fillable = [
        'supplier_code', 'supplier_name',
        'supplier_phone', 'supplier_email',
        'address', 'ATM', 'last_input',
        'total_money_input', 'lack_input',
        'supplier_note', 'user_practise'
    ];

    public function inputs()
    {
        return $this->hasMany(Input::class, 'supplier_id');
    }
}
