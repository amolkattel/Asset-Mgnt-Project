<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Permission;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:manage_permissions');
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return View('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $formTitle = 'Create permission';
        return View('permissions.form', compact('formTitle'));
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
            'name' => 'required|unique:permissions|max:255',
            'label' => 'required|unique:permissions|max:255',
        ]);

        (new Permission($request->all()))->save();

        flash()->success('Success!', 'Permission created successfully');

        return redirect('/permissions');
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
        $permission = Permission::find($id);
        $formTitle = 'Edit permission';
        return View('permissions.form', compact('permission', 'formTitle'));
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
            'name' => 'required|unique:permissions,id,'.$id.'|max:255',
            'label' => 'required|unique:permissions,id,'.$id.'|max:255',
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update($request->all());
        
        flash()->success('Success!', 'Permission has been updated!');
        return redirect('permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Permission::destroy($id);
        flash()->success('Success!', 'Permission has been deleted!');
        return redirect('permissions');
    }
}
