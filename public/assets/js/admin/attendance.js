// time
function updateTime() {
    let time = new Date()

    let hour = time.getHours()
    let minute = time.getMinutes()
    let second = time.getSeconds()

    hour = hour < 10 ? '0' + hour : hour;
    minute = minute < 10 ? '0' + minute : minute;
    second = second < 10 ? '0' + second : second;

    $('.attendance-index .punch-hours span').text(hour + ':' + minute + ':' + second)
}

setInterval(updateTime, 1000)

//attendance
$('.attendance-index .onoffswitch-checkbox').on('change', e => {
    e.preventDefault()
    let _token = $('.attendance-index input[name="_token"]').val();
    let checkbox = $('.attendance-index input[name="onoffswitch"]').prop('checked');
    let id = $('.attendance-index input[name="id"]').val();
    let time = $('.attendance-index .punch-hours span').text()

    if (checkbox) {
        $.ajax({
            url: e.target.form.action,
            type: "post",
            data: {
                _token,
                checkbox,
                time,
            },
            dataType: 'json',
            success: function (response) {
                $('.attendance-index input[name="id"]').val(response.timesheet.id)
                $('.attendance-index .res-activity-list').prepend(`<li>
                    <p class="mb-0">Giờ vào</p>
                    <p class="res-activity-time">
                        <i class="far fa-clock"></i>
                        ${response.timesheet.time_in}
                    </p>
                </li>`)

                $('.attendance-index .punch-finger').append(`<div class="punch-det">
                <h6>Punch In at</h6>
                <p>${response.timesheet.log_date + ' ' + response.timesheet.time_in}</p>
                </div>`)

                $('.attendance-index tbody').prepend(`<tr>
                <td>${response.timesheet.id}</td>
                <td>${response.timesheet.log_date}</td>
                <td>${response.timesheet.time_in}</td>
                <td>${response.timesheet.time_out}</td>
                <td>${response.timesheet.status == 0 ? 'Chưa hoàn thành': 'Đã hoàn thành'}</td>
                <td>${response.timesheet.reason}</td>
                {{-- <td></td> --}}
            </tr>`)
            }
        })
    } else {
        $.ajax({
            url: e.target.form.action + '/update',
            type: "post",
            data: {
                _token,
                checkbox,
                time,
                id
            },
            dataType: 'json',
            success: function (response) {
                $('.attendance-index .res-activity-list').prepend(`<li>
                    <p class="mb-0">Giờ ra</p>
                    <p class="res-activity-time">
                        <i class="far fa-clock"></i>
                        ${response.timesheet.time_out}
                    </p>
                </li>`)

                $('.attendance-index .onoffswitch-checkbox').attr('disabled', 'disabled')

                if ($('.punch-det')) {
                    $('.punch-det').remove()
                    $('.punch-finger').append(`<div class="punch-det">
                    <h6>Punch Out at</h6>
                    <p>${response.timesheet.log_date + ' ' + response.timesheet.time_out}</p>
                    </div>`)
                }

                
            }
        })
    }

})

// admin attendance

$('.admin-attendance .attendance-check').on('click', e => {
    e.preventDefault();
    if (e.target.matches('a') || e.target.matches('i')) {
        let id = e.target.closest('a').dataset.attendance

        $.ajax({
            url: '/attendance/admin/' + id,
            type: 'get',
            success: function (response) {
                let timesheet = response.timesheet
                let time_in = new Date(timesheet.log_date + 'T' + timesheet.time_in + 'Z').getUTCHours();
                let time_out = new Date(timesheet.log_date + 'T' + timesheet.time_out + 'Z').getUTCHours();

                $('.admin-attendance .log-date').text(timesheet.log_date)
                $('.admin-attendance .time-in').text(timesheet.log_date + ' ' + timesheet.time_in)
                $('.admin-attendance .time-out').text(timesheet.log_date + ' ' + timesheet.time_out)
                $('.admin-attendance .count-time').text((time_out - time_in) + 'hrs');
                $('.admin-attendance .punch-in').append(`<i class="far fa-clock"></i> ${timesheet.time_in}`)
                $('.admin-attendance .punch-out').append(`<i class="far fa-clock"></i> ${timesheet.time_out}`)
                $('.admin-attendance .form-status').attr('action', '/attendance/admin/' + id)
                //checked status attendance
                timesheet.status == 1 && $('.admin-attendance .onoffswitch-checkbox').prop('checked', true)
                timesheet.reason != null && $('.admin-attendance .input-reason').removeAttr('hidden')
                timesheet.reason != null && $('.admin-attendance .input-reason').val(timesheet.reason)
            }
        })
    }
})

// update status attendance
$('.admin-attendance .onoffswitch-checkbox').on('change', e => {
    e.preventDefault();
    $('.admin-attendance .input-reason').is(':hidden') && $('.admin-attendance .input-reason').removeAttr('hidden')
    $('.admin-attendance .input-reason').val('')
    $('.admin-attendance .submit-status').hasClass('d-none') && $('.admin-attendance .submit-status').removeClass('d-none').addClass('d-block')
})

$('.admin-attendance .submit-status').on('click', e => {
    e.preventDefault();

    let _token = $('.admin-attendance input[name="_token"]').val();
    let checkbox = $('.admin-attendance input[name="onoffswitch"]').prop('checked');
    let reason = $('.admin-attendance input[name="reason"]').val();
    $.ajax({
        url: $('.admin-attendance .form-status').attr('action'),
        type: 'POST',
        data: {
            _token,
            checkbox,
            reason
        },
        dataType: 'json',
        success: function (response) {
            if (response.error) {
                console.log(response.error)
            } else {
                if ($(`.admin-attendance a[data-attendance="${response.timesheet.id}"] i`)) {
                    $(`.admin-attendance a[data-attendance="${response.timesheet.id}"] i`).remove()
                }
                if (response.timesheet.status == 0) {
                    $(`.admin-attendance a[data-attendance="${response.timesheet.id}"]`).append(`<i class="fas fa-times text-danger"></i>`)
                } else {
                    $(`.admin-attendance a[data-attendance="${response.timesheet.id}"]`).append(`<i class="fa fa-check text-success"></i>`)
                }
                $('#attendance_info').modal('hide');
                $('.admin-attendance .submit-status').hasClass('d-block') && $('.admin-attendance .submit-status').removeClass('d-block').addClass('d-none')
            }
        }
    })
})


$('#attendance_info').on('hidden.bs.modal', function () {
    $('.admin-attendance .log-date').text('')
    $('.admin-attendance .time-in').text('')
    $('.admin-attendance .time-out').text('')
    $('.admin-attendance .count-time').text('');
    $('.admin-attendance .punch-in').text('')
    $('.admin-attendance .punch-out').text('')
    $('.admin-attendance .onoffswitch-checkbox').prop('checked', false)
    $('.admin-attendance .submit-status').hasClass('d-block') && $('.admin-attendance .submit-status').removeClass('d-block').addClass('d-none')
});
