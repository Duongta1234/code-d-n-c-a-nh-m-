<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Phát Đạt') }}</title>
    <title>Phát Đạt</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="{{asset('assets/css/home/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/home/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/home/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/home/style.css')}}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Phát Đạt') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

            </div>


        </div>
        <div>

        </div>
    </nav>


    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>

<script src="{{asset('assets/js/js-app/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/js-app/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/js-app/wow.min.js')}}"></script>
<script src="{{asset('assets/js/js-app/main.js')}}"></script>
<script src="{{asset('assets/js/js-app/owl.carousel.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script>
    $(window).on('load', function () {
        $('.owl-carousel2').owlCarousel({
            loop: true,
            center: true,
            autoplay: 1000,
            smartSpeed: 400,
            lazyLoad: false,
            autoWidth: true,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    })
</script>
<script>
    function showApplication() {
        $('.form-job-detail').slideUp("slow");
        $('.form-application').slideDown("slow");
        setTimeout(function () {
            $('.jobName')[0].scrollIntoView({block: "center"});
        }, 500)
    }

    function closeApplication() {
        $('.form-job-detail').slideDown("slow");
        $('.form-application').slideUp("slow");
        setTimeout(function () {
            $('.jobName')[0].scrollIntoView({block: "center"});
        }, 500)
    }

    $(document).ready(function () {
        let date = $('#dateTime').text().split('-')
        let dateFormated = date[2] + '/' + date[1] + '/' + date[0]
        $('#dateTime').html(dateFormated)
        $("#formCV").submit(function () {
            $("#btnSubmit").attr("disabled", true);
            return true;
        });
    })
    $('#getApplication').on('click', function () {
        showApplication();
    })
    $('#close-application-btn').on('click', function () {
        closeApplication()
    })
    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
        const dropZoneElement = inputElement.closest(".drop-zone");

        dropZoneElement.addEventListener("click", (e) => {
            inputElement.click();
        });

        inputElement.addEventListener("change", (e) => {
            if (inputElement.files.length) {
                updateThumbnail(dropZoneElement, inputElement.files[0]);
            }
        });

        dropZoneElement.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropZoneElement.classList.add("drop-zone--over");
        });

        ["dragleave", "dragend"].forEach((type) => {
            dropZoneElement.addEventListener(type, (e) => {
                dropZoneElement.classList.remove("drop-zone--over");
            });
        });

        dropZoneElement.addEventListener("drop", (e) => {
            e.preventDefault();

            if (e.dataTransfer.files.length) {
                inputElement.files = e.dataTransfer.files;
                updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
            }

            dropZoneElement.classList.remove("drop-zone--over");
        });
    });

    function updateThumbnail(dropZoneElement, file) {
        let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

        // First time - remove the prompt
        if (dropZoneElement.querySelector(".drop-zone__prompt")) {
            dropZoneElement.querySelector(".drop-zone__prompt").remove();
        }

        // First time - there is no thumbnail element, so lets create it
        if (!thumbnailElement) {
            thumbnailElement = document.createElement("div");
            thumbnailElement.classList.add("drop-zone__thumb");
            dropZoneElement.appendChild(thumbnailElement);
        }

        thumbnailElement.dataset.label = file.name;
        if (file.type.startsWith("image/")) {
            const reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = () => {
                thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
            };
        } else {
            thumbnailElement.style.backgroundImage = null;
        }
    }

    $(document).ready(function () {
        $('#popup').click(function () {
            window.location.href = 'https://career.adamosoft.com'
        })
    })

    function onlyNumb(evt) {
        let theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        let regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>

</html>
