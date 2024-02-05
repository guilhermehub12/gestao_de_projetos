<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codigo',
        'nome',
        'slug',
        'descricao',
    ];

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->slug = Str::slug($this->nome);
    }

    public function fill(array $attributes)
    {
        parent::fill($attributes);
        $this->slug = Str::slug($this->nome);
    }


    protected function slug(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Str::slug($value)
        );
    }
}
