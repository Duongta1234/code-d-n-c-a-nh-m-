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
use Illuminate\Support\Facades\File;
use App\Http\Requests\ContractRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ContractController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        if ($user->can('show-employees')) {
            $ListContract = Contract::get();
        } else {
            $ListContract = Contract::whereHas('employee', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();
            $firstContractId = $ListContract->first()->id;
//            dd($contractIds);
            return redirect()->route('route_contract_show',['id'=>$firstContractId]);
        }

        // If it's a POST request and search_name is provided, filter contracts based on employee's first_name or last_name
        if ($request->isMethod('post') && $request->search_name) {
            $ListContract = $ListContract->filter(function ($contract) use ($request) {
                return stripos($contract->employee->first_name, $request->search_name) !== false ||
                    stripos($contract->employee->last_name, $request->search_name) !== false;
            });
        }

        return view('admin.contract.index', compact('ListContract'));
    }


    public function add(ContractRequest $request)
    {
        $employee = Employee::whereDoesntHave('contract')
            ->orWhereHas('contract', function ($query) {
                $query->withTrashed()->whereNotNull('deleted_at');
            })->get();
        $position = Position::get();

        if ($request->ismethod('POST')) {
            if ($request->hasFile('file_pdf') && $request->file('file_pdf')->isValid()) {
                //$request->image = uploadFile('ImageContract', $request->file('image'));
                $params = $request->except('_token');
                $pdf = $request->file('file_pdf');
                $pdfName = time() . '_' . $pdf->getClientOriginalName();
                $pdf->move(public_path('pdf/contract'), $pdfName);
                $params['file_pdf'] = $pdfName;


                $contract = Contract::create($params);

                if ($contract) {
                    Session::flash('success', 'Thêm hợp đồng thành công');
                    return redirect()->route('route_contract_index');
                }
            }
        }

        return view('admin.contract.add', compact('employee', 'position'));
    }

    public function edit(ContractRequest $request, $id)
    {

        $contract = Contract::find($id);
        $employee = Employee::get();
        $position = Position::get();


        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            // Kiểm tra xem có tệp 'file_pdf' trong yêu cầu và có hợp lệ không
            if ($request->hasFile('file_pdf') && $request->file('file_pdf')->isValid()) {

                // Xóa tệp PDF hiện tại của hợp đồng
                $resultDL = File::delete('pdf/contract/' . $contract->file_pdf);

                // Nếu việc xóa thành công, tiến hành tải lên tệp PDF mới
                if ($resultDL) {
                    $pdf = $request->file('file_pdf');
                    $pdfName = time() . '_' . $pdf->getClientOriginalName();

                    // Di chuyển tệp PDF mới đến thư mục 'pdf/contract'
                    $pdf->move(public_path('pdf/contract'), $pdfName);
                    $params['file_pdf'] = $pdfName;
                }
            } else {
                // Nếu không có tệp mới được tải lên, giữ nguyên tên tệp PDF hiện tại
                $params['file_pdf'] = $contract->file_pdf;
            }
            $result = $contract->update($params);
            if ($result) {
                Session::flash('success', 'Sửa hợp đồng thành công');
                return redirect()->route('route_contract_edit', ['id' => $contract->id]);
            }
        }

        return view('admin.contract.edit', compact('employee', 'position', 'contract'));
    }

    public function delete(ContractRequest $request, $id)
    {
        $contract = Contract::find($id);
        File::delete('pdf/contract/' . $contract->file_pdf);
        $contract_delete = $contract->delete();
        if ($contract_delete) {
            Session::flash('success', 'Xóa hợp đồng thành công');
            return redirect()->route('route_contract_index');
        }
    }

    //luc them show hợp đôồng
    public function show($id)
    {
        $contract = Contract::find($id);

        if (!$contract) {
            // If the contract is not found, you may handle this case accordingly (e.g., redirect back with an error message).
            abort(404);
        }

        // Add any additional data you need for the view
        // For example, you might want to retrieve related data like employee and position
        $employee = $contract->employee;
        $position = $contract->position;

        return view('admin.contract.show', compact('contract', 'employee', 'position'));
    }

}
