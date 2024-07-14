<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Permisson;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function search(Request $request)
    {
        $name = $request->input('name');
        $display_name=$request->input('display_name');

        $query = Role::query();
        if ($name) {
            $query->where('name', 'like', "%$name%");
        }

        if ($display_name) {
            $query->where('display_name', 'like', "%$display_name%");
        }
        $roles = $query->get();
        return view('admin.roles.index', compact('roles'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permisson::all()->groupBy('group');
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
            'permission_ids' => 'required|array',
            'permission_ids.*' => 'exists:permissions,id',
        ]);
        $dataCreate = $request->all();
//        $role = Role::create(['name' => $dataCreate['name']]);
        $role = Role::create($dataCreate);
        $role->permissions()->attach($dataCreate['permission_ids']);
        Session::flash('success', 'Thêm quyền thành công!');
        return redirect()->route('roles.index');
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
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permisson::all()->groupBy('group');
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);
        $dataUpdate = $request->all();
        $role->update($dataUpdate);
        $role->permissions()->sync($dataUpdate['permission_ids']);
        Session::flash('success', 'Sửa quyền thành công!');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::destroy($id);
        Session::flash('success', 'Xóa quyền thành công!');
        return redirect()->route('roles.index');
    }
}
