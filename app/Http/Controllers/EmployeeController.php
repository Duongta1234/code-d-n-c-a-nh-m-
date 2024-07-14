<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use App\Models\Ward;
use App\Models\Level;
use App\Models\Contract;
use App\Models\District;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Province;
use App\Models\Religion;
use App\Models\Ethnicity;
use App\Models\Nationality;
use Illuminate\Http\Request;
use App\Models\StatusEmployee;
use App\Exports\EmployeeExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $rules = [
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'birthday' => 'required|date',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'phone_number' => 'required|digits:10',
        'gender' => 'required',
        'citizen_identity_card' => 'required|digits:12|unique:cards,citizen_identity_card',
        'place_of_issue' => 'required|max:255',
        'issue_date' => 'required|date',
        'previous_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'behind_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'origin_province' => 'required',
        'origin_district' => 'required',
        'origin_ward' => 'required',
        'origin_detail' => 'required',
        'address_province' => 'required',
        'address_district' => 'required',
        'address_ward' => 'required',
        'address_detail' => 'required',
        'nationality_id' => 'required',
        'religion_id' => 'required',
        'ethnicity_id' => 'required',
        'position' => 'required',
        'level' => 'required',
    ];
    protected $messages = [
        'required' => ':attribute không được bỏ trống!',
        'unique' => ':attribute đã tồn tại!',
        'max' => ':attribute tối đa :max ký tự!',
        'date' => ':attribute không phải là thời gian!',
        'image' => ':attribute không phải là hình ảnh!',
        'mimes' => ':attribute không đúng định dạng!',
        'digits' => ':attribute phải là :digits ký tự!',
        'integer' => ':attribute phải là số!',
    ];
    protected $attributes = [
        'first_name' => 'Họ',
        'last_name' => 'Tên',
        'birthday' => 'Ngày sinh',
        'image' => 'Hình ảnh',
        'gender' => 'Giới tính',
        'phone_number' => 'Số điện thoại',
        'citizen_identity_card' => 'Căn cước công dân',
        'place_of_issue' => 'Nơi cấp',
        'issue_date' => 'Ngày cấp',
        'previous_image' => 'Ảnh mặt trước',
        'behind_image' => 'Ảnh mặt sau',
        'origin_province' => 'Nguyên quán tỉnh',
        'origin_district' => 'Nguyên quán quận/huyện',
        'origin_ward' => 'Nguyên quán xã/phường',
        'origin_detail' => 'Địa chỉ cụ thể',
        'address_province' => 'Tỉnh hiện tại',
        'address_district' => 'Quận/huyện hiện tại',
        'address_ward' => 'Xã/phường hiện tại',
        'address_detail' => 'Địa chỉ cụ thể',
        'nationality_id' => 'Quốc tịch',
        'religion_id' => 'Tôn giáo',
        'ethnicity_id' => 'Dân tộc',
        'position' => 'Chức vụ',
        'level' => 'Trình độ',
    ];


    public function index(Request $request)
    {
        if (auth()->user()->can('show-employees')) {
            // Lấy tất cả thông tin nhân viên nếu người dùng có quyền view-all
            $employees = Employee::get();
        } else {
            // Chỉ trả về thông tin của chính họ nếu không có quyền view-all
            $employees = Employee::where('user_id', auth()->user()->id)->get();
            $firstEmployeeID = $employees->first()->id;
            return redirect()->route('employees.detail',['employee'=>$firstEmployeeID]);
        }
        $users = User::get();
        $cards = Card::doesntHave('employee')->get(); // lấy ra các card chưa tồn tại trong employees
        $provinces = Province::get();
        $districts = District::get();
        $wards = Ward::get();
        $nationalities = Nationality::get();
        $positions = Position::get();
        $levels = Level::get();
        $religions = Religion::get();
        $ethnicities = Ethnicity::get();
        // $origin = explode('-', $employee->origin);
        // $address = explode('-', $employee->address);

        return view(
            'admin.employees.index',
            compact(
                'employees',
                'cards',
                'districts',
                'wards',
                'provinces',
                'users',
                'nationalities',
                'positions',
                'levels',
                'religions',
                'ethnicities',
            // 'origin',
            // 'address'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::whereDoesntHave('employee')->get();
        $cards = Card::doesntHave('employee')->get(); // lấy ra các card chưa tồn tại trong employees
        $provinces = Province::get();
        $districts = District::get();
        $wards = Ward::get();
        $nationalities = Nationality::get();
        $positions = Position::get();
        $levels = Level::get();
        $religions = Religion::get();
        $ethnicities = Ethnicity::get();
        return view(
            'admin.employees.add',
            compact(
                'cards',
                'districts',
                'wards',
                'provinces',
                'users',
                'nationalities',
                'positions',
                'levels',
                'religions',
                'ethnicities'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $request->validate($request->rules());
        $previous = $request->previous_image->getClientOriginalName();
        $request->previous_image->storeAs('public/images/previous_card', $previous);
        $behind = $request->behind_image->getClientOriginalName();
        $request->behind_image->storeAs('public/images/behind_card', $behind);

        $card = new Card();
        $card->citizen_identity_card = $request->citizen_identity_card;
        $card->place_of_issue = $request->place_of_issue;
        $card->issue_date = $request->issue_date;
        $card->previous_image = $previous;
        $card->behind_image = $behind;
        $card->save();


        $image = $request->image->getClientOriginalName();
        $request->image->storeAs('public/images/employee_image', $image);
        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->date_of_birth = $request->birthday;
        $employee->image = $image;
        $employee->gender = $request->gender;
        $employee->phone_number = $request->phone_number;
        $employee->card_id = $card->id;
        $employee->nationality_id = $request->nationality_id;
        $employee->ethnicity_id = $request->ethnicity_id;
        $employee->religion_id = $request->religion_id;
        $employee->level_id = $request->level;
        $employee->position_id = $request->position;
        $employee->origin = $request->origin_detail.'-'.$request->origin_ward . '-' . $request->origin_district . '-' . $request->origin_province;
        $employee->address = $request->address_detail.'-'.$request->address_ward . '-' . $request->address_district . '-' . $request->address_province;
        $employee->user_id = $request->user_id;
        $employee->save();

        $status_employee = new StatusEmployee();
        $status_employee->status = 0;
        $status_employee->employee_id = $employee->id;
        $status_employee->save();


        Session::flash('success', 'Thêm thành công');
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $users = User::whereNotIn('id', function ($query) {
            $query->select('user_id')->from('employees');
        })
        ->where('id', '<>', $employee->user_id)
            ->union(User::where('id', $employee->user_id))
            ->get();

        $data = [
            'id' => $employee->id,
            'first_name' => $employee->first_name,
            'last_name' => $employee->last_name,
            'gender' => $employee->gender,
            'birthday' => $employee->date_of_birth,
            'image' => asset('storage/images/employee_image/' . $employee->image),
            'phone_number' => $employee->phone_number,
            'card' => $employee->card,
            'nationality' => $employee->nationality,
            'origin' => $employee->origin,
            'address' => $employee->address,
            'religion' => $employee->religion,
            'ethnicity' => $employee->ethnicity,
            'level' => $employee->level,
            'user' => $employee->user,
            'users' =>  $users,
            'position' => $employee->position,
            'previous_image' => asset('storage/images/previous_card/' . $employee->card->previous_image),
            'behind_image' => asset('storage/images/behind_card/' . $employee->card->behind_image),
        ];
        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {

        if (!empty($request->route()->employee->id)) {
            $this->rules['citizen_identity_card'] = 'required|digits:12|unique:cards,citizen_identity_card,' . $request->route()->employee->card->id;
            if ($request->image) {
                $this->rules['image'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
            } else {
                unset($this->rules['image']);
            }

            if ($request->previous_image) {
                $this->rules['previous_image'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
            } else {
                unset($this->rules['previous_image']);
            }

            if ($request->behind_image) {
                $this->rules['behind_image'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
            } else {
                unset($this->rules['behind_image']);
            }
        }

        $validator = Validator::make($request->all(), $this->rules, $this->messages, $this->attributes);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            $card = Card::find($employee->card_id);

            $card->citizen_identity_card = $request->citizen_identity_card;
            $card->place_of_issue = $request->place_of_issue;
            $card->issue_date = $request->issue_date;
            if ($request->previous_image) {
                Storage::delete('public/images/previous_card/' . $card->previous_image);
                $previous = $request->previous_image->getClientOriginalName();
                $request->previous_image->storeAs('public/images/previous_card', $previous);
                $card->previous_image = $previous;
            }
            if ($request->behind_image) {
                Storage::delete('public/images/behind_card/' . $card->behind_image);
                $behind = $request->behind_image->getClientOriginalName();
                $request->behind_image->storeAs('public/images/behind_card', $behind);
                $card->behind_image = $behind;
            }
            $card->save();


            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->date_of_birth = $request->birthday;

            if ($request->image) {
                Storage::delete('public/images/employee_image/' . $employee->image);
                $image = $request->image->getClientOriginalName();
                $request->image->storeAs('public/images/employee_image', $image);
                $employee->image = $image;
            }


            $employee->gender = $request->gender;
            $employee->phone_number = $request->phone_number;
            $employee->card_id = $card->id;
            $employee->nationality_id = $request->nationality_id;
            $employee->ethnicity_id = $request->ethnicity_id;
            $employee->religion_id = $request->religion_id;
            $employee->position_id = $request->position;
            // $status_employee->status = $request->status_employee;
            $employee->level_id = $request->level;
            $employee->origin = $request->origin_detail . '-' . $request->origin_ward . '-' . $request->origin_district . '-' . $request->origin_province;
            $employee->address = $request->address_detail . '-' . $request->address_ward . '-' . $request->address_district . '-' . $request->address_province;
            if ($request->user_id) {
                $employee->user_id = $request->user_id;
            }
            $employee->save();
            // Session::flash('success', 'Edit Religion Successfully ');

            $data = [
                'id' => $employee->id,
                'first_name' => $employee->first_name,
                'last_name' => $employee->last_name,
                'gender' => $employee->gender,
                'birthday' => $employee->date_of_birth,
                'image' => $employee->image,
                'phone_number' => $employee->phone_number,
                'card' => $employee->card,
                'nationality' => $employee->nationality,
                'origin' => $employee->origin,
                'address' => $employee->address,
                'religion' => $employee->religion,
                'ethnicity' => $employee->ethnicity,
                'position' => $employee->position,
                'status_employee' => $employee->statusEmployee,
                'level' => $employee->level,
                'user' => $employee->user,
                'role' => $employee->user->getRoleNames(),
            ];
            return response()->json(['data' => $data, 'success' => 'Cập nhật thành công']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Employee $employee)
    // {
    //     $exist = Contract::where('employee_id', $employee->id)->exists();
    //     if ($exist) {
    //         Session::flash('error', 'Mã thông tin nhân viên vẫn tồn tại!');
    //         return redirect()->back();
    //     } else {
    //         $card = Card::find($employee->card_id);
    //         $status_employee = StatusEmployee::find($employee->status_employee_id);
    //         Storage::delete('public/images/employee_image/' . $employee->image);
    //         Storage::delete('public/images/previous_card/' . $card->previous_image);
    //         Storage::delete('public/images/behind_card/' . $card->behind_image);
    //         $employee->delete();
    //         $card->delete();
    //         $status_employee->delete();

    //         Session::flash('success', 'Xoá thành công');
    //         return redirect()->back();
    //     }
    // }

    public function export()
    {
        return Excel::download(new EmployeeExport, 'employees.xlsx');
    }

    public function detail(Employee $employee)
    {
        $users = User::get();
        $cards = Card::doesntHave('employee')->get(); // lấy ra các card chưa tồn tại trong employees
        $provinces = Province::get();
        $districts = District::get();
        $wards = Ward::get();
        $nationalities = Nationality::get();
        $positions = Position::get();
        $status_employees = StatusEmployee::get();
        $contracts = Contract::get();
        $levels = Level::get();
        $religions = Religion::get();
        $ethnicities = Ethnicity::get();
        $origin = explode('-', $employee->origin);
        $address = explode('-', $employee->address);
        return view('admin.employees.detail', compact(
            'employee',
            'cards',
            'districts',
            'wards',
            'provinces',
            'users',
            'nationalities',
            'positions',
            'status_employees',
            'contracts',
            'levels',
            'religions',
            'ethnicities',
            'origin',
            'address'
        ));
    }

    public function editDetailEmployee(Employee $employee, Request $request)
    {
        if ($request->isMethod('POST')) {
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            if ($request->image) {
                Storage::delete('public/images/employee_image/' . $employee->image);
                $image = $request->image->getClientOriginalName();
                $request->image->storeAs('public/images/employee_image', $image);
                $employee->image = $image;
            }
            $employee->date_of_birth = $request->birthday;
            $employee->gender = $request->gender;
            $employee->phone_number = $request->phone_number;
            $employee->origin = $request->address_detail . '-' . $request->address_ward . '-' . $request->address_district . '-' . $request->address_province;
            $employee->save();
            return response()->json(['data' => $employee]);
        } else {
            return response()->json(['data' => $employee]);
        }
    }

    public function editDetailPersonalEmployee(Employee $employee, Request $request)
    {
        $card = Card::find($employee->card_id);


        if ($request->isMethod('POST')) {
            $card->citizen_identity_card = $request->citizen_identity_card;
            $card->place_of_issue = $request->place_of_issue;
            $card->issue_date = $request->issue_date;
            if ($request->previous_image) {
                Storage::delete('public/images/previous_card/' . $card->previous_image);
                $image = $request->previous_image->getClientOriginalName();
                $request->previous_image->storeAs('public/images/previous_card', $image);
                $card->previous_image = $image;
            }

            if ($request->behind_image) {
                Storage::delete('public/images/behind_card/' . $card->behind_image);
                $image = $request->behind_image->getClientOriginalName();
                $request->behind_image->storeAs('public/images/behind_card', $image);
                $card->behind_image = $image;
            }
            $card->save();
            $employee->nationality_id = $request->nationality_id;
            $employee->religion_id = $request->religion_id;
            $employee->address = $request->address_detail . '-' . $request->address_ward . '-' . $request->address_district . '-' . $request->address_province;
            $employee->save();
            $nationality = Nationality::find($employee->nationality_id);
            $religion = Religion::find($employee->religion_id);
            $data = ['origin' => $employee->origin, 'card' => $card, 'nationality' => $nationality, 'religion' => $religion];
            return response()->json(['data' => $data]);
        } else {
            $nationality = Nationality::find($employee->nationality_id);
            $religion = Religion::find($employee->religion_id);
            $data = ['origin' => $employee->origin, 'card' => $card, 'nationality' => $nationality, 'religion' => $religion];
            return response()->json(['data' => $data]);
        }
    }
    public function boxDetail()
    {
        $employees = Employee::orderBy('id', 'desc')->get();

        return view(
            'admin.employees.boxdetail',
            compact(
                'employees',

            )
        );
    }

    // search

    public function search(Request $request)
    {
        $sql = Employee::join('users', 'employees.user_id', '=', 'users.id')
            ->select('employees.*', 'users.email');
        if ($request->search_id) {
            $sql->where('employees.id', 'like', '%' . $request->search_id . '%');
        }
        if ($request->search_name) {
            $sql->orWhere('employees.first_name', 'like', '%' . $request->search_name . '%');
            $sql->orWhere('employees.last_name', 'like', '%' . $request->search_name . '%');
            $sql->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%$request->search_name%"]);
        }
        if ($request->search_email) {
            $sql->orWhere('users.email', 'like', '%' . $request->search_email . '%');
        }

        $employees = $sql->get();
        $users = User::whereDoesntHave('employee')->get();
        $cards = Card::doesntHave('employee')->get(); // lấy ra các card chưa tồn tại trong employees
        $provinces = Province::get();
        $districts = District::get();
        $wards = Ward::get();
        $nationalities = Nationality::get();
        $positions = Position::get();
        $levels = Level::get();
        $religions = Religion::get();
        $ethnicities = Ethnicity::get();
        return view(
            'admin.employees.index',
            compact(
                'employees',
                'cards',
                'districts',
                'wards',
                'provinces',
                'users',
                'nationalities',
                'positions',
                'levels',
                'religions',
                'ethnicities',
            )
        );
    }

    public function activeEmployee(Employee $employee)
    {
        if ($employee->status == 0) {
            $employee->status = 1;
        } else {
            $employee->status = 0;
        }
        $employee->save();

        Session::flash('success', 'Trạng thái đã được thay đổi');
        return back();
    }
}
