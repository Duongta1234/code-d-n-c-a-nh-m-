<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Holiday;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\HolidayRequest;

class HolidayController extends Controller
{
    //
    public function index()
    {
        $holidays = Holiday::all();
        return view('admin.holidays.index', compact('holidays'));
    }

    public function create()
    {
        return view('admin.holidays.create');
    }

    public function store(HolidayRequest $request)
    {
        $request->validate([
            'date' => 'required|date',
            'description' => 'required',
        ]);
        Holiday::create($request->all());
        Session::flash('success', 'Thêm ngày lễ thành công!');
        return redirect()->route('holiday.index');
}
    public function edit(string $id)
    {
        $holidays = Holiday::findOrFail($id);
        return view('admin.holidays.edit',compact('holidays'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HolidayRequest $request, string $id)
    {
        $holidays = Holiday::findOrFail($id);
        $dataUpdate=$request->all();
        $holidays->update($dataUpdate);
        Session::flash('success', 'Sửa ngày  lễ thành công!');
        return redirect()->route('holiday.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        Holiday::where('id', $id)->delete();
        Session::flash('success', 'Xóa ngày lễ thành công!');
        return redirect()->route('holiday.index');
    }
}
