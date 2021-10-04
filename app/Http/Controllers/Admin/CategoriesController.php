<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriesRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function home()
    {
        return view('admin.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.categories.categories-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoriesRequest $request
     * @return RedirectResponse
     */
    public function store(CategoriesRequest $request): RedirectResponse
    {
        Category::create([
            'title' => $request['title'],
        ]);
        return redirect()->route('categories.index')->with('created', 'Добавлена категория '.$request->title.'!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        return view('admin.categories.categories-form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoriesRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(CategoriesRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->only(['title']));
        return redirect()->route('categories.index')->with('updated', 'Изменена категория '.$request->title.'!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('categories.index')->with('deleted', 'Удалена категория '.$category->title.'!');
    }
}
