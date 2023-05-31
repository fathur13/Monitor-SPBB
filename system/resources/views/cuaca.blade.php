@extends('layouts.app')
@section('title', 'Login')
@section('header', 'Data/Cuaca')
@section('judul', 'Cuaca')
@section('conten')
    <style type="text/css">
        #myChart {
            height: 400px;
            width: 100%;
            margin: 0 auto;
        }
    </style>
    {{-- panggil file jquery untuk proses realtime --}}
    <script type="text/javascript" src="{{ url('public/assets/jquery/jquery.min.js') }}"></script>

    {{-- ajax untuk realtime --}}
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#suhu").load("{{ url('bacasuhu') }}");
                $("#kelembapan").load("{{ url('bacakelembapan') }}");
                // $("#cuaca").load("{{ url('bacacuaca') }}");
                $.get("{{ url('bacacuaca') }}", function(data) {
                    // memeriksa apakah sedang hujan atau tidak
                    if (data == "is raining!") {
                        // mengubah gambar menjadi gambar hujan
                        $("#cuaca-img").attr("src",
                            "{{ url('public/assets') }}/images/card/hujan.png");
                        // mengubah teks menjadi "Hujan"
                        $("#cuaca-text").text("is raining!");
                    } else {
                        // mengubah gambar menjadi gambar tidak hujan
                        $("#cuaca-img").attr("src",
                            "{{ url('public/assets') }}/images/card/cerah.png");
                        // mengubah teks menjadi "Tidak hujan"
                        $("#cuaca-text").text("is not raining!");
                    }
                });
            }, 1000);

        })
    </script>

    {{-- chart  --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 wid-100">
                <div class="col-xl-12" style="margin-bottom: 10px">
                    <canvas id="realtime-chart"></canvas>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-sm-12">
                <div class="card overflow-hidden">
                    <div id="bacground-img" class="text-center p-5 overlay-box"
                        style="background-image: url(public/assets/images/card/mendung.jpg);">
                        <img id="cuaca-img" src="{{ url('public/assets') }}/images/hujan.png" width="250"
                            class="img-fluid rounded-circle" alt="">
                        <h3 id="cuaca-text" class="mt-3 mb-0 text-white"></h3>
                    </div>
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
                                        <img src="{{ url('public/assets') }}/images/country/india.png" alt="">
                                        <div class="progress-box mt-0">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-0 c-name">India</p>
                                                <p class="mb-0">50%</p>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary"
                                                    style="width:60%; height:5px; border-radius:4px;" role="progressbar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="country-list">
                                        <img src="{{ url('public/assets') }}/images/country/canada.png" alt="">
                                        <div class="progress-box mt-0">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-0 c-name">Canada</p>
                                                <p class="mb-0">30%</p>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary"
                                                    style="width:30%; height:5px; border-radius:4px;" role="progressbar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="country-list">
                                        <img src="{{ url('public/assets') }}/images/country/russia.png" alt="">
                                        <div class="progress-box mt-0">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-0 c-name">Russia</p>
                                                <p class="mb-0">20%</p>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary"
                                                    style="width:20%; height:5px; border-radius:4px;" role="progressbar">
                                                </div>
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
                                                    style="width:40%; height:5px; border-radius:4px;" role="progressbar">
                                                </div>
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
                                                    style="width:70%; height:5px; border-radius:4px;" role="progressbar">
                                                </div>
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
                                                    style="width:80%; height:5px; border-radius:4px;" role="progressbar">
                                                </div>
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
                                                    style="width:20%; height:5px; border-radius:4px;" role="progressbar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="country-list">
                                        <img src="{{ url('public/assets') }}/images/country/germany.png" alt="">
                                        <div class="progress-box mt-0">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-0 c-name">Germany</p>
                                                <p class="mb-0">80%</p>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary"
                                                    style="width:80%; height:5px; border-radius:4px;" role="progressbar">
                                                </div>
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
                                                    style="width:30%; height:5px; border-radius:4px;" role="progressbar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="country-list">
                                        <img src="{{ url('public/assets') }}/images/country/china.png" alt="">
                                        <div class="progress-box mt-0">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-0 c-name">China</p>
                                                <p class="mb-0">40%</p>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary"
                                                    style="width:40%; height:5px; border-radius:4px;" role="progressbar">
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
    {{-- secript chart per Detik --}}
    <script>
        const ctx = document.getElementById('realtime-chart').getContext('2d');

        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Kelembapan Udara',
                    data: [],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Kelembapan udara'
                        }
                    }
                }
            }
        });

        $(document).ready(function() {
            loadDataDetik();
        });

        setInterval(loadDataDetik, 5000);

        function loadDataDetik() {
            $.ajax({
                url: 'chartkelembapan',
                type: 'GET',
                success: function(data) {
                    // mendapatkan waktu dari data.created_at
                    var waktu = new Date(data.created_at).toLocaleTimeString();

                    // menambahkan waktu ke array label
                    chart.data.labels.push(waktu);

                    if (chart.data.labels.length > 5) {
                        chart.data.labels = chart.data.labels.slice(-5);
                    }

                    // push data kelembapan sinyal
                    chart.data.datasets[0].data.push(data.kelembapan);
                    if (chart.data.datasets[0].data.length > 5) {
                        chart.data.datasets[0].data = chart.data.datasets[0].data.slice(-5);
                    }

                    chart.update();
                }
            });
        }
    </script>


    {{-- script cuaca --}}
    <style>
        #realtime-chart {
            background-color: #fff;
        }
    </style>
@endsection
