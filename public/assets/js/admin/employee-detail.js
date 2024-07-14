$(document).ready(function () {
    let href
    // Thêm value profile edit
    $('.pro-edit').on('click', function (e) {
        e.preventDefault()
        if (e.target.matches('a') || e.target.matches('i')) {
            href = $(e.target).closest('a').attr('href');

        }
        $.ajax({
            url: href,
            type: "get",
            success: function (response) {
                console.log(response)
                if (response.data) {
                    let data = response.data
                    //     $('input[name="id"]').val(data.id);
                    $('.input-edit-profile input[name="first_name"]').val(data.first_name);
                    $('.input-edit-profile input[name="last_name"]').val(data.last_name);
                    $('.input-edit-profile input[name="birthday"]').val(data.date_of_birth);
                    $('.input-edit-profile select[name="gender"]').val(data.gender).trigger('change.select2');
                    //     // $('.input-edit-profile input[name="image"]').val(data.image);
                    $('.input-edit-profile input[name="phone_number"]').val(data.phone_number);

                    let address = data.address.split('-')

                    //     // value address province
                    $('.input-edit-profile select[name="address_province"]').val(address[3]).trigger('change.select2');

                    //     // xử lý address province_id
                    let selectedProvinceAddress = $('.input-edit-profile select[name="address_province"] option:selected')
                    let selectDistrictAddress = $('.input-edit-profile select[name="address_district"]')
                    disabledDistrict(selectedProvinceAddress, selectDistrictAddress)

                    //     // Value address district
                    $('.input-edit-profile select[name="address_district"]').val(address[2]).trigger('change.select2');

                    //     // xử lý address district_id
                    let selectedDistrictAddress = $('.input-edit-profile select[name="address_district"] option:selected')
                    let selectWardAddress = $('.input-edit-profile select[name="address_ward"]')
                    disabledWard(selectedDistrictAddress, selectWardAddress)

                    //     //value address ward and detail
                    $('.input-edit-profile select[name="address_ward"]').val(address[1]).trigger('change.select2');
                    $('.input-edit-profile input[name="address_detail"]').val(address[0])

                    // xử lý thanh đổi của address province và district
                    $('.input-edit-profile select[name="address_province"]').on('change', function (e) {
                        let selectProvince = $('.input-edit-profile select[name="address_province"] option:selected')
                        let selectDistrict = $('.input-edit-profile select[name="address_district"]')
                        selectDistrict.val('').trigger('change.select2')
                        disabledDistrict(selectProvince, selectDistrict)
                    })

                    $('.input-edit-profile select[name="address_district"]').on('change', function (e) {
                        let selectDistrict = $('.input-edit-profile select[name="address_district"] option:selected')
                        let selectWard = $('.input-edit-profile select[name="address_ward"]')
                        selectWard.val('').trigger('change.select2')
                        disabledWard(selectDistrict, selectWard)
                    })
                }
            }
        })
    })

    $('.personal-edit').on('click', function (e) {
        e.preventDefault()
        if (e.target.matches('a') || e.target.matches('i')) {
            href = $(e.target).closest('a').attr('href');

        }
        $.ajax({
            url: href,
            type: "get",
            success: function (response) {
                console.log(response)

                if (response.data) {

                    let data = response.data

                    //     $('input[name="id"]').val(data.id);

                    //     // $('.input-edit-personal input[name="image"]').val(data.image);
                    $('.input-edit-personal input[name="citizen_identity_card"]').val(data.card.citizen_identity_card);
                    $('.input-edit-personal input[name="place_of_issue"]').val(data.card.place_of_issue);
                    $('.input-edit-personal input[name="issue_date"]').val(data.card.issue_date);
                    //     // $('.input-edit-personal input[name="previous_image"]').val();
                    //     // $('.input-edit-personal input[name="behind_image"]').val();
                    $('.input-edit-personal select[name="nationality_id"]').val(data.nationality.id).trigger('change.select2');
                    $('.input-edit-personal select[name="religion_id"]').val(data.religion.id).trigger('change.select2');


                    let address = data.origin.split('-')

                    //     // value address province
                    $('.input-edit-personal select[name="address_province"]').val(address[3]).trigger('change.select2');

                    //     // xử lý address province_id
                    let selectedProvinceAddress = $('.input-edit-personal select[name="address_province"] option:selected')
                    let selectDistrictAddress = $('.input-edit-personal select[name="address_district"]')
                    disabledDistrict(selectedProvinceAddress, selectDistrictAddress)

                    //     // Value address district
                    $('.input-edit-personal select[name="address_district"]').val(address[2]).trigger('change.select2');

                    //     // xử lý address district_id
                    let selectedDistrictAddress = $('.input-edit-personal select[name="address_district"] option:selected')
                    let selectWardAddress = $('.input-edit-personal select[name="address_ward"]')
                    disabledWard(selectedDistrictAddress, selectWardAddress)

                    //     //value address ward and detail
                    $('.input-edit-personal select[name="address_ward"]').val(address[1]).trigger('change.select2');
                    $('.input-edit-personal input[name="address_detail"]').val(address[0])

                    // xử lý thanh đổi của address province và district
                    $('.input-edit-personal select[name="address_province"]').on('change', function (e) {
                        let selectProvince = $('.input-edit-personal select[name="address_province"] option:selected')
                        let selectDistrict = $('.input-edit-personal select[name="address_district"]')
                        selectDistrict.val('').trigger('change.select2')
                        disabledDistrict(selectProvince, selectDistrict)
                    })

                    $('.input-edit-personal select[name="address_district"]').on('change', function (e) {
                        let selectDistrict = $('.input-edit-personal select[name="address_district"] option:selected')
                        let selectWard = $('.input-edit-personal select[name="address_ward"]')
                        selectWard.val('').trigger('change.select2')
                        disabledWard(selectDistrict, selectWard)
                    })
                }
            }
        })
    })



    //edit profile 
    $('.input-edit-profile button').on('click', function (e) {
        e.preventDefault()
        let formData = new FormData(e.target.closest('form'))
        $.ajax({
            url: href,
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                if (response.errors) {
                    $('.input-edit .error').text('');
                    for (const key in response.errors) {
                        $('.input-edit .' + key + '-error').text(response.errors[key][0]);
                    }
                } else {
                    let data = response.data
                    $('.input-edit-profile .text-phone_number').text(data.phone_number);
                    $('.input-edit-profile .text-gender').text(data.gender);
                    $('.input-edit-profile .text-birth').text(data.date_of_birth);
                    $('.input-edit-profile .text-address').text(data.address);
                    $('.input-edit-profile .text-name').text(data.first_name + ' ' + data.last_name);

                    let valueSrc = $('.input-edit-profile .text-image').attr('src');

                    let part = valueSrc.split('/');

                    part.pop();

                    part.push(data.image);

                    let result = part.join('/');

                    $('.input-edit-profile .text-image').attr('src', result);

                    $('#profile_info').modal('hide');
                }
            }
        })
    })

    // edit personal
    $('.input-edit-personal button').on('click', function (e) {
        e.preventDefault()
        let formData = new FormData(e.target.closest('form'))
        $.ajax({
            url: href,
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                if (response.errors) {
                    $('.input-edit .error').text('');
                    for (const key in response.errors) {
                        $('.input-edit .' + key + '-error').text(response.errors[key][0]);
                    }
                } else {
                    console.log(response.data);
                    let data = response.data
                    $('.personal-info .text-citizen_identity_card').text(data.card.citizen_identity_card);
                    $('.personal-info .text-place_of_issue').text(data.card.place_of_issue);
                    $('.personal-info .text-issue_date').text(data.card.issue_date);
                    $('.personal-info .text-origin').text(data.origin);
                    $('.personal-info .text-nationality').text(data.nationality.nationality_name);
                    $('.personal-info .text-religion').text(data.religion.religion_name);

                    // previous_image
                    let valueSrc = $('.input-edit-personal .text-previous_image').attr('src');

                    let part = valueSrc.split('/');

                    part.pop();

                    part.push(data.card.previous_image);

                    let result = part.join('/');

                    console.log(result);


                    $('.input-edit-personal .text-previous_image').attr('src', result);

                    // behind_image

                    let valueSrcBehind = $('.input-edit-personal .text-behind_image').attr('src');

                    let partBehind = valueSrcBehind.split('/');

                    partBehind.pop();

                    partBehind.push(data.card.behind_image);

                    let resultBehind = partBehind.join('/');

                    console.log(resultBehind);

                    $('.input-edit-personal .text-behind_image').attr('src', resultBehind);

                    $('#personal_info_modal').modal('hide');
                }
            }
        })
    })

    function disabledDistrict(selectProvince, selectDistrict) {
        let provinces = selectProvince[0].dataset.province

        let districts = selectDistrict[0].options

        $.each(districts, function (index, value) {
            if (!value.hasAttribute('disabled')) {
                value.setAttribute('disabled', 'disabled')
            }

        })

        $.each(districts, function (index, value) {
            if (value.dataset.province_id == provinces || value.dataset.province != undefined) {
                // console.log([value.value])
                value.removeAttribute('disabled')
            }

        })
    }

    function disabledWard(selectDistrict, selectWard) {
        let districts = selectDistrict[0].dataset.district

        let wards = selectWard[0].options

        $.each(wards, function (index, value) {
            if (!value.hasAttribute('disabled')) {
                value.setAttribute('disabled', 'disabled')
            }

        })

        $.each(wards, function (index, value) {
            if (value.dataset.district_id == districts || value.dataset.district != undefined) {
                value.removeAttribute('disabled')
            }

        })
    }

});