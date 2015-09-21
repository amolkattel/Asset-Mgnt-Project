<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vendor;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VendorsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:manage_vendors');
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $vendors = Vendor::paginate(30);
        return View('vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $formTitle = 'Create vendor';
        return View('vendors.form', compact('formTitle'));
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
            'name' => 'required|unique:vendors|max:255',
        ]);

        (new Vendor($request->all()))->save();

        flash()->success('Success!', 'Vendor created successfully');

        return redirect('/vendors');
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
        $vendor = Vendor::find($id);
        $formTitle = 'Edit vendor';
        return View('vendors.form', compact('vendor', 'formTitle'));
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
            'name' => 'required|unique:vendors,id,'.$id.'|max:255',
        ]);

        $vendor = Vendor::findOrFail($id);
        $vendor->update($request->all());
        
        flash()->success('Success!', 'Vendor has been updated!');
        return redirect('vendors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Vendor::destroy($id);
        flash()->success('Success!', 'Vendor has been deleted!');
        return redirect('vendors');
    }

}
