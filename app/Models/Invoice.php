<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $table = 'invoices';

    protected $fillable = [
        'description',
        'valor',
        'user_id',
        'address_id',
    ];

    protected $hidden = [
        'user_id',
        'address_id'
    ];

    protected $casts = [
        'valor' => 'double',
    ];

    public function address()
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    
}
