<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'localizacao',
        'cliente',
        'escopo_inicial',
        'data_inicio',
        'slug',
        'ativo',
        'usuario_id',
        'status_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'usuario',
        'status'
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        // static::addGlobalScope(new ProjectScope);
    }

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->slug = Str::slug($this->nome);
        $this->created_by = Auth::id();
        $this->updated_by = Auth::id();
    }

    public function fill(array $attributes)
    {
        parent::fill($attributes);
        $this->slug = Str::slug($this->nome);
        $this->updated_by = Auth::id();
    }

    protected function slug(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Str::slug($value)
        );
    }

    public function delete()
    {
        $this->deleted_by = Auth::id();
        $this->save();
        parent::delete();
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => (new Carbon($value))->format('d/m/Y H:i:s')
        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => (new Carbon($value))->format('d/m/Y H:i:s')
        );
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function isRascunho()
    {
        return $this->status->id == Status::rascunho();
    }

    public function isEmAndamento()
    {
        return $this->status->id == Status::emAndamento();
    }

    public function isConcluido()
    {
        return $this->status->id == Status::concluido();
    }
}
