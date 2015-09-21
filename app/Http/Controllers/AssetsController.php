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
        $this->middleware('permission:manage_assets');
        parent::__construct();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $assets = Asset::filter()->paginate(30);
        return View('assets.index', compact('assets'));
    }

    /**
     * Display a listing of the resource with grid view.
     *
     * @return Response
     */
    public function grid()
    {
        $assets = Asset::filter()->paginate(30);
        return View('assets.grid', compact('assets'));
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
        $asset->save()->saveImage();
        

        flash()->success('Success!', 'Asset has been created!');
        return redirect('assets');
    }

    /**
     * display assets with map view
     * @return Response
     */
    public function map()
    {
        $assets = Asset::all();
        return View('assets.map', compact('assets'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $asset = Asset::findOrFail($id);

        return View('assets.show', compact('asset'));
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
        $asset->saveImage($request);
        
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
        Asset::destroy($id);
        flash()->success('Success!', 'Asset has been deleted!');
        return redirect('assets');
    }
}
