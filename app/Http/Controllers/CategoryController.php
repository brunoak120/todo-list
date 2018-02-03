<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /** @var */
    protected $categoryRepository;

    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->middleware('auth');
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->categoryRepository->findWhere(['user_id' => auth()->user()->id]);

        return view('category.index', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->request->add(['user_id' => auth()->user()->id]);
        $this->categoryRepository->create($request->all());

        flash('Categoria "' . $request->name . '" adicionada com sucesso')->success();
        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('category.edit');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        try {
            $updated = $this->categoryRepository->update(['name' => $request->name], $request->id);

            if (!empty($updated->updated_at)){
                return response()->json(true);
            }

            return response()->json($updated);
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        try {
            $removed = $this->categoryRepository->delete($request->id);

            dd($removed);

            return response()->json($removed);
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
