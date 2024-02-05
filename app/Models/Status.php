<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

use App\Enums\StatusEnum;

class Status extends Model
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

    public static function rascunho()
    {
        return Status::where('codigo', StatusEnum::RASCUNHO)->pluck('id')->first();
    }

    public static function emAndamento()
    {
        return Status::where('codigo', StatusEnum::EM_ANDAMENTO)->pluck('id')->first();
    }

    public static function concluido()
    {
        return Status::where('codigo', StatusEnum::CONCLUIDO)->pluck('id')->first();
    }
}
