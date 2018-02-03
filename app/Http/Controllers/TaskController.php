<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /** @var TaskRepository  */
    protected $taskRepository;

    /** @var CategoryRepository  */
    protected $categoryRepository;

    /**
     * TaskController constructor.
     * @param TaskRepository $taskRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(TaskRepository $taskRepository, CategoryRepository $categoryRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tasks = $this->taskRepository->getTasks();

        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getArrayCategoriesOrderlyByName();

        return view('task.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->taskRepository->create($request->all());

        flash('Tarefa adicionada com sucesso.')->success();
        return redirect()->back();
    }
}
