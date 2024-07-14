<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Candidate;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use App\Models\InterviewSchedule;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CandidateRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CandidateController extends Controller
{

    public function index(Request $request)
    {
        $job_posting = JobPosting::has('candidates')->get();
        $query = Candidate::doesntHave('interviewSchedules');

        if ($request->filled('search_candidate_name')) {
            $query->where('name', 'like', '%' . $request->search_candidate_name . '%');
        }

        if ($request->filled('job_posting_title')) {
            $query->where('job_posting_id',  $request->job_posting_title);
        }

        if ($request->filled('date_apply')) {
            $query->whereDate('created_at', Carbon::parse($request->date_apply)->toDateString());
        }
        $ListCandidate = $query->get();
        return view('admin.recruitment.candidate.index', compact('ListCandidate', 'job_posting'));
    }

    public function add(CandidateRequest $request)
    {
        if ($request->ismethod('POST')) {
            if ($request->hasFile('file_cv') && $request->file('file_cv')->isValid()) {

                $pdf = $request->file('file_cv');
                $pdfName = time() . '_' . $pdf->getClientOriginalName();
                $pdf->move(public_path('pdf/candidate'), $pdfName);
                $params = $request->except('_token');
                $params['file_cv'] = $pdfName;
                $candidate = Candidate::create($params);

                if ($candidate) {
                    Session::flash('success', 'Ứng tuyển thành công, chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất');
                    return redirect()->route('route_job_posting_detail',['id'=>$request->job_posting_id]);
                }
            }
        }
    }

    public function detail(Request $request, $id, Candidate $candidate)
    {
        $job_posting = JobPosting::get();
        $candidate_detail = $candidate::find($id);
        return view('admin.recruitment.candidate.detail', compact('candidate_detail', 'job_posting'));
    }

    // Gửi mail từ chối

    public function sendRefuseEmail(Request $request, $id, Candidate $candidate)
    {
        $candidate_refuse = $candidate::find($id);

        // Gửi email từ chối
        Mail::send('admin.recruitment.email.refuse_email', $candidate_refuse->toArray(), function ($email) use ($candidate_refuse) {
            $email->subject('Thư cảm ơn');
            $email->to($candidate_refuse->email, $candidate_refuse->name);
        });

        // Xóa tệp CV
        File::delete('pdf/candidate/' . $candidate_refuse->file_cv);
        // Xóa ứng viên
        $candidate_refuse->delete();

        // Chuyển hướng đến trang chủ danh sách ứng viên
        Session::flash('success', 'Từ chối ứng viên thành công');
        return redirect(route('route_candidate_index'));
    }

    // Gửi mail mời phỏng vấn

    public function sendInviteEmail(Request $request, $id)
    {
        $candidate = new Candidate();
        $candidate_invite = $candidate::find($id);
        if ($request->isMethod('POST')) {
            $dateTime = new DateTime($request->time);
            $data = [
                'name' => $candidate_invite->name,
                'day' => $dateTime->format('d-m-Y'),
                'time' => $dateTime->format('H:i'),
                'address' => $request->address,
                'note' => $request->note,
                'job_position' => $candidate_invite->job_posting->job_position->title
            ];
            $interviewSchedule_check = InterviewSchedule::where('candidate_id', $id)->get();
            // Nếu không có ứng viên nào trong lịch tình giống ở đây thì sẽ thêm vào bảng lịch trình
            if ($interviewSchedule_check->isEmpty()) {
                $interviewSchedule = new InterviewSchedule();
                $interviewSchedule->candidate_id = $id;
                $interviewSchedule->job_position = $candidate_invite->job_posting->job_position->title;
                $interviewSchedule->interview_time = $dateTime;
                $interviewSchedule->interview_location = $request->address;
                $interviewSchedule->status = 1;
                $interviewSchedule->save();
                $data['scheduleId'] = $interviewSchedule->id;
                Mail::send('admin.recruitment.email.invite_email', compact('data'), function ($email) use ($candidate_invite) {
                    $email->subject('Công ty Phát Đạt – Lời mời phỏng vấn cho vị trí ' . ' ' . $candidate_invite->job_posting->title);
                    $email->to($candidate_invite->email, $candidate_invite->name);
                });
            } else {
                Session::flash('error', 'Đã gửi email cho ứng viên này');
                return redirect()->route('route_candidate_index');
            }
            Session::flash('success', 'Gửi Email thành công');
            return redirect()->route('route_candidate_index');
        }
        return view('admin.recruitment.email.setup_email', compact('candidate_invite'));
    }
}
