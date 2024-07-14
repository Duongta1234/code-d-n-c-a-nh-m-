<b>Thân gửi bạn {{' '.$data['name']}},</b>
<p>Cảm ơn bạn đã dành thời gian tìm hiểu về công ty Phát Đạt và gửi CV ứng tuyển cho vị trí {{$data['job_position']}}
    Chúng tôi rất mong muốn được gặp mặt trực tiếp và trao đổi với bạn chi tiết hơn về công việc này, cũng như để hiểu
    rõ hơn về bạn.</p>
<p>Buổi phỏng vấn cho vị trí {{$data['job_position']}} sẽ được bắt đầu vào:</p>

<li>Thời gian: {{$data['time']}} ngày {{$data['day']}}</li>
<li>Địa điểm: {{$data['address']}}</li>
@if($data['note'])
<p>Lưu ý: <i>{{$data['note']}}</i></p>
@endif
<a href="{{route('interview_schedule_status',$data['scheduleId'])}}" style="text-decoration: solid">Xác nhận tham gia phỏng vấn</a>

<p><i><b>Để buổi phỏng vấn được diễn ra thuận lợi, bạn vui lòng chọn <b>xác nhân tham gia phỏng vấn</b> hoặc phản hồi lại email này trong 24h kể từ khi nhận được nếu có bất kỳ thay đổi gi để
            chúng tôi chuẩn bị tiếp đón bạn chu đáo nhất.</b></i></p>
<p>Mọi thắc mắc khác, bạn vui lòng liên hệ với chúng tôi qua:
    <li>Số điện thoại: {{auth()->user()->employee->phone_number}} ( {{auth()->user()->employee->first_name}}
        {{auth()->user()->employee->last_name}})</li>
    <li>Email: tuyendungphatdat68@gmail.com</li>
</p>
<br>
<p>Rất mong được gặp bạn trong buổi phỏng vấn sắp tới.</p>

<p>Trân trọng</p>,
<br>
<b><i>Công ty Phát Đạt</i></b>

<style>
    p {
        font-size: 20px;
    }
</style>