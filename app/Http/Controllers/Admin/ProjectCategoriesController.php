<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectCategoryRequest;
use App\Http\Requests\UpdateProjectCategoryRequest;
use App\Models\ProjectCategory;
use Illuminate\Support\Str;

class ProjectCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProjectCategory::all();
        return view('projects.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectCategoryRequest $request)
    {
        $data = $request->validated();
        $slug = Str::slug($data['name']);
        $originalSlug = $slug;
        $count = 1;

        while (ProjectCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $data['slug'] = $slug;
        ProjectCategory::create($data);

        return redirect()->route('projectCategories.index')->with('message', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ProjectCategory::findOrFail($id);
        return view('projects.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectCategoryRequest $request, $id)
    {
        $data = $request->validated();
        $category = ProjectCategory::findOrFail($id);

        if (isset($data['slug'])) {
            $slug = Str::slug($data['slug']);
            $originalSlug = $slug;
            $count = 1;

            while (ProjectCategory::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }

            $data['slug'] = $slug;
        } else {
            $data['slug'] = $category->slug;
        }

        $category->update($data);

        return redirect()->route('projectCategories.index')->with('message', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ProjectCategory::findOrFail($id);
        $category->delete();
        sleep(1);
        return redirect()->route('projectCategories.index')->with('message', 'Category Deleted Successfully');
    }
}
