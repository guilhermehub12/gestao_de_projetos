<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Enums\ProfileEnum;
use Exception;

class ProfileRepository
{
    private $model;

    public function __construct(Profile $model)
    {
        $this->model = $model;
    }

    public function findByCodigo(int $codigo)
    {
        try {
            $query = $this->model->query();
            $query->where('codigo', $codigo);

            return $query->get()->first();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectOption()
    {
        try {
            return $this->model
                ->all()
                ->sortBy('nome')
                ->pluck('nome', 'id')
                ->prepend('Escolha a opção', '');
        } catch (Exception $e) {
            return [
                '' => $e->getMessage()
            ];
        }
    }
}