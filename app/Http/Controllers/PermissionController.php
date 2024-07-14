<?php

namespace App\Http\Controllers;

use App\Models\Permisson;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $permission;

    public function __construct(Permisson $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = $this->permission->all();
//        dd($permissions);
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataCreate = $request->all();
        $permission = $this->permission->create($dataCreate);
        return redirect()->route('permissions.index')->with('message', 'create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permissions = $this->permission->findOrFail($id);
        return view('admin.permissions.edit', compact('permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permissions = $this->permission->findOrFail($id);
        $dataUpdate = $request->all();
        $permissions->update($dataUpdate);
        return redirect()->route('permissions.index')->with('message', 'update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission=$this->permission->findOrFail($id);
        $permission->delete();
        return redirect()->route('permissions.index')->with('message', 'delete successfully');
    }
}
