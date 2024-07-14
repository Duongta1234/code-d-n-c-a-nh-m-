<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PositionController extends Controller
{
    public function index(PositionRequest $request)
    {
        $position= new Position();
        $ListPosition = $position::all();
        if ($request->post() && $request->search_position) {
            $ListPosition = $position::where('position_name', 'like', '%' . $request->search_position.'%')
                ->get();

        }
        return view('admin.position.index', compact( 'ListPosition'));
    }
    public function add(PositionRequest $request)
    {
        if ($request->isMethod('POST')) { //tồn tại phương thức post
            $params = $request->except('_token');

            $position = Position::create($params);
            if ($position->id) {
                Session::flash('success', 'Thêm chức vụ thành công');
                return redirect()->route('route_position_add');
            }
        }
        return view('admin.position.add');
    }
    public function  edit(PositionRequest $request, $id)
    {

        $position = Position::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            $result = Position::where('id', $id)
                ->update($params);
            if ($result) {
                Session::flash('success', 'Sửa chức vụ thành công');
                return redirect()->route('route_position_edit', ['id'=>$id]);
            }
        }
        return view('admin.position.edit', compact('position'));
    }
    public function delete($id) {
        Position::where('id', $id)->delete();
        Session::flash('success', 'Xóa chức vụ thành công ');
        return redirect()->route('route_position_index');
    }
}
