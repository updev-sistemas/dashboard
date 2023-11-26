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
        'uuid',
        'user_id'
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

    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function demonstratives() {
        return $this->hasMany(Demostrative::class, "enterprise_id");
    }

    public function regenerateCredential()
    {
        $this->secret = Uuid::uuid4()->toString();

        $this->save();
    }

    public function generate_token()
    {
        return encrypt($this->uuid);
    }

    public function is_token_valid($token)
    {
        try
        {
            $tryDecrypt = decrypt($token);

            return $tryDecrypt == $this->uuid;
        }
        catch (\Exception $e) {
            return false;
        }
    }
}
