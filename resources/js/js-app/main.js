jQuery(document).ready(function ($) {
    /*Event MenuBar*/
    var last_pos = 0;
    $(window).scroll(function () {
        var current_pos = $(this).scrollTop();
        if (current_pos > last_pos) {
            $('.menu-logo').css('padding-top', '30px')
        } else {
            $('.menu-logo').css('padding-top', '60px');
        }
        last_pos = current_pos;
    });
    $(window).on('DOMMouseScroll mousewheel', function (event) {
        if (event.originalEvent.detail > 0 || event.originalEvent.wheelDelta < 0) { //alternative options for wheelData: wheelDeltaX & wheelDeltaY
            $('.menu-logo').css('padding-top', '30px')
        } else {
            $('.menu-logo').css('padding-top', '60px');
        }
    });
    $('#toggle-btn').click(function () {
        $('.menu-navbar').toggleClass('navbar--show')
        $('.menu-layout').toggleClass('menu-layout--show')
    })

    /*Event Opening page*/
    $('#showCheckbox').click(function () {
        if ($('.checkbox-job').hasClass('checkbox-job-show')) {
            $('.checkbox-job').hide(300)
            $('.checkbox-job').removeClass('checkbox-job-show')
        } else {
            $('.checkbox-job').show(300)
            $('.checkbox-job').addClass('checkbox-job-show')
        }
    })
    $('#checkAll').click(function () {
        if (this.checked) {
            $('input:checkbox').not(this).prop('checked', !this.checked);
        }
        if (!this.checked) {
            $(this).prop('checked', true);
        }
    })
    $('.checkBox').change(function () {
        if ($('.checkBox:checked').length == $('.checkBox').length) {
            if ($('.checkBox').length > 1) {
                $('input#checkAll').prop('checked', true);
                $('input:checkbox').not($('input#checkAll')).prop('checked', false);
            } else $('input#checkAll').prop('checked', !this.checked);
        } else {
            if (this.checked) {
                $('input#checkAll').prop('checked', !this.checked);
            }
        }
    })

})

/*WOW JS*/
$(document).ready(function () {
    new WOW({
        mobile: false,
        offset: 0
    }).init();
})

function clickLayout() {
    $('.menu-navbar').toggleClass('navbar--show')
    $('.menu-layout').toggleClass('menu-layout--show')
}

$('#formCV').one('submit', function () {
    $(this).find('input[type="submit"]').attr('disabled', 'disabled');
});


