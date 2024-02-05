<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert(
            [
                'codigo' => 1,
                'nome' => 'Administrador',
                'slug' => 'administrador',
                'descricao' => 'Administrador do Sistema'
            ]
        );

        DB::table('profiles')->insert(

            [
                'codigo' => 2,
                'nome' => 'Gerente de Projetos',
                'slug' => 'gerente_de_projetos',
                'descricao' => 'Gerente de Projetos do Sistema'
            ]
        );

        DB::table('profiles')->insert(

            [
                'codigo' => 3,
                'nome' => 'Membro',
                'slug' => 'membro',
                'descricao' => 'Membro do Sistema'
            ]
        );

        DB::table('status')->insert(
            [
                'codigo' => 1,
                'nome' => 'Rascunho',
                'slug' => 'rascunho',
                'descricao' => 'Rascunho'
            ]
        );
        DB::table('status')->insert(

            [
                'codigo' => 2,
                'nome' => 'Em Andamento',
                'slug' => 'em_andamento',
                'descricao' => 'Em Andamento'
            ]
        );
        DB::table('status')->insert(

            [
                'codigo' => 3,
                'nome' => 'Concluido',
                'slug' => 'concluido',
                'descricao' => 'Concluido'
            ],
        );

        DB::table('users')->insert([
            'username' => 'user',
            'firstname' => 'User',
            'lastname' => 'Admin',
            'email' => 'email@email.com',
            'profile_id' => 1,
            'password' => bcrypt('P@ssword')
        ]);
    }
}
