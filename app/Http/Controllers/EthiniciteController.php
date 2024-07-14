<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Ethnicity;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\EthiniciteRequest;
use App\Models\Ethinicite as ModelsEthinicite;

class EthiniciteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ethinicite = Ethnicity::get();
        return view('admin/ethinicite.index', ['ethinicites' => $ethinicite]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/ethinicite.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EthiniciteRequest $request)
    {
        $ethinicite = new Ethnicity();
        $ethinicite->ethnicity_name = $request->input('ethnicity_name');
        $ethinicite->save();
        Session::flash('success', 'Thêm thành công');
        return redirect()->route('ethinicite.index');
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
    public function edit(Ethnicity $ethinicite)
    {
        return view('admin/ethinicite.update', compact('ethinicite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EthiniciteRequest $request, $id)
    {
        $ethnicity_name = $request->input('ethnicity_name');
        $ethnicity = Ethnicity::find($id);

        if (!$ethnicity) {
            // Xử lý khi không tìm thấy bản ghi
            return redirect()->route('ethinicite.index')->with('error', 'Không tìm thấy bản ghi.');
        }

        $ethnicity->update([
            'ethnicity_name' => $ethnicity_name,
        ]);

        return redirect()->route('ethinicite.index');
        Session::flash('success', 'Cập nhật thành công');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ethnicity $ethinicite, Employee $employee)
    {
        // Kiểm tra xem Ethnicity có tồn tại trong bảng Employee
        if ($employee->where('ethnicity_id', $ethinicite->id)->count() > 0) {
            // Nếu tồn tại, không thực hiện xóa và thông báo lỗi
            return redirect()->route('ethinicite.index')->with('error', 'Cannot delete because it is associated with employees.');
        }

        // Nếu không tồn tại trong Employee, thực hiện xóa
        $ethinicite->delete();

        return redirect()->route('ethinicite.index');
        Session::flash('success', 'Xóa thành công thành công');
    }
}
