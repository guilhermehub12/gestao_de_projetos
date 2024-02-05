<?php

namespace App\Enums;

enum ProfileEnum: int
{
    case ADMINISTRADOR = 1;
    case GERENTE_DE_PROJETOS = 2;
    case MEMBRO = 3;
}