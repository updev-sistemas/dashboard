<?php

namespace App;

use App\Handlers\PayloadHandler;
use Illuminate\Database\Eloquent\Model;

class Demostrative extends Model
{
    protected $table = "demostratives";

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
        return $this->belongsTo(Enterprise::class, "enterprise_id");
    }

    public function sanitize()
    {
        return json_decode($this->payload);
    }
}
