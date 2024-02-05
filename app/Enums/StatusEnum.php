<?php

namespace App\Enums;

enum StatusEnum: int
{
    case RASCUNHO = 1;
    case EM_ANDAMENTO = 2;
    case CONCLUIDO = 3;
}