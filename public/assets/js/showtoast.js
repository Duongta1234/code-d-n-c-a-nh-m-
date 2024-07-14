import "./bootstrap-show-toast.js"

// document.getElementById("button-show-danger").addEventListener("load", function () {
//     bootstrap.showToast({
//         header: "Alert",
//         body: "Red Alert!",
//         toastClass: "text-bg-danger"
//     })
// })

let error = document.querySelector('.error-danger');
if (error !== null) {
    var errorValue = error.textContent;
    if (errorValue.trim() === "") {
        console.log("Không có giá trị");
    } else {
        bootstrap.showToast({
            header: "Có lỗi",
            body: errorValue,
            toastClass: "text-bg-danger"
        })
    }
}

let success = document.querySelector('.error-success');
if (success !== null) {
    var successValue = success.textContent;
    if (successValue.trim() === "") {
        console.log("Không có giá trị");
    } else {
        bootstrap.showToast({
            header: "Thành công",
            body: successValue,
            toastClass: "text-bg-success"
        })
    }
}
