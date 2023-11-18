<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demostrative extends Model
{
    protected $table = "demostratives";

    protected $id = "id";

    protected $fillable = [
        'payload',
        'enterprise_id'
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
    ];

    protected $dates = [
        "created_at",
        "updated_at"
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function enterprise() {
        return $this->belongTo(Enterprise::class, "enterprise_id");
    }
}
