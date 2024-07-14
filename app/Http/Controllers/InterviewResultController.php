<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Employee;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Models\InterviewResult;
use App\Models\InterviewSchedule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class InterviewResultController extends Controller
{
    public function index(Request $request)
    {
        $candidate = Candidate::get();
        $user = User::get();
        $interviewSchedule = InterviewSchedule::get();
        $ListInterviewResult = InterviewResult::all();
        // $array = [];
        // foreach ($ListInterviewResult as $item){
        //     if(!empty($item->candidate->id)){
        //         array_push($array,$item->candidate->id);
        //     }
        // }
        // dd($array);
        if ($request->post()) {
            $sql = InterviewResult::query();
            if ($request->search_candidate_name) {
                $sql->whereHas('candidate', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search_candidate_name . '%');
                });
            }
            $ListInterviewResult = $sql->get();
        }

        return view('admin.recruitment.interview_result.index', compact('ListInterviewResult', 'interviewSchedule', 'candidate', 'user'));
    }

    public function detail(Request $request, $id)
    {
        $interviewResult = new InterviewResult();
        $candidate = Candidate::get();
        $user = User::get();
        $employee = Employee::get();
        $interviewSchedule = InterviewSchedule::get();
        $interviewResult_detail = $interviewResult::find($id);
        if ($request->isMethod('POST')) {
            $interviewResult_detail->result_interview = $request->result_interview;
            // $interviewResult_detail->note = $request->note;
            $result = $interviewResult_detail->update();
            if ($result) {
                Session::flash('success', 'Cập nhật kết quả phỏng vấn thành công');
                return redirect()->route('route_interview_result_detail', ['id' => $id]);
            }
        }

        return view('admin.recruitment.interview_result.detail', compact('interviewResult_detail', 'interviewSchedule', 'candidate', 'user', 'employee'));
    }

    public function sendFailedEmail(Request $request, $id, Candidate $candidate, InterviewResult $interviewResult)
    {
        $interviewResultSendMail = $interviewResult::find($id);
        $candidate_failed = $candidate::find($interviewResultSendMail->candidate_id);
        // Gửi email từ chối
        Mail::send('admin.recruitment.email.failed_interview_email', $candidate_failed->toArray(), function ($email) use ($candidate_failed) {
            $email->subject('Thư thông báo kết quả phỏng vấn');
            $email->to($candidate_failed->email, $candidate_failed->name);
        });
        // Sau khi gửi mai thì xóa khỏi bảng kết quả
        $deletedRows = InterviewResult::where('id', $id)->delete();
        Session::flash('success', 'Gửi Email thành công');
        return redirect()->route('route_interview_result_index');
    }

    public function sendPassEmail(Request $request, $id, Candidate $candidate, InterviewResult $interviewResult)
    {
        $interviewResultSendMail = $interviewResult::find($id);
        if ($request->isMethod('POST')) {
            $candidate_pass_email = $candidate::find($interviewResultSendMail->candidate_id);
            $validatedData = $request->validate([
                'salary' => 'required|integer|min:0',
                'time_try' => 'integer|min:0|max:21',
                'file_pdf'=> 'mimes:pdf|max:2048'
            ]);
            if ($request->hasFile('file_pdf') && $request->file('file_pdf')->isValid()) {
                $pdf = $request->file('file_pdf');
                $pdfName = time() . '_' . $pdf->getClientOriginalName();
                $pdf->move(public_path('pdf/candidate'), $pdfName);
            }
            $dateTime = Carbon::parse($request->time);
            $data = [
                'name' => $candidate_pass_email->name,
                'time' => $dateTime->format('H:i d-m-Y'),
                'address' => $request->address,
                'salary' => $request->salary,
                'time_try' => $request->time_try,
                'note' => $request->note,
                'job_position' => $candidate_pass_email->job_posting->job_position->title,
            ];

            Mail::send('admin.recruitment.email.pass_interview_email', compact('data'), function ($email) use ($candidate_pass_email,$pdfName) {
                $email->subject('Công ty Phát Đạt – Thông báo kết quả phỏng vấn cho vị trí ' . " " . $candidate_pass_email->job_posting->title);
                $email->to($candidate_pass_email->email, $candidate_pass_email->name);
                $email->attach(public_path('pdf/candidate/'.$pdfName), [
                    'as' => 'document.pdf',
                    'mime' => 'application/pdf',
                ]);
            });

            File::delete('pdf/candidate/'.$pdfName);
            $interviewResultSendMail->update(['note' => 1]);

            Session::flash('success', 'Gửi Email thành công');
            return redirect()->route('route_interview_result_index');
        }
        return view('admin.recruitment.email.setup_pass_interview_email', compact('interviewResultSendMail'));
    }
}
