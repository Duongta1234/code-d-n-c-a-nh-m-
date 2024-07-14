<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReligionRequest;
use App\Models\Employee;
use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $religion = Religion::get();
        return view('admin/religion.index', ['religion' => $religion]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/religion.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReligionRequest $request)
    {
        $religion = new Religion();
        $religion->religion_name = $request->input('religion_name');
        $religion->religion_another_name = $request->input('religion_another_name');
        $religion->save();
        return redirect()->route('religion.index');
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
    public function edit(Religion $religion)
    {
        return view('admin/religion.edit', compact('religion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReligionRequest $request, $id)
    {
        $religion_name = $request->input('religion_name');
        $religion_another_name = $request->input('religion_another_name');
        $religion = Religion::find($id);

        if (!$religion) {
            // Xử lý khi không tìm thấy bản ghi
            return redirect()->route('religion.index')->with('error', 'Không tìm thấy bản ghi.');
        }

        $religion->update([
            'religion_name' => $religion_name,
            'religion_another_name' => $religion_another_name
        ]);

        return redirect()->route('religion.index')->with('success', 'Cập nhật bản ghi thành công.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Religion $religion, Employee $employee)
    {
        // Kiểm tra xem Ethnicity có tồn tại trong bảng Employee
        if ($employee->where('ethnicity_id', $religion->id)->count() > 0) {
            // Nếu tồn tại, không thực hiện xóa và thông báo lỗi
            return redirect()->route('religion.index')->with('error', 'Không thể xoá vì đang id đang tồn tại trong employee .');
        }

        // Nếu không tồn tại trong Employee, thực hiện xóa
        $religion->delete();

        return redirect()->route('religion.index')->with('success', 'religion xoá thành công.');
    }
}
