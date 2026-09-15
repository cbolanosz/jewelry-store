<?php

/* Author: Pablo José Benítez Trujillo */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminCategoryController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('category.admin_index_title').' - '.__('admin.panel');
        $viewData['categories'] = Category::orderBy('name')->get();

        return view('admin.category.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('category.admin_create_title').' - '.__('admin.panel');

        return view('admin.category.create')->with('viewData', $viewData);
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $category = new Category;
        $category->setName($request->input('name'));
        $category->setDescription($request->input('description'));
        $category->setActive(true);
        $category->save();

        return redirect()->route('admin.category.index')->with('status', __('category.created'));
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $viewData['title'] = __('category.admin_edit_title').' - '.__('admin.panel');
        $viewData['category'] = Category::findOrFail($id);

        return view('admin.category.edit')->with('viewData', $viewData);
    }

    public function update(CategoryRequest $request, string $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->setName($request->input('name'));
        $category->setDescription($request->input('description'));
        $category->save();

        return redirect()->route('admin.category.index')->with('status', __('category.updated'));
    }

    public function activate(string $id): RedirectResponse
    {
        Category::findOrFail($id)->activate();

        return redirect()->route('admin.category.index')->with('status', __('category.activated'));
    }

    public function deactivate(string $id): RedirectResponse
    {
        Category::findOrFail($id)->deactivate();

        return redirect()->route('admin.category.index')->with('status', __('category.deactivated'));
    }

    public function delete(string $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        if ($category->getProducts()->isNotEmpty()) {
            return redirect()->route('admin.category.index')->with('error', __('category.delete_has_products'));
        }
        $category->delete();

        return redirect()->route('admin.category.index')->with('status', __('category.deleted'));
    }
}
