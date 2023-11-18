<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Enterprise extends Model
{
    protected $table = "enterprises";

    protected $id = "id";

    protected $fillable = [
        'cnpj', 
        'razao_social', 
        'fanstasia', 
        'email'
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

    public function users() {
        return $this->hasMany(User::class, "enterprise_id");
    }

    public function demonstratives() {
        return $this->hasMany(Demostrative::class, "enterprise_id");
    }
}
