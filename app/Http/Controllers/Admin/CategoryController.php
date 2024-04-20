<?php

namespace App\Http\Controllers\Admin;
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\RepositoriesInterfaces\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->middleware("role:admin")->except('show');
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->category->latest()->paginate(4);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Display the specified category page.
     */
    public function show(Category $category)
    {
        $categories = $this->category->getAll();
        return view('category', compact('category', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/categories', $filename);

            $validatedData['photo_src'] = 'storage/categories/' . $filename;
        }

        $category = $this->category->create($validatedData);
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resources in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('photo')) {
            // remove the old photo
            $oldPhoto = $category->photo_src;
            if ($oldPhoto) {
                $oldPhoto = str_replace('storage/', 'public/', $oldPhoto);
                Storage::delete($oldPhoto);
            }
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/categories', $filename);

            $validatedData['photo_src'] = 'storage/categories/' . $filename;
        }

        $this->category->update($category->id, $validatedData);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // remove the photo
        $photo = $category->photo_src;
        if ($photo) {
            $photo = str_replace('storage/', 'public/', $photo);
            Storage::delete($photo);
        }
        $this->category->delete($category->id);
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
