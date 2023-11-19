<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class Enterprise extends Model
{
    protected $table = "enterprises";

    protected $fillable = [
        'cnpj',
        'razao_social',
        'fantasia',
        'email',
        'credential',
        'secret'
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

    public function regenerateCredential()
    {
        $this->secret = Uuid::uuid4()->toString();
        $this->credential = Hash::make($this->secret);

        $this->save();
    }
}
