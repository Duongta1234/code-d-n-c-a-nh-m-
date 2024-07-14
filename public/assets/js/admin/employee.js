$(document).ready(function () {
    let href;
    $(".active-em").on("click", function (e) {
        e.preventDefault();
        if (e.target.matches("a") || e.target.matches("i")) {
            href = e.target.closest("a").getAttribute("href");
            $("#form-active").attr("action", href);
            $("#form-active").submit();
        }
    });

    var table = $(".datatable").DataTable();
    let isRequesting = false;

    // Xử lý sự kiện khi DataTables chuyển trang
    $(".datatable").on("page.dt", function () {
        // Cập nhật giá trị data-delete cho mỗi nút xóa
        var currentPage = table.page.info().page;
        table.page(currentPage).draw("page");

        $(".active-em").on("click", function (e) {
            e.preventDefault();
            if (e.target.matches("a") || e.target.matches("i")) {
                href = e.target.closest("a").getAttribute("href");
                $("#form-active").attr("action", href);
                $("#form-active").submit();
            }
        });

        editEmployee();
    });

    $(".input-delete .continue-btn").on("click", function (e) {
        e.preventDefault();
        let form = e.target.form;
        form.setAttribute("action", href);
        form.submit();
    });

    let update;
    editEmployee();

    function editEmployee() {
        $(".datatable .edit-em").on("click", function (e) {
            e.preventDefault();
            if (isRequesting) {
                // Form đã được gửi hoặc có yêu cầu AJAX đang được xử lý, không cho phép gửi lại form hoặc gửi yêu cầu AJAX mới
                return;
            }
            href = $(this).attr("href");
            update = $(this).data("update");
            $.ajax({
                url: href,
                type: "get",
                success: function (response) {
                    let data = response.data;
                    valueEditEmployee(data);
                },
            });

            $(".input-edit .cancel-btn").on("click", function (e) {
                e.preventDefault();
            });

            $(".input-edit .submit-btn").on("click", function (e) {
                e.preventDefault();
                if (isRequesting) {
                    // Form đã được gửi hoặc có yêu cầu AJAX đang được xử lý, không cho phép gửi lại form hoặc gửi yêu cầu AJAX mới
                    return;
                }
                let formData = new FormData(e.target.form);
                isRequesting = true;
                $.ajax({
                    url: update,
                    type: "post",
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        if (response.errors) {
                            $(".input-edit .error").text("");
                            for (const key in response.errors) {
                                $(".input-edit ." + key + "-error").text(
                                    response.errors[key][0]
                                );
                            }
                        } else if (response.success) {
                            console.log(response.success);
                            let data = response.data;
                            $(
                                'tr[data-tr="' +
                                    data.id +
                                    '"] .text-employee-name'
                            ).text(data.first_name + " " + data.last_name);
                            $(
                                'tr[data-tr="' +
                                    data.id +
                                    '"] .text-employee-email'
                            ).text(data.user.email);
                            $(
                                'tr[data-tr="' +
                                    data.id +
                                    '"] .text-employee-phone_number'
                            ).text(data.phone_number);
                            $(
                                'tr[data-tr="' +
                                    data.id +
                                    '"] .text-employee-position'
                            ).find("span") &&
                                $(
                                    'tr[data-tr="' +
                                        data.id +
                                        '"] .text-employee-position span'
                                ).remove();
                            $(
                                'tr[data-tr="' +
                                    data.id +
                                    '"] .text-employee-position'
                            ).append(
                                `<span class="role-info role-bg-one">${data.role}</span>`
                            );
                            let valueSrc = $(
                                'tr[data-tr="' +
                                    data.id +
                                    '"] .text-employee-image'
                            ).attr("src");

                            let part = valueSrc.split("/");

                            part.pop();

                            part.push(data.image);

                            let result = part.join("/");

                            $(
                                'tr[data-tr="' +
                                    data.id +
                                    '"] .text-employee-image'
                            ).attr("src", result);
                            $("#edit_employee").modal("hide");
                        }
                        isRequesting = false;
                    },
                });
            });
        });

        $("#edit_employee").on("hidden.bs.modal", function () {
            $(".error").text("");
            $(".input-edit .edit-info").val("");
            $('.input-edit input[name="previous_image"]').val("");
            $('.input-edit input[name="behind_image"]').val("");
        });
    }

    // edit image avatar
    changeImageEdit(
        $(".input-edit .edit-info"),
        $(".input-edit .image-avatar")
    );
    //edit previous image
    changeImageEdit(
        $('.input-edit input[name="previous_image"]'),
        $(".input-edit .previous-image")
    );
    // edit behind image
    changeImageEdit(
        $('.input-edit input[name="behind_image"]'),
        $(".input-edit .behind-image")
    );

    function valueEditEmployee(data) {
        console.log(data.origin);
        $('input[name="id"]').val(data.id);
        $('.input-edit input[name="first_name"]').val(data.first_name);
        $('.input-edit input[name="last_name"]').val(data.last_name);
        $('.input-edit input[name="birthday"]').val(data.birthday);
        $('.input-edit select[name="gender"]')
            .val(data.gender)
            .trigger("change.select2");
        $(".input-edit .image-avatar").attr("src", data.image);
        $('.input-edit input[name="phone_number"]').val(data.phone_number);
        $('.input-edit input[name="citizen_identity_card"]').val(
            data.card.citizen_identity_card
        );
        $('.input-edit input[name="place_of_issue"]').val(
            data.card.place_of_issue
        );
        $('.input-edit input[name="issue_date"]').val(data.card.issue_date);
        $(".input-edit .previous-image").attr("src", data.previous_image);
        $(".input-edit .behind-image").attr("src", data.behind_image);
        $('.input-edit select[name="nationality_id"]')
            .val(data.nationality.id)
            .trigger("change.select2");
        $('.input-edit select[name="religion_id"]')
            .val(data.religion.id)
            .trigger("change.select2");
        $('.input-edit select[name="ethnicity_id"]')
            .val(data.ethnicity.id)
            .trigger("change.select2");
        $('.input-edit select[name="level"]')
            .val(data.level.id)
            .trigger("change.select2");
        $('.input-edit select[name="position"]')
            .val(data.position.id)
            .trigger("change.select2");

        // if($('.input-edit select[name="user_id"]').val()){
        // $('.input-edit select[name="user_id"]').val(data.user.id).trigger('change.select2');

        // }
        let origin = data.origin.split("-");

        //value origin province
        $('.input-edit select[name="origin_province"]')
            .val(origin[3])
            .trigger("change.select2");

        // xử lý province_id
        let selectedProvince = $(
            '.input-edit select[name="origin_province"] option:selected'
        );
        console.log(selectedProvince);
        let selectDistrict = $('.input-edit select[name="origin_district"]');
        disabledDistrict(selectedProvince, selectDistrict);

        //value origin district
        $('.input-edit select[name="origin_district"]')
            .val(origin[2])
            .trigger("change.select2");

        // xử lý district cha
        let selectedDistrict = $(
            '.input-edit select[name="origin_district"] option:selected'
        );
        let selectWard = $('.input-edit select[name="origin_ward"]');
        disabledWard(selectedDistrict, selectWard);

        //value origin ward and detail
        $('.input-edit select[name="origin_ward"]')
            .val(origin[1])
            .trigger("change.select2");
        $('.input-edit input[name="origin_detail"]').val(origin[0]);

        // xử lý thanh đổi của origin province và district
        $('.input-edit select[name="origin_province"]').on(
            "change",
            function (e) {
                let selectProvince = $(
                    '.input-edit select[name="origin_province"] option:selected'
                );
                let selectDistrict = $(
                    '.input-edit select[name="origin_district"]'
                );
                selectDistrict.val("").trigger("change.select2");
                disabledDistrict(selectProvince, selectDistrict);
            }
        );

        $('.input-edit select[name="origin_district"]').on(
            "change",
            function (e) {
                let selectDistrict = $(
                    '.input-edit select[name="origin_district"] option:selected'
                );
                let selectWard = $('.input-edit select[name="origin_ward"]');
                selectWard.val("").trigger("change.select2");
                disabledWard(selectDistrict, selectWard);
            }
        );

        let address = data.address.split("-");

        // value address province
        $('.input-edit select[name="address_province"]')
            .val(address[3])
            .trigger("change.select2");

        // xử lý address province_id
        let selectedProvinceAddress = $(
            '.input-edit select[name="address_province"] option:selected'
        );
        let selectDistrictAddress = $(
            '.input-edit select[name="address_district"]'
        );
        disabledDistrict(selectedProvinceAddress, selectDistrictAddress);

        // Value address district
        $('.input-edit select[name="address_district"]')
            .val(address[2])
            .trigger("change.select2");

        // xử lý address district_id
        let selectedDistrictAddress = $(
            '.input-edit select[name="address_district"] option:selected'
        );
        let selectWardAddress = $('.input-edit select[name="address_ward"]');
        disabledWard(selectedDistrictAddress, selectWardAddress);

        //value address ward and detail
        $('.input-edit select[name="address_ward"]')
            .val(address[1])
            .trigger("change.select2");
        $('.input-edit input[name="address_detail"]').val(address[0]);

        // // xử lý thanh đổi của address province và district
        $('.input-edit select[name="address_province"]').on(
            "change",
            function (e) {
                let selectProvince = $(
                    '.input-edit select[name="address_province"] option:selected'
                );
                let selectDistrict = $(
                    '.input-edit select[name="address_district"]'
                );
                selectDistrict.val("").trigger("change.select2");
                disabledDistrict(selectProvince, selectDistrict);
            }
        );

        $('.input-edit select[name="address_district"]').on(
            "change",
            function (e) {
                let selectDistrict = $(
                    '.input-edit select[name="address_district"] option:selected'
                );
                let selectWard = $('.input-edit select[name="address_ward"]');
                selectWard.val("").trigger("change.select2");
                disabledWard(selectDistrict, selectWard);
            }
        );
        if (data.users) {
            $.each(data.users, function (index, user) {
                if (data.user.id == user.id) {
                    $('.input-edit select[name="user_id"]').append(
                        `<option value="${user.id}" selected>${user.email}</option>`
                    );
                } else {
                    $('.input-edit select[name="user_id"]').append(
                        `<option value="${user.id}">${user.email}</option>`
                    );
                }
            });
        }
    }

    function changeImageEdit(input, image) {
        input.on("change", function (e) {
            var file = e.target.files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    image.attr("src", e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    }

    function disabledDistrict(selectProvince, selectDistrict) {
        let provinces = selectProvince[0].dataset.province;

        let districts = selectDistrict[0].options;

        $.each(districts, function (index, value) {
            if (!value.hasAttribute("disabled")) {
                value.setAttribute("disabled", "disabled");
            }
        });

        $.each(districts, function (index, value) {
            if (
                value.dataset.province_id == provinces ||
                value.dataset.province != undefined
            ) {
                // console.log([value.value])
                value.removeAttribute("disabled");
            }
        });
    }

    function disabledWard(selectDistrict, selectWard) {
        let districts = selectDistrict[0].dataset.district;
        let wards = selectWard[0].options;

        $.each(wards, function (index, value) {
            if (!value.hasAttribute("disabled")) {
                value.setAttribute("disabled", "disabled");
            }
        });

        $.each(wards, function (index, value) {
            if (
                value.dataset.district_id == districts ||
                value.dataset.district != undefined
            ) {
                value.removeAttribute("disabled");
            }
        });
    }
});
