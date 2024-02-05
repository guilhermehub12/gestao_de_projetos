<?php

namespace App\Repositories;

use App\Models\User;
use Exception;

class UserRepository
{
    public function __construct(
        private User $model
    ) {}

    public function selectOption()
    {
        try {
            return $this->model
                ->all()
                ->sortBy('firstname')
                ->pluck('firstname', 'id')
                ->prepend('Escolha a opção', '');
        } catch (Exception $e) {
            return [
                '' => $e->getMessage()
            ];
        }
    }
}