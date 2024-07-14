<strong>Thân gửi bạn {{$data['name']}},</strong>

<p>Lời đầu tiên, chúng tôi vô cùng cảm ơn vì bạn đã quan tâm và dành thời gian ứng tuyển vị trí {{$data['job_position']}} tại công ty chúng tôi. Thông qua buổi phỏng vấn cũng như trao đổi, chúng tôi đánh giá cao kinh nghiệm và kỹ năng của bạn.</p>
<p>Bởi vậy, <b> chúng tôi xin chúc mừng bạn vì đã vượt qua vòng phỏng vấn, chính thức trúng tuyển vị trí {{$data['job_position']}} tại công ty.</b></p>
<p>Như những thỏa thuận trong buổi phỏng vấn trước, mức lương và thời gian làm việc làm cho bạn như sau:</p>
<ul>
    <li>Mức lương khởi điểm: {{number_format($data['salary'])}} VND</li>
    @if($data['time_try'])
        <li>Thời gian thử việc: {{$data['time_try']}} ngày</li>
    @endif
    <li>Thời gian làm việc: 8h-12h và 13h-17h T2-T7</li>
    <li>Ngày bắt đầu làm việc: {{$data['time']}}</li>
    <li>Địa điểm: {{$data['address']}}</li>
    @if($data['note'])
        <p>Lưu ý: <i>{{$data['note']}}</i></p>
    @endif
</ul>
<p>Chúng tôi đã sắp xếp và bố trí mọi thứ cần thiết phục vụ cho công việc của bạn. Bởi vậy, chúng tôi rất mong bạn sẽ có mặt đúng giờ vào ngày đầu làm việc để chúng tôi có thể chào đón bạn một cách nồng nhiệt nhất.</p>
<p>Trong thời gian từ nay đến khi bạn đưa ra quyết định của mình, nếu có bất kỳ thắc mắc nào, bạn hãy liên hệ với tôi qua số điện thoại: <b>{{auth()->user()->employee->phone_number}} ( {{auth()->user()->employee->first_name}} {{auth()->user()->employee->last_name}})</b> hoặc địa chỉ email: <b>tuyendungphatdat68@gmail.com</b> để được giải đáp.</p>
<p>Rất mong sẽ nhận được phản hồi sớm từ bạn!</p>
<p>Trân trọng,</p>

<strong><i style="font-size: 18px;">Công ty Phát Đạt</i></strong>
