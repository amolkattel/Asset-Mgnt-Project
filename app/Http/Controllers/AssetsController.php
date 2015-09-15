<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\AssetRequest;
use App\Http\Controllers\Controller;

class AssetsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $assets = Asset::all();

        return View('assets.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $formTitle = 'Create asset';
        return View('assets.form', compact('formTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(AssetRequest $request)
    {
        $asset = new Asset($request->all());
        $asset->save();

        flash()->success('Success!', 'Asset has been created!');
        return redirect('assets');
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
        $asset = Asset::find($id);
        $formTitle = 'Edit asset';
        return View('assets.form', compact('asset', 'formTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AssetRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(AssetRequest $request, $id)
    {
        $asset = Asset::findOrFail($id);
        $asset->update($request->all());
        
        flash()->success('Success!', 'Asset updated successfully!');
        return redirect('assets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
