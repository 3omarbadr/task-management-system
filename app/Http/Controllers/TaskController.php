<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\UpdateStatisticsJob;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use App\Repositories\SQL\TaskRepository;
use App\Repositories\SQL\UserRepository;

class TaskController extends Controller
{
    public function __construct(protected TaskRepository $taskRepository, protected UserRepository $userRepository)
    {
    }

    public function index()
    {
        $tasks = $this->taskRepository->withRelations(['assignedTo:id,name', 'assignedBy:id,name'])->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users  = $this->userRepository->users(['id', 'name']);
        $admins = $this->userRepository->admins(['id', 'name']);

        return view('tasks.create', compact('users', 'admins'));
    }

    public function store(TaskRequest $request)
    {
        $this->taskRepository->store($request->validated());
        UpdateStatisticsJob::dispatch($request->validated()['assigned_to_id']);
        return redirect()->route('tasks.index');
    }
}
