<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\Status;
use App\Enums\ProjectEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class ProjectRepository
{
    private $model;

    public function __construct(Project $model)
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

    public function paginate($paginate = 10, $orderBy, $sort = 'ASC', $filters = [])
    {
        try {
            $query = $this->model->query();

            if (count($filters) > 0) {
                if (!empty($filters['usuario_id'])) {
                    $query->where('usuario_id', $filters['usuario_id']);
                }
                if (!empty($filters['status_id'])) {
                    $query->where('status_id', $filters['status_id']);
                }
            }

            $query->orderBy($orderBy, $sort);

            return $query->paginate($paginate);
        } catch (Exception $e) {
            return [];
        }
    }

    public function store(array $data)
    {
        try {
            DB::beginTransaction();


            $projeto = new $this->model($data);
            $projeto->status = Status::rascunho();
            $projeto->save();

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function update(Project $project, array $data)
    {
        try {
            DB::beginTransaction();

            $project->fill($data);
            $project->save();

            DB::commit();

            return true;
        } catch (Exception $e){
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function destroy(Project $project)
    {
        try {
            DB::beginTransaction();

            $project->delete();

            DB::commit();

            return true;
        } catch (Exception $e){
            DB::rollBack();

            return $e->getMessage();
        }
    }

}
