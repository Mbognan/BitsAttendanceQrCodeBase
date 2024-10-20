<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Scan Qr Code</title>


    <!-- Fontfaces CSS-->
    <link href="{{ asset('asset/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('asset/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('asset/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('asset/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('asset/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('asset/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('asset/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('asset/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('asset/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('asset/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('asset/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('asset/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    <!-- Main    CSS-->
    <link href="{{ asset('asset/css/theme.css') }}" rel="stylesheet" media="all">


</head>

<body class="animsition">
    {{-- <style>
        #toast {
            visibility: hidden;
            min-width: 250px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 17px;
        }

        #toast.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2s;
            animation: fadein 0.5s, fadeout 0.5s 2s;
        }

        @-webkit-keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }
    </style>
     --}}
    <style>
        #toast {
            visibility: hidden;
            min-width: 250px;
            background-color: #28a745;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            top: 30px;
            /* Changed from bottom to top */
            left: 50%;
            transform: translateX(-50%);
            font-size: 17px;
        }

        #toast.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2s;
            animation: fadein 0.5s, fadeout 0.5s 2s;
        }

        @-webkit-keyframes fadein {
            from {
                top: 0;
                opacity: 0;
            }

            /* Changed from bottom to top */
            to {
                top: 30px;
                opacity: 1;
            }

            /* Changed from bottom to top */
        }

        @keyframes fadein {
            from {
                top: 0;
                opacity: 0;
            }

            /* Changed from bottom to top */
            to {
                top: 30px;
                opacity: 1;
            }

            /* Changed from bottom to top */
        }

        @-webkit-keyframes fadeout {
            from {
                top: 30px;
                opacity: 1;
            }

            /* Changed from bottom to top */
            to {
                top: 0;
                opacity: 0;
            }

            /* Changed from bottom to top */
        }

        @keyframes fadeout {
            from {
                top: 30px;
                opacity: 1;
            }

            /* Changed from bottom to top */
            to {
                top: 0;
                opacity: 0;
            }

            /* Changed from bottom to top */
        }
    </style>


    <div class="page-wrapper">
        <div id="toast"></div>
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="#">
                            <h1 class="text-white">QR CODE SCANNER BITS </h1>
                        </a>
                    </div>
                    <div class="header__navbar">

                    </div>
                    <div class="header__tool">
                        <div class="header-button-item ">
                            <a class="text-white" href="{{ route('officer.dashboard') }}"> <i class="zmdi "> Return to
                                    Dashboard</i> </a>

                        </div>

                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="{{ asset('asset/images/icon/avatar-01.jpg') }}" alt="John Doe" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <h1 class="text-white">BITS QR SCANNER</h1>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            {{-- <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav> --}}
        </header>

        <!-- END HEADER MOBILE -->
        <div class="page-content--bgf7" style="background-color: #e5e5e5">

            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="#">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">QR CODE SCANNER</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>




            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <h1 class="title-4">QR CODE SCANNER
                                <span>Welcome BITS Officer</span>
                            </h1> --}}
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>




            <section class="statistic-chart">
                <div class="container">
                    <div class="row justify-content-center align-items-center" style="min-height: 100px;">
                        <div class="col-md-12 text-center mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="event" id="event" class="form-control">
                                        <option>Please select Event</option>
                                        <option value="1">COTE Week</option>
                                        <option value="4">Valentines Day</option>
                                        <option value="3">Siglakas 2023-2024</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="day" id="day" class="form-control">
                                        <option>Please select Day</option>
                                        <option value="1">Day 1</option>
                                        <option value="2">Day 2</option>
                                        <option value="3">Day 3</option>
                                        <option value="4">Day 4</option>
                                        <option value="5">Day 5</option>
                                        <option value="6">Day 6</option>
                                        <option value="7">Day 7</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="session" id="session" class="form-control">
                                        <option>Please select Session</option>
                                        <option value="Morning">Morning</option>
                                        <option value="Afternoon">Afternoon</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="status" id="status" class="form-control">
                                        <option>Please select Status</option>
                                        <option value="login">Log In</option>
                                        <option value="log-out">Log Out</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <h3 id="eventTitle" class="title-5 m-b-35 ">
                                <strong class="text-primary">Attendance Log</strong><br>
                                <span class="event-detail">Event: None</span> <br>
                                <span class="day-detail">None</span> |
                                <span class="session-detail">Session: None</span> |
                                <span class="status-detail">Status: None</span>
                            </h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <!-- CHART-->
                            <div class="statistic-chart-1">
                                <div id="reader" style="width: 100%; height: auto; margin: 0 auto;"></div>
                            </div>
                            <!-- END CHART-->
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <!-- TOP CAMPAIGN-->
                            <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                <div class="au-card-title"
                                    style="background-image: url('{{ asset('asset/images/bg-title-01.jpg') }}');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3 id="currentDate">>
                                        <i class="zmdi zmdi-account-calendar"></i>26 April, 2018
                                    </h3>
                                    <button class="au-btn-plus">
                                        <i class="zmdi zmdi-plus"></i>
                                    </button>
                                </div>
                                <div class="au-task js-list-load">
                                    <div class="au-task-list js-scrollbar3" id="scan-history">


                                    </div>
                                    <div class="au-task__footer">
                                        <button class="au-btn au-btn-load js-load-btn">load more</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" name="property">
                                    <option selected="selected">All Properties</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--light rs-select2--sm">
                                <select class="js-select2" name="time">
                                    <option selected="selected">Today</option>
                                    <option value="">3 Days</option>
                                    <option value="">1 Week</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <button class="au-btn-filter">
                                <i class="zmdi zmdi-filter-list"></i>filters</button>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-body table-responsive">
                            {{ $dataTable->table() }}
                      </div>

                    </div>
            </section>




            </section>


            <section class="statistic-chart">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



        </div>


    </div>


    <!-- Jquery JS-->
    <script src="{{ asset('asset/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('asset/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('asset/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('asset/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('asset/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

     <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
     <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.js"></script>
    {{--<script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.tailwindcss.js"></script> --}}
    <script>
        const eventDropdown = document.getElementById('event');
        const dayDropdown = document.getElementById('day');
        const sessionDropdown = document.getElementById('session');
        const statusDropdown = document.getElementById('status');
        const eventTitle = document.getElementById('eventTitle');

        function updateTitle() {
            const selectedEvent = eventDropdown.value !== "0" ? eventDropdown.value : "None";
            const selectedDay = dayDropdown.value !== "0" ? `Day ${dayDropdown.value}` : "None";
            const selectedSession = sessionDropdown.value !== "0" ? sessionDropdown.value : "None";
            const selectedStatus = statusDropdown.value !== "0" ? statusDropdown.value : "None";

            eventTitle.innerHTML = `<strong class="text-primary">Attendance Log</strong><br>
            <span class="event-detail">Event: ${selectedEvent}</span> <br>
            <span class="day-detail">Day: ${selectedDay}</span> |
            <span class="session-detail">Session: ${selectedSession}</span> |
            <span class="status-detail">Status: ${selectedStatus}</span>`;

        }
        eventDropdown.addEventListener('change', updateTitle);
        dayDropdown.addEventListener('change', updateTitle);
        sessionDropdown.addEventListener('change', updateTitle);
        statusDropdown.addEventListener('change', updateTitle);

        let lastScanTime = 0;
        const debounceDelay = 1000;

        function formatDate(date) {
            const options = {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            };
            return date.toLocaleDateString('en-GB', options);
        }

        const today = new Date();

        document.getElementById('currentDate').innerText = formatDate(today);

        let scanHistory = [];

        function updateScanHistory(student) {
            // Get the current time
            let currentDateTime = new Date();
            let currentTime = currentDateTime.toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            }); // Format as HH:MM AM/PM


            let newEntry = {
                name: `${student.first_name} ${student.middle_initial} ${student.last_name}`,
                time: currentTime,
                status: `${student.status}`

            };

            scanHistory.unshift(newEntry);


            if (scanHistory.length > 10) {
                scanHistory.pop();
            }


            renderScanHistory();
        }

        function renderScanHistory() {
            const historyContainer = document.getElementById('scan-history');
            historyContainer.innerHTML = ''; // Clear the existing entries

            scanHistory.forEach((entry) => {
                const taskItem = document.createElement('div');
                taskItem.classList.add('au-task__item', 'au-task__item--danger');
                taskItem.innerHTML = `
            <div class="au-task__item-inner">
                <h5 class="task">
                    <a href="#">${entry.name}, (BITS Member)</a>
                </h5>
                <span class="time">${entry.status} Time ${entry.time}</span>
            </div>
        `;
                historyContainer.appendChild(taskItem);
            });
        }

        function showToast(message) {
            let toast = document.getElementById("toast");
            toast.innerText = message;
            toast.className = "show";

            setTimeout(function() {
                toast.className = toast.className.replace("show", "");
            }, 2500);
        }

        function onScanSuccess(decodedText, decodedResult) {
            const currentTime = new Date().getTime();

            const selectedEvent = eventDropdown.value !== "0" ? eventDropdown.value : "";
            const selectedDay = dayDropdown.value !== "0" ? `Day ${dayDropdown.value}` : "";
            const selectedSession = sessionDropdown.value !== "0" ? sessionDropdown.value : "";
            const selectedStatus = statusDropdown.value !== "0" ? statusDropdown.value : "";

            if (currentTime - lastScanTime > debounceDelay) {
                lastScanTime = currentTime;

                console.log(`Code matched = ${decodedText}`, decodedResult);
                let studentId = decodedText;
                let currentDateTime = new Date();
                let currentTimeFormatted = currentDateTime.toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                });
                let currentDate = currentDateTime.toLocaleDateString();

                fetch('/officer/found-student', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            id: studentId,
                            event: selectedEvent,
                            day: selectedDay,
                            sessionDay: selectedSession,
                            status: selectedStatus,
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            if (data.login) {
                                if (data.validation) {
                                    showToast(
                                        `Student : ${data.student.first_name} ${data.student.middle_initial} ${data.student.last_name} Already Logged In!`,
                                        true);
                                } else {
                                    updateScanHistory(data.student);
                                    let attendanceTable = $('#attendance-table').DataTable();
                                    if (attendanceTable) {
                                            attendanceTable.ajax.reload(null, false); // Reload data without resetting pagination
                                        }
                                    showToast(
                                        `Student Log In: ${data.student.first_name} ${data.student.middle_initial} ${data.student.last_name}\nTime: ${currentTimeFormatted}, Date: ${currentDate}`,
                                        true);

                                }
                            } else {
                                if (data.validation) {
                                    showToast(
                                        `Student : ${data.student.first_name} ${data.student.middle_initial} ${data.student.last_name} Already Logged Out!`,
                                        true);
                                } else {
                                    updateScanHistory(data.student);
                                    let attendanceTable = $('#attendance-table').DataTable();
                                    if (attendanceTable) {
                                            attendanceTable.ajax.reload(null, false); // Reload data without resetting pagination
                                        }
                                    showToast(
                                        `Student Logged Out: ${data.student.first_name} ${data.student.middle_initial} ${data.student.last_name}\nTime: ${currentTimeFormatted}, Date: ${currentDate}`,
                                        true);
                                }
                            }


                        } else {
                            showToast('Student not found');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('There was an error that occurred');
                    });
            }
        }

        function onScanFailure(error) {
            console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            },
            false
        );

        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
</body>



</html>
<!-- end document-->
