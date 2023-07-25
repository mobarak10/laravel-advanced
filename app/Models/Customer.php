<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*=== Helper function start ===*/
    public function format()
    {
        return [
            'customer_id' => $this->id,
            'name' => $this?->name,
            'created_by' => $this?->user?->name,
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
    /*=== Helper function end ===*/
}
