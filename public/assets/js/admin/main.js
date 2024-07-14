// $('.notification-icon').on('click',function() {
//     $.get('/markAsRead', function(data) {
//         $('.notification-count').text(data.unreadCount);
//     });
// });
const isLoggedIn = $('#login-status').data('is-logged-in') === 'true';
isLoggedIn && localStorage.removeItem('nav-link')

$("#v-pills-tab").on("click", "a", function (e) {
    e.stopPropagation();
    localStorage.setItem("nav-link", $(this).closest("a").attr("id"));
});

var navLink = localStorage.getItem("nav-link");

navLink &&
    $("#v-pills-tab a").hasClass("active") &&
    $("#v-pills-tab a").removeClass("active");

navLink && $(`#${navLink}`).addClass("active");

navLink &&
    $("#v-pills-tabContent .tab-pane").hasClass("active") &&
    $("#v-pills-tabContent .tab-pane").hasClass("show") &&
    $("#v-pills-tabContent .tab-pane").removeClass("active show");

navLink &&
    $(`#v-pills-tabContent div[aria-labelledby=${navLink}]`).addClass(
        "active show"
    );
