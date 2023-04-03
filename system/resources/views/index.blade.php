@extends('template.base')
@section('conten')
    {{-- panggil file jquery untuk proses realtime --}}
    <script type="text/javascript" src="{{ url('public/assets/jquery/jquery.min.js') }}"></script>

    {{-- ajax untuk realtime --}}
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#suhu").load("{{ url('bacasuhu') }}");
                $("#kelembapan").load("{{ url('bacakelembapan') }}");
            }, 1000); //1000ms = 1s
        })
        // $(document).ready(function() {
        //     setInterval(function() {
        //         // Check if data has been loaded in the past 10 seconds
        //         var lastLoadTime = new Date(localStorage.getItem('lastLoadTime') || null);
        //         var currentTime = new Date();
        //         if (!lastLoadTime || (currentTime - lastLoadTime > 10000)) {
        //             // Display offline message
        //             $("#suhu").text("Offline");
        //             $("#kelembapan").text("Offline");
        //         } else {
        //             // Load data from server and update last load time
        //             $("#suhu").load("{{ url('bacasuhu') }}");
        //             $("#kelembapan").load("{{ url('bacakelembapan') }}");
        //             localStorage.setItem('lastLoadTime', currentTime);
        //         }
        //     }, 1000); //1000ms = 1s
        // });
    </script>

    {{-- chart  --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <style type="text/css">
        #myChart {
            height: 400px;
            margin: 0 auto;
        }
    </style>

    <!--**********************************
             Content body start
            ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li>
                    <h5 class="bc-title">Dashboard</h5>
                </li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z"
                                stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
            </ol>
            <a class="text-primary fs-13" data-bs-toggle="offcanvas" href="#offcanvasExample1" role="button"
                aria-controls="offcanvasExample1">+ Add Task</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 wid-100">
                    <div class="row">
                        {{-- <div class="col-md-12 card bg-danger">
                            <div class="card-body">
                                <div class="students d-flex align-items-center justify-content-between flex-wrap">
                                    <div>
                                        <h5>Status KID</h5>
                                        <h1
                                            style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: #ffffff;
                                            ">
                                            Tenggelam</h1>
                                        <span>Perkiraan air naik sampai ke level</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-12 card" id="kid-status-card">
                            <div class="card-body">
                                <div class="students d-flex align-items-center justify-content-between flex-wrap">
                                    <div>
                                        <h5>Status KID</h5>
                                        <h1
                                            style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                                            <span id="kid-status">-</span>
                                        </h1>
                                    </div>
                                    <div class="text-right">
                                        <h6 style="font-weight:bold;color:#fff">Ketinggian Air</h6>
                                        <h2 style="font-weight:bold; font-size:3em; color:#fff"><span
                                                id="ketinggian-air"></span>cm</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div id="myChart" style="margin-bottom: 10px"></div>
                            {{-- <div class="card overflow-hidden">
                                    <div class="card-header border-0 pb-0 flex-wrap">
                                        <h4 class="heading mb-0">Projects Overview</h4>
                                        <ul class="nav nav-pills mix-chart-tab" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" data-series="week" id="pills-week-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-week" type="button"
                                                    role="tab" aria-selected="true">Week</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" data-series="month" id="pills-month-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-month"
                                                    type="button" role="tab"
                                                    aria-selected="false">Month</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" data-series="year" id="pills-year-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-year" type="button"
                                                    role="tab" aria-selected="false">Year</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" data-series="all" id="pills-all-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-all" type="button"
                                                    role="tab" aria-selected="false">All</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body  p-0">
                                        <div id="overiewChart"></div>
                                        <div class="ttl-project">
                                            <div class="pr-data">
                                                <h5>12,721</h5>
                                                <span>Number of Projects</span>
                                            </div>
                                            <div class="pr-data">
                                                <h5 class="text-primary">721</h5>
                                                <span>Active Projects</span>
                                            </div>
                                            <div class="pr-data">
                                                <h5>$2,50,523</h5>
                                                <span>Revenue</span>
                                            </div>
                                            <div class="pr-data">
                                                <h5 class="text-success">12,275h</h5>
                                                <span>Working Hours</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 up-shd">
                    <div class="card">
                        <div class="card-header pb-0 border-0">
                            <h4 class="heading mb-0">Monitoring Suhu dan Ketinggian Air</h4>
                            <select class="default-select status-select normal-select">
                                <option value="Today">Today</option>
                                <option value="Week">Week</option>
                                <option value="Month">Month</option>
                            </select>
                        </div>
                        <div class="card-body">
                            <div class="row" style="max-width: 100%; margin: 0 auto; margin-top:80px">
                                <div
                                    style="border-radius: 50%; margin: 0 auto; width: 300px; height: 300px; border: 6px solid #ff0000; color: #000000; text-align: center; font: 32px Arial, sans-serif; display: flex; flex-direction: column; justify-content: center;">
                                    <img src="{{ url('public/assets') }}/icons/termometer.png" alt="Thermometer Icon"
                                        style="width: 80px; height: 80px; margin: 20px auto 0; display: block; width:30px;height:30px;">
                                    <h4 style="margin: 0; font-size: 24px; font-weight: bold; color: #ff0000;">Suhu</h4>
                                    <div
                                        style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 100%;">
                                        <span id="suhu" style="font-size: 72px; font-weight: bold;"></span>
                                        <span style="font-size: 24px; font-weight: bold;">℃</span>
                                    </div>
                                </div>
                                <div
                                    style="border-radius: 50%; margin: 0 auto; width: 300px; height: 300px; border: 6px solid #ff0000; color: #000000; text-align: center; font: 32px Arial, sans-serif; display: flex; flex-direction: column; justify-content: center;">
                                    <img src="{{ url('public/assets') }}/icons/humidity.png" alt="Humidity Icon"
                                        style="width: 80px; height: 80px; margin: 20px auto 0; display: block; width:30px;height:30px;">
                                    <h4 style="margin: 0; font-size: 24px; font-weight: bold; color: #ff0000;">Kelembapan
                                    </h4>
                                    <div
                                        style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 100%;">
                                        <span id="kelembapan" style="font-size: 72px; font-weight: bold;"></span>
                                        <span style="font-size: 24px; font-weight: bold;">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- <div id="projectChart" class="project-chart"></div> --}}
                        {{-- <div class="project-date">
                                <div class="project-media">
                                        <p class="mb-0">
                                            <svg class="me-2" width="12" height="13" viewBox="0 0 12 13"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect y="0.5" width="12" height="12" rx="3"
                                                    fill="var(--primary)" />
                                            </svg>
                                            Completed Projects
                                        </p>
                                        <span>125 Projects</span>
                                    </div>
                                    <div class="project-media">
                                        <p class="mb-0">
                                            <svg class="me-2" width="12" height="13" viewBox="0 0 12 13"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect y="0.5" width="12" height="12" rx="3"
                                                    fill="#3AC977" />
                                            </svg>
                                            Progress Projects
                                        </p>
                                        <span>125 Projects</span>
                                    </div>
                                    <div class="project-media">
                                        <p class="mb-0">
                                            <svg class="me-2" width="12" height="13" viewBox="0 0 12 13"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect y="0.5" width="12" height="12" rx="3"
                                                    fill="#FF5E5E" />
                                            </svg>
                                            Cancelled
                                        </p>
                                        <span>125 Projects</span>
                                    </div>
                                    <div class="project-media">
                                        <p class="mb-0">
                                            <svg class="me-2" width="12" height="13"
                                                viewBox="0 0 12 13" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect y="0.5" width="12" height="12"
                                                    rx="3" fill="#FF9F00" />
                                            </svg>
                                            Yet to Start
                                        </p>
                                        <span>125 Projects</span>
                                    </div>
                            </div> --}}
                        {{-- </div> --}}
                    </div>
                </div>
                <div class="col-xl-6 active-p">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects">
                                <div class="tbl-caption">
                                    <h4 class="heading mb-0">Active Projects</h4>
                                </div>
                                <table id="projects-tbl" class="table">
                                    <thead>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Project Lead</th>
                                            <th>Progress</th>
                                            <th>Assignee</th>
                                            <th>Status</th>
                                            <th>Due Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Batman</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic1.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <p class="mb-0 ms-2">Liam Risher</p>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="tbl-progress-box">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary"
                                                            style="width:53%; height:5px; border-radius:4px;"
                                                            role="progressbar"></div>
                                                    </div>
                                                    <span class="text-primary">53%</span>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="avatar-list avatar-list-stacked">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic1.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic555.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic666.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <span class="badge badge-primary light border-0">Inprogress</span>
                                            </td>
                                            <td>
                                                <span>06 Sep 2021</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Bender Project</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic2.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <p class="mb-0 ms-2">Oliver Noah</p>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="tbl-progress-box">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger"
                                                            style="width:30%; height:5px; border-radius:4px;"
                                                            role="progressbar"></div>
                                                    </div>
                                                    <span class="text-danger">30%</span>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="avatar-list avatar-list-stacked">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic1.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic555.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic666.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <span class="badge badge-danger light border-0">Pending</span>
                                            </td>
                                            <td>
                                                <span>06 Sep 2021</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Canary</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic888.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <p class="mb-0 ms-2">Elijah James</p>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="tbl-progress-box">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success"
                                                            style="width:40%; height:5px; border-radius:4px;"
                                                            role="progressbar"></div>
                                                    </div>
                                                    <span class="text-success">40%</span>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="avatar-list avatar-list-stacked">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic666.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic555.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic1.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic666.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <span class="badge badge-success light border-0">Completed</span>
                                            </td>
                                            <td>
                                                <span>06 Sep 2021</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Casanova</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic1.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <p class="mb-0 ms-2">William Risher</p>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="tbl-progress-box">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary"
                                                            style="width:53%; height:5px; border-radius:4px;"
                                                            role="progressbar"></div>
                                                    </div>
                                                    <span class="text-primary">53%</span>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="avatar-list avatar-list-stacked">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic1.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic555.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic666.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <span class="badge badge-primary light border-0">Inprogress</span>
                                            </td>
                                            <td>
                                                <span>06 Sep 2021</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Bigfish</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic777.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <p class="mb-0 ms-2">Donald Benjamin</p>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="tbl-progress-box">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger"
                                                            style="width:30%; height:5px; border-radius:4px;"
                                                            role="progressbar"></div>
                                                    </div>
                                                    <span class="text-danger">30%</span>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="avatar-list avatar-list-stacked">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic1.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic777.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic666.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <span class="badge badge-danger light border-0">Inprogress</span>
                                            </td>
                                            <td>
                                                <span>06 Sep 2021</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Matadors</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic888.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <p class="mb-0 ms-2">Liam Risher</p>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="tbl-progress-box">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary"
                                                            style="width:53%; height:5px; border-radius:4px;"
                                                            role="progressbar"></div>
                                                    </div>
                                                    <span class="text-primary">53%</span>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="avatar-list avatar-list-stacked">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic777.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic555.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic666.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <span class="badge badge-primary light border-0">Inprogress</span>
                                            </td>
                                            <td>
                                                <span>06 Sep 2021</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mercury</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic2.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <p class="mb-0 ms-2">Oliver Noah</p>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="tbl-progress-box">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger"
                                                            style="width:30%; height:5px; border-radius:4px;"
                                                            role="progressbar"></div>
                                                    </div>
                                                    <span class="text-danger">30%</span>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="avatar-list avatar-list-stacked">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic1.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic777.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic666.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <span class="badge badge-danger light border-0">Pending</span>
                                            </td>
                                            <td>
                                                <span>06 Sep 2021</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Whistler</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic999.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <p class="mb-0 ms-2">Elijah James</p>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="tbl-progress-box">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success"
                                                            style="width:40%; height:5px; border-radius:4px;"
                                                            role="progressbar"></div>
                                                    </div>
                                                    <span class="text-success">40%</span>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="avatar-list avatar-list-stacked">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic666.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic555.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic1.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic666.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <span class="badge badge-success light border-0">Completed</span>
                                            </td>
                                            <td>
                                                <span>06 Sep 2021</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Time Projects</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic2.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <p class="mb-0 ms-2">Lucas</p>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="tbl-progress-box">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger"
                                                            style="width:33%; height:5px; border-radius:4px;"
                                                            role="progressbar"></div>
                                                    </div>
                                                    <span class="text-primary">33%</span>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="avatar-list avatar-list-stacked">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic1.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic555.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic999.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <span class="badge badge-primary light border-0">Inprogress</span>
                                            </td>
                                            <td>
                                                <span>06 Sep 2021</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fast Ball</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic1.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <p class="mb-0 ms-2">William Risher</p>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="tbl-progress-box">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary"
                                                            style="width:53%; height:5px; border-radius:4px;"
                                                            role="progressbar"></div>
                                                    </div>
                                                    <span class="text-primary">53%</span>
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <div class="avatar-list avatar-list-stacked">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic1.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic555.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                    <img src="{{ url('public/assets') }}/images/contacts/pic999.jpg"
                                                        class="avatar rounded-circle" alt="">
                                                </div>
                                            </td>
                                            <td class="pe-0">
                                                <span class="badge badge-primary light border-0">Inprogress</span>
                                            </td>
                                            <td>
                                                <span>06 Sep 2021</span>
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 flag">
                    <div class="card overflow-hidden">
                        <div class="card-header border-0">
                            <h4 class="heading mb-0">Active users</h4>
                        </div>
                        <div class="card-body pe-0">
                            <div class="row">
                                <div class="col-xl-8 active-map-main">
                                    <div id="world-map" class="active-map"></div>
                                </div>
                                <div class="col-xl-4 active-country dz-scroll">
                                    <div class="">
                                        <div class="country-list">
                                            <img src="{{ url('public/assets') }}/images/country/india.png"
                                                alt="">
                                            <div class="progress-box mt-0">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0 c-name">India</p>
                                                    <p class="mb-0">50%</p>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary"
                                                        style="width:60%; height:5px; border-radius:4px;"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="country-list">
                                            <img src="{{ url('public/assets') }}/images/country/canada.png"
                                                alt="">
                                            <div class="progress-box mt-0">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0 c-name">Canada</p>
                                                    <p class="mb-0">30%</p>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary"
                                                        style="width:30%; height:5px; border-radius:4px;"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="country-list">
                                            <img src="{{ url('public/assets') }}/images/country/russia.png"
                                                alt="">
                                            <div class="progress-box mt-0">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0 c-name">Russia</p>
                                                    <p class="mb-0">20%</p>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary"
                                                        style="width:20%; height:5px; border-radius:4px;"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="country-list">
                                            <img src="{{ url('public/assets') }}/images/country/uk.png" alt="">
                                            <div class="progress-box mt-0">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0 c-name">United Kingdom</p>
                                                    <p class="mb-0">40%</p>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary"
                                                        style="width:40%; height:5px; border-radius:4px;"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="country-list">
                                            <img src="{{ url('public/assets') }}/images/country/aus.png" alt="">
                                            <div class="progress-box mt-0">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0 c-name">Australia</p>
                                                    <p class="mb-0">60%</p>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary"
                                                        style="width:70%; height:5px; border-radius:4px;"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="country-list">
                                            <img src="{{ url('public/assets') }}/images/country/usa.png" alt="">
                                            <div class="progress-box mt-0">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0 c-name">United States</p>
                                                    <p class="mb-0">20%</p>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary"
                                                        style="width:80%; height:5px; border-radius:4px;"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="country-list">
                                            <img src="{{ url('public/assets') }}/images/country/pak.png" alt="">
                                            <div class="progress-box mt-0">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0 c-name">Pakistan</p>
                                                    <p class="mb-0">20%</p>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary"
                                                        style="width:20%; height:5px; border-radius:4px;"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="country-list">
                                            <img src="{{ url('public/assets') }}/images/country/germany.png"
                                                alt="">
                                            <div class="progress-box mt-0">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0 c-name">Germany</p>
                                                    <p class="mb-0">80%</p>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary"
                                                        style="width:80%; height:5px; border-radius:4px;"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="country-list">
                                            <img src="{{ url('public/assets') }}/images/country/uae.png" alt="">
                                            <div class="progress-box mt-0">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0 c-name">UAE</p>
                                                    <p class="mb-0">30%</p>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary"
                                                        style="width:30%; height:5px; border-radius:4px;"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="country-list">
                                            <img src="{{ url('public/assets') }}/images/country/china.png"
                                                alt="">
                                            <div class="progress-box mt-0">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0 c-name">China</p>
                                                    <p class="mb-0">40%</p>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary"
                                                        style="width:40%; height:5px; border-radius:4px;"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--**********************************
                                                                                     Content body end
                                                                        ***********************************-->
    <div class="offcanvas offcanvas-end customeoff" tabindex="-1" id="offcanvasExample">
        <div class="offcanvas-header">
            <h5 class="modal-title" id="#gridSystemModal">Add Employee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <div>
                    <label>Profile Picture</label>
                    <div class="dz-default dlab-message upload-img mb-3">
                        <form action="#" class="dropzone">
                            <svg width="41" height="40" viewBox="0 0 41 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M20.5 20V35" stroke="#DADADA" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M34.4833 30.6501C36.1088 29.7638 37.393 28.3615 38.1331 26.6644C38.8731 24.9673 39.027 23.0721 38.5703 21.2779C38.1136 19.4836 37.0724 17.8926 35.6111 16.7558C34.1497 15.619 32.3514 15.0013 30.4999 15.0001H28.3999C27.8955 13.0488 26.9552 11.2373 25.6498 9.70171C24.3445 8.16614 22.708 6.94647 20.8634 6.1344C19.0189 5.32233 17.0142 4.93899 15.0001 5.01319C12.9861 5.0874 11.015 5.61722 9.23523 6.56283C7.45541 7.50844 5.91312 8.84523 4.7243 10.4727C3.53549 12.1002 2.73108 13.9759 2.37157 15.959C2.01205 17.9421 2.10678 19.9809 2.64862 21.9222C3.19047 23.8634 4.16534 25.6565 5.49994 27.1667"
                                    stroke="#DADADA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="fallback">
                                <input name="file" type="file" multiple>

                            </div>
                        </form>
                    </div>
                </div>
                <form>
                    <div class="row">
                        <div class="col-xl-6 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Employee ID <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label for="exampleFormControlInput2" class="form-label">Employee Name<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label for="exampleFormControlInput3" class="form-label">Employee Email<span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label for="exampleFormControlInput4" class="form-label">Password<span
                                    class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="exampleFormControlInput4" placeholder="">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Designation<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Please select</option>
                                <option value="html">Software Engineer</option>
                                <option value="css">Civil Engineer</option>
                                <option value="javascript">Web Doveloper</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Department<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Please select</option>
                                <option value="html">Software</option>
                                <option value="css">Doit</option>
                                <option value="javascript">Designing</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Country<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Please select</option>
                                <option value="html">Ind</option>
                                <option value="css">USA</option>
                                <option value="javascript">UK</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label for="exampleFormControlInput88" class="form-label">Mobile<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="exampleFormControlInput88" placeholder="">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Gender<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Please select</option>
                                <option value="html">Male</option>
                                <option value="css">Female</option>
                                <option value="javascript">Other</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label for="exampleFormControlInput99" class="form-label">Joining Date<span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="exampleFormControlInput99">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label for="exampleFormControlInput8" class="form-label">Date of Birth<span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="exampleFormControlInput8">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label for="exampleFormControlInput10" class="form-label">Reporting To<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleFormControlInput10" placeholder="">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Language Select<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Please select</option>
                                <option value="html">English</option>
                                <option value="css">Hindi</option>
                                <option value="javascript">Canada</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">User Role<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Please select</option>
                                <option value="html">Parmanent</option>
                                <option value="css">Parttime</option>
                                <option value="javascript">Per Hours</option>
                            </select>
                        </div>
                        <div class="col-xl-12 mb-3">
                            <label class="form-label">Address<span class="text-danger">*</span></label>
                            <textarea rows="2" class="form-control"></textarea>
                        </div>
                        <div class="col-xl-12 mb-3">
                            <label class="form-label">About<span class="text-danger">*</span></label>
                            <textarea rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary me-1">Help Desk</button>
                        <button class="btn btn-danger light ms-1">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end customeoff" tabindex="-1" id="offcanvasExample1">
        <div class="offcanvas-header">
            <h5 class="modal-title" id="#gridSystemModal1">Add New Task</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <form>
                    <div class="row">
                        <div class="col-xl-6 mb-3">
                            <label for="exampleFormControlInputfirst" class="form-label">Title<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleFormControlInputfirst"
                                placeholder="Title">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Project<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Project</option>
                                <option value="html">Salesmate</option>
                                <option value="css">ActiveCampaign</option>
                                <option value="javascript">Insightly</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label for="exampleFormControlInputthree" class="form-label">Start Date<span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="exampleFormControlInputthree">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label for="exampleFormControlInputfour" class="form-label">End Date<span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="exampleFormControlInputfour">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Estimated Hour<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="09:30"><span
                                    class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Status<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Status</option>
                                <option value="html">In Progess</option>
                                <option value="css">Pending</option>
                                <option value="javascript">Completed</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">priority<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">priority</option>
                                <option value="html">Hight</option>
                                <option value="css">Medium</option>
                                <option value="javascript">Low</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Category<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Category</option>
                                <option value="html">Designing</option>
                                <option value="css">Development</option>
                                <option value="javascript">react developer</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Permission<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Permission</option>
                                <option value="html">Public</option>
                                <option value="css">Private</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Deadline add<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Deadline</option>
                                <option value="html">Yes</option>
                                <option value="css">No</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Assigned to<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Assigned</option>
                                <option value="html">Bernard</option>
                                <option value="css">Sergey Brin</option>
                                <option value="javascript"> Larry Ellison</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Responsible Person<span class="text-danger">*</span></label>
                            <input name='tagify' class="form-control py-0 ps-0" value='James, Harry'>

                        </div>
                        <div class="col-xl-12 mb-3">
                            <label class="form-label">Description<span class="text-danger">*</span></label>
                            <textarea rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-xl-12 mb-3">
                            <label class="form-label">Summary<span class="text-danger">*</span></label>
                            <textarea rows="3" class="form-control"></textarea>
                        </div>

                    </div>
                    <div>
                        <button class="btn btn-primary me-1">Help Desk</button>
                        <button class="btn btn-danger light ms-1">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel1">Invite Employee</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <label class="form-label">Email ID<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" placeholder="hello@gmail.com">
                            <label class="form-label mt-3">Employment date<span class="text-danger">*</span></label>
                            <input class="form-control" type="date">
                            <div class="row">
                                <div class="col-xl-6">
                                    <label class="form-label mt-3">First Name<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <label class="form-label mt-3">Last Name<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Surname">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 invite">
                                <label class="form-label">Send invitation email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control " placeholder="+ invite">
                            </div>


                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- secript chart --}}
    <script>
        var dailyData = <?php echo json_encode($dailyData); ?>;
        var categories = dailyData.map(function(d) {
            return d.date;
        });
        Highcharts.chart('myChart', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Grafik Sensor Per Hari'
            },
            xAxis: {
                categories: categories,
                tickmarkPlacement: 'on',
                title: {
                    enabled: false
                }
            },
            yAxis: {
                title: {
                    text: 'Value'
                }
            },
            tooltip: {
                split: true,
                valueSuffix: ''
            },
            plotOptions: {
                line: {
                    marker: {
                        enabled: true,
                        symbol: 'circle',
                        radius: 4,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [{
                name: 'Suhu',
                data: dailyData.map(function(d) {
                    return parseFloat(d.suhu_avg.toFixed(2))
                }),
                color: '#FFC300',
                fillColor: {
                    linearGradient: [0, 0, 0, 300],
                    stops: [
                        [0, 'rgba(255, 195, 0, 0.2)'],
                        [1, 'rgba(255, 195, 0, 0)']
                    ]
                }
            }, {
                name: 'Kelembapan',
                data: dailyData.map(function(d) {
                    return parseFloat(d.kelembapan_avg.toFixed(2))
                }),
                color: '#3498DB',
                fillColor: {
                    linearGradient: [0, 0, 0, 300],
                    stops: [
                        [0, 'rgba(52, 152, 219, 0.2)'],
                        [1, 'rgba(52, 152, 219, 0)']
                    ]
                }
            }],
            legend: {
                align: 'right',
                verticalAlign: 'middle',
                layout: 'vertical'
            }
        });
    </script>

    // scrip warning
    <script>
        $(document).ready(function() {
            // Membuat permintaan setiap 1 detik untuk mendapatkan status KID terbaru dari server
            setInterval(function() {
                $.ajax({
                    url: "{{ route('get-kid-status') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        // Mengubah nilai data ketinggian air dengan mengurangi 200
                        data.ketinggian_air -= 200;

                        // Jika nilai ketinggian air di atas 200 cm, ubah menjadi 0
                        if (data.ketinggian_air > 0) {
                            data.ketinggian_air = 0;
                        }

                        // Menampilkan status KID dan ketinggian air terbaru pada halaman web
                        $('#kid-status').html(data.status);
                        $('#kid-status-card').removeClass(
                            'bg-danger bg-warning bg-info bg-success').addClass('bg-' + data
                            .color);
                        $('#ketinggian-air').html(Math.abs(data.ketinggian_air).toFixed(2));
                        
                        // Menambahkan border warna merah pada kartu jika status KID adalah "Tenggelam"
                        if (data.status === "Tenggelam") {
                            $('#kid-status-card').addClass('border-danger');
                        } else {
                            $('#kid-status-card').removeClass('border-danger');
                        }
                    }
                });
            }, 1000);
        });
    </script>
@endsection