<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $user;
    protected $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $users = $this->user->all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
//    public function create()
//    {
//        $roles = $this->role->all();
//        return view('admin.users.create', compact('roles'));
//    }

    public function search(Request $request)
    {
        // Lấy giá trị từ form
        $name = $request->input('name');
        $email = $request->input('email');
        $status = $request->input('status');

        // Khởi tạo query
        $query = $this->user->query();

        // Thêm điều kiện tìm kiếm nếu có giá trị
        if ($name) {
            $query->where('name', 'like', "%$name%");
        }

        if ($email) {
            $query->where('email', 'like', "%$email%");
        }

        if ($status) {
            $query->where('status', $status);
        }

        // Lấy danh sách người dùng theo điều kiện tìm kiếm
        $users = $query->get();

        // Truyền danh sách người dùng vào view
        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        $roles = $this->role->where('name', '!=', 'admin')->get();
        return view('admin.users.create', compact('roles'));
    }
    /**
     * Store a newly created resource in storage.
     */
//    public function store(Request $request)
//    {
//        $dataCreate = $request->all();
//        $dataCreate['password'] = Hash::make($request->password);
//        $user = $this->user->create($dataCreate);
//        $user->roles()->attach($dataCreate['role_ids']);
//        return redirect()->route('users.index');
//    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        $dataCreate = $request->except('password');
        if ($request->password) {
            $dataCreate['password'] = Hash::make($request->password);
        }
        $role_ids = $dataCreate['role_ids'] ?? [];
        if (in_array($this->role->where('name', 'admin')->first()->id, $role_ids)) {
            return redirect()->back()->with('error', 'You cannot assign admin role');
        }
        $user = $this->user->create($dataCreate);
        $user->roles()->sync($role_ids);
        Session::flash('success', 'Thêm user thành công');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
//    public function edit(string $id)
//    {
//        $user = $this->user->findOrFail($id)->load('roles');
//        $roles = $this->role->all();
//        return view('admin.users.edit', compact('user', 'roles'));
//    }
    public function edit(string $id)
    {
        $user = $this->user->findOrFail($id)->load('roles');
//        $roles = $this->role->where('name', '!=', 'admin')->get();
        $roles = $this->role->all()->groupBy('group');
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required',
        ]);

        $user = $this->user->findOrFail($id)->load('roles');

        // Kiểm tra xem người dùng có vai trò là admin hay không
        if ($user->hasRole('admin')) {
            return redirect()->back()->with('error', 'Bạn không thể sửa thông tin của người dùng có vai trò admin.');
        }

        $dataUpdate = $request->except('password');

        if ($request->password) {
            $dataUpdate['password'] = Hash::make($request->password);
        }

        $role_ids = $dataUpdate['role_ids'] ?? [];

        // Kiểm tra xem người dùng có thay đổi vai trò thành admin hay không
        if (in_array($this->role->where('name', 'admin')->first()->id, $role_ids)) {
            return redirect()->back()->with('error', 'Bạn không thể gán vai trò admin cho người dùng.');
        }

        $user->update($dataUpdate);
        $user->roles()->sync($role_ids);

        Session::flash('success', 'Sửa thông tin người dùng thành công');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function activate(User $user)
    {
        $user->status = 'active';
        $user->save();

        Session::flash('success', 'Người dùng đã kích hoạt thành công!');
        return redirect()->back();
    }

    public function deactivate(User $user)
    {
        $user->status = 'inactive';
        $user->save();

        Session::flash('success', 'Người dùng đã vô hiệu hóa thành công!');
        return redirect()->back();
    }

}

