<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:manage_categories');
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::paginate(30);
        return View('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $formTitle = 'Create category';
        return View('categories.form', compact('formTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories|max:255',
            'description' => 'required|max:255',
        ]);

        (new Category($request->all()))->save();

        flash()->success('Success!', 'Category created successfully');

        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $formTitle = 'Edit category';
        return View('categories.form', compact('category', 'formTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,id,'.$id.'|max:255',
            'description' => 'required|min:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());
        
        flash()->success('Success!', 'Category has been updated!');
        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        flash()->success('Success!', 'Category has been deleted!');
        return redirect('categories');
    }
}
