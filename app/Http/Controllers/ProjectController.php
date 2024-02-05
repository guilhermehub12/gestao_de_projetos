<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

use App\Repositories\ProjectRepository;
use App\Repositories\UserRepository;
use App\Repositories\StatusRepository;

class ProjectController extends Controller
{
    public function __construct(
        private ProjectRepository $projectRepository,
        private UserRepository $userRepository,
        private StatusRepository $statusRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $projects = $this->projectRepository->paginate(10, 'created_at', 'DESC', $request->except(['_token', 'page']));

        return view('pages.projects.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd($this->userRepository->selectOption());

        return view('pages.projects.create', [
            'users' => $this->userRepository->selectOption(),
            'status' => $this->statusRepository->selectOption()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $this->projectRepository->store($request->except(['_token']));

        if ($result === true) {
            flash()->success('Projeto cadastrado com sucesso!');
        } else {
            flash()->error("Erro ao cadastrar" . $result);
        }

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('pages.projects.show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('pages.projects.edit', [
            'project' => $project,
            'users' => $this->userRepository->selectOption(),
            'status' => $this->statusRepository->selectOption()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $result = $this->projectRepository->update($project, $request->except(['_token']));

        if ($result === true) {
            flash()->success('Projeto atualizado com sucesso!');
        } else {
            flash()->error("Erro ao atualizar" . $result);
        }

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Project $project)
    {
        $result = $this->projectRepository->destroy($project);

        if ($result === true) {
            flash()->success('Projeto deletado com sucesso!');
        }

        return redirect()->route('projects.index');
    }
}
