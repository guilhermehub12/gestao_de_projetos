<?php

namespace App\Repositories;

use App\Models\Status;
// use App\Enums\StatusEnum;
use Exception;

class StatusRepository
{
    private $model;

    public function __construct(Status $model)
    {
        $this->model = $model;
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