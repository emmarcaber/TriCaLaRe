<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <link rel="icon" type="text/icon" href="{{ asset('img/logo2.jpg') }}" />
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/datatables.min.css') }}" rel="stylesheet" />

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <img src="{{ asset('img/logo2.jpg') }}" alt="">
                <span class="d-none d-lg-block">TriCaLaRe</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center justify-content-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <i class="bi bi-person-fill"></i>
                        <span class="d-none d-md-block dropdown-toggle ps-2">Administrator</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item active">
                <a class="nav-link {{ $active == 'Dashboard' ? '' : 'collapsed' }}" href="/">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-heading">Entities</li>

            <li class="nav-item">
                <a class="nav-link {{ $active == 'Patients' ? '' : 'collapsed' }}"
                    href="{{ route('patients.index') }}">
                    <i class="bi bi-person-fill"></i>
                    <span>Patients</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ $active == 'Health Workers' ? '' : 'collapsed' }}"
                    href="{{ route('health_workers.index') }}">
                    <i class="bi bi-person-hearts"></i>
                    <span>Health Workers</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ $active == 'Medical Records' ? '' : 'collapsed' }}"
                    href="{{ route('medical_records.index') }}">
                    <i class="bi bi-clipboard2-pulse-fill"></i>
                    <span>Medical Records</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ $active == 'Medical Equipments' ? '' : 'collapsed' }}"
                    href="{{ route('medical_equipments.index') }}">
                    <i class="bi bi-hospital-fill"></i>
                    <span>Medical Equipments</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ $active == 'Medical Supplies' ? '' : 'collapsed' }}"
                    href="{{ route('medical_supplies.index') }}">
                    <i class="bi bi-bandaid-fill"></i>
                    <span>Medical Supplies</span>
                </a>
            </li>

        </ul>
    </aside>

    <main id="main" class="main">
        {{ $slot }}
    </main>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/alpine.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#target_table').DataTable({
                paging: false,
                ordering: true,
                info: false,
            });
        });
    </script>
</body>

</html>
