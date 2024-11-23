<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->

<head>
    <title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular & Laravel by
        Keenthemes</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ url('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        body,
        html {
            font-family: 'Prompt', sans-serif !important;
        }
.card .card-body {
    padding: 0.5rem 2.25rem;
}
        .seat-zones {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        input[type="radio"] {
            display: none;
        }

        .zone-label {
            padding-top: 10px;
            display: inline-block;
            width: 75px;
            height: 75px;
            background-color: #ffffff;
            color: #000000;
            border: 2px solid #cccccc;
            border-radius: 8px;
            line-height: 50px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, border-color 0.3s;
            margin-top: 10px
        }

        input[type="radio"]:checked+.zone-label {
            background-color: #0080d2;
            color: #ffffff;
            border-color: #0080d2;
        }

        .card {
            border-radius: 25px
        }

        .form-control-solid {
            border-radius: 25px
        }

        .form-control {
            padding: 1.2rem 1rem;
        }

        @media (min-width: 992px) {
            .w-lg-650px {
                width: 480px !important;
            }
        }
        .bgi-size-cover {
    background-size: auto;
}

        .bottom-buttons {
    position: fixed;
    bottom: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    background-color: transparent; /* ให้พื้นหลังโปร่งใส */
    padding: 0px;
}

        .bottom-buttons button {
            flex: none;
            margin: 0px;
            padding: 15px;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            border: none;
            cursor: pointer;
            min-width: 450px
        }

        .btn-register {
            background: linear-gradient(90deg, #00a7eb, #005dbc);
        }

        .btn-seat-map {
            background: #001f54;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">

    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>
            body {
                background-image: url('img/background.png');
                background-size: cover;
            }

            [data-theme="dark"] body {
                background-image: url('img/background.png');
                background-size: cover;
            }
        </style>
        <!--end::Page bg image-->
        <!--begin::Authentication - Signup Welcome Message -->
        <div class="d-flex flex-column flex-center flex-column-fluid">
            <!--begin::Content-->

            <div> <img src="{{ url('img/logo.png') }}"  style="height: 75px; margin-top: 60px"> </div>
            <div class="d-flex flex-column flex-center p-10">
                <!--begin::Wrapper-->
                <div class="card card-flush w-lg-650px py-5" style="background-color: #a3d4eac9; ">
                    <div class="card-body  " style="padding-top: 10px; padding-bottom: 0px;">


                        <!--begin::Alert-->

                        <form id="registrationForm" class="form"  method="POST" action="{{ url('register') }}">
                            @csrf
                            <div class="fv-row mb-7">
                                <label class="fs-2 fw-semibold form-label " style="padding-left: 15px">
                                    <span>ชื่อ-นามสกุล</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="name"
                                    placeholder="ชื่อ-นามสกุล" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="fs-2 fw-semibold form-label " style="padding-left: 15px">
                                    <span>เบอร์โทรศัพท์</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="phone_number"
                                    placeholder="เบอร์โทรศัพท์" />
                            </div>

                            <div class="fv-row text-center mb-7">
                                <label class="fs-2 fw-semibold form-label ">
                                    <span>เลือกโซนที่นั่ง</span>
                                </label>
                                <div class="seat-zones">
                                    <label>
                                        <input type="radio" name="seat_zone" value="A" />
                                        <span class="zone-label">A</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="seat_zone" value="B" />
                                        <span class="zone-label">B</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="seat_zone" value="C" />
                                        <span class="zone-label">C</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="seat_zone" value="D" />
                                        <span class="zone-label">D</span>
                                    </label>
                                </div>
                            </div>

                            <div class="fv-row mb-7">
                                <label class="fs-2 fw-semibold form-label " style="padding-left: 15px">
                                    <span>เลขที่นั่ง</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="seat_number"
                                    placeholder="เลขที่นั่ง" />
                            </div>

                            <br>
                            <div class="fv-row ">
                                <img src="{{ url('img/button.png') }}" style="width: 100%; cursor: pointer;"
                                    onclick="submitForm();" />
                            </div>
                        </form>



                    </div>
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Authentication - Signup Welcome Message-->


         <!--begin::Bottom Buttons-->
    <div class="bottom-buttons">
        <button
        style="
            border-top-left-radius: 30px;
            "
        class="btn-register"
        onclick="submitForm();"
        >ลงทะเบียน</button>
        <button
         style="
            border-top-right-radius: 30px;
            "
        class="btn-seat-map"
        onclick="window.location.href='/seat-map';"
        >แผงที่นั่ง</button>
    </div>
    <!--end::Bottom Buttons-->

    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ url('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ url('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--end::Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    function submitForm() {
    const form = document.getElementById('registrationForm');
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
        },
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: 'สำเร็จ!',
                    text: data.message || 'ลงทะเบียนเรียบร้อยแล้ว',
                    icon: 'success',
                    confirmButtonText: 'ตกลง',
                });
                form.reset();
            } else {
                Swal.fire({
                    title: 'เกิดข้อผิดพลาด!',
                    text: data.message || 'ข้อมูลซ้ำ! ไม่สามารถลงทะเบียนได้',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                title: 'เกิดข้อผิดพลาด!',
                text: 'ไม่สามารถส่งข้อมูลได้',
                icon: 'error',
                confirmButtonText: 'ตกลง',
            });
        });
}


</script>
</body>
<!--end::Body-->

</html>
