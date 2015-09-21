<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:manage_roles');
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roles = Role::all();
        return View('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $formTitle = 'Create role';
        return View('roles.form', compact('formTitle'));
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
            'name' => 'required|unique:roles|max:255',
            'label' => 'required|unique:roles|max:255',
        ]);

        $role = new Role;
        $role->name = $request->name;
        $role->save();
        $this->syncPermissions($role, $request->input('permission_list'));

        flash()->success('Success!', 'Role created successfully');

        return redirect('/roles');
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
        $role = Role::find($id);
        $formTitle = 'Edit role';
        return View('roles.form', compact('role', 'formTitle'));
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
            'name' => 'required|unique:roles,id,'.$id.'|max:255',
            'label' => 'required|unique:roles,id,'.$id.'|max:255',
        ]);

        $role = Role::findOrFail($id);
        $role->update($request->all());
        $this->syncPermissions($role, $request->input('permission_list'));
        
        flash()->success('Success!', 'Role has been updated!');
        return redirect('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Role::destroy($id);
        flash()->success('Success!', 'Role has been deleted!');
        return redirect('roles');
    }

    /**
     * Sync up the list of permissions
     * @param  User $user
     * @param  array   $permissions
     * @return void
     */
    private function syncPermissions(Role $role, array $permissions)
    {
        $role->permissions()->sync($permissions);
    }
}
