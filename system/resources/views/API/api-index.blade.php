@extends('layouts.app')
@section('header', 'api')
@section('conten')
    {{-- <div class="container">
        <h1>Data Suhu</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sensor ID</th>
                    <th>Value</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sensor as $sensor)
                    <tr>
                        <td>{{ $sensor->id }}</td>
                        <td>{{ $sensor->suhu }}</td>
                        <td>{{ $sensor->created_at->format('d/m/Y H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1">
                                <div class="tbl-caption">
                                    <h4 class="heading mb-0">LINK API</h4>
                                    <div>
                                        <a class="btn btn-primary btn-sm" data-bs-toggle="offcanvas"
                                            href="#offcanvasExample" role="button" aria-controls="offcanvasExample">+ Add
                                            Employee</a>
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal1">+ Invite Employee</button>
                                    </div>
                                </div>
                                <table id="empoloyees-tblwrapper" class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">API</th>
                                            <th style="width: 10px">Action</th>
                                            <th style="width: 10px">Value</th>
                                            <th>Link</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span>Sensor Data API</span></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" id="sensor-link">Show
                                                    Link</button>
                                            </td>
                                            <td></td>
                                            <td>
                                                <span>
                                                    <div id="api-url" style="display:none;"></div>
                                                </span>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><span>Get Data by Date Range API</span></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" id="date-range-link">Show
                                                    Link</button>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <input type="date" class="form-control" placeholder="Start Date"
                                                        aria-label="Start Date" aria-describedby="basic-addon2"
                                                        id="start-date-input">
                                                    <span class="input-group-text" id="basic-addon2">to</span>
                                                    <input type="date" class="form-control" placeholder="End Date"
                                                        aria-label="End Date" aria-describedby="basic-addon2"
                                                        id="end-date-input">
                                                </div>
                                            </td>
                                            <td>
                                                <span>
                                                    <div id="date-range-api-url" style="display:none;"></div>
                                                </span>
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td><span>Get Data by ID API</span></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" id="id-link">Show
                                                    Link</button>
                                            </td>
                                            <td>
                                                <span>
                                                    <input type="text" id="id-input" placeholder="Enter ID">
                                                </span>
                                            </td>
                                            <td>
                                                <span>
                                                    <div id="id-api-url" style="display:none;"></div>
                                                </span>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><span>Get Latest Data API</span></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" id="latest-link">Show
                                                    Link</button>
                                            </td>
                                            <td></td>
                                            <td>
                                                <span>
                                                    <div id="latest-api-url" style="display:none;"></div>
                                                </span>
                                            </td>
                                            <td></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <script>
        // Mengambil URL base dari aplikasi
        const baseUrl = "{{ url('/') }}";

        // Ketika tombol ditekan, tampilkan atau sembunyikan link API pada kolom "Link"
        const sensorLinkButton = document.getElementById("sensor-link");
        const apiUrlDiv = document.getElementById("api-url");
        sensorLinkButton.addEventListener("click", function() {
            const apiLink = baseUrl + "/api/sensor";
            const apiUrlHtml = '<a href="' + apiLink + '" target="_blank">' + apiLink + '</a>';
            if (apiUrlDiv.style.display === "block") {
                apiUrlDiv.style.display = "none";
                sensorLinkButton.innerHTML = "Show Link";
            } else {
                apiUrlDiv.innerHTML = apiUrlHtml;
                apiUrlDiv.style.display = "block";
                sensorLinkButton.innerHTML = "Hide Link";
            }
        });

        // Ketika tombol ditekan, tampilkan atau sembunyikan link API pada kolom "Link"
        const idLinkButton = document.getElementById("id-link");
        const idInputField = document.getElementById("id-input");
        const idApiUrlDiv = document.getElementById("id-api-url");

        idLinkButton.addEventListener("click", function() {
            const idValue = idInputField.value;
            const apiLink = baseUrl + "/api/sensor/" + idValue;
            const apiUrlHtml = '<a href="' + apiLink + '" target="_blank">' + apiLink + '</a>';

            if (idApiUrlDiv.style.display === "block") {
                idApiUrlDiv.style.display = "none";
                idLinkButton.innerHTML = "Show Link";
            } else {
                idApiUrlDiv.innerHTML = apiUrlHtml;
                idApiUrlDiv.style.display = "block";
                idLinkButton.innerHTML = "Hide Link";
            }
        });


        const latestLinkButton = document.getElementById("latest-link");
        const latestApiUrlDiv = document.getElementById("latest-api-url");
        latestLinkButton.addEventListener("click", function() {
            const latestApiLink = baseUrl + "/api/sensors/latest";
            const latestApiUrlHtml = '<a href="' + latestApiLink + '" target="_blank">' + latestApiLink + '</a>';
            if (latestApiUrlDiv.style.display === "block") {
                latestApiUrlDiv.style.display = "none";
                latestLinkButton.innerHTML = "Show Link";
            } else {
                latestApiUrlDiv.innerHTML = latestApiUrlHtml;
                latestApiUrlDiv.style.display = "block";
                latestLinkButton.innerHTML = "Hide Link";
            }
        });

        const dateRangeLinkButton = document.getElementById("date-range-link");
        const dateRangeApiUrlDiv = document.getElementById("date-range-api-url");
        const startDateInput = document.getElementById("start-date-input");
        const endDateInput = document.getElementById("end-date-input");

        dateRangeLinkButton.addEventListener("click", function() {
            const startDate = startDateInput.value;
            const endDate = endDateInput.value;
            const dateRangeApiLink = baseUrl + "/api/sensors/date_range?start_date=" + startDate + "&end_date=" +
                endDate;
            const dateRangeApiUrlHtml = '<a href="' + dateRangeApiLink + '" target="_blank">' + dateRangeApiLink +
                '</a>';
            if (dateRangeApiUrlDiv.style.display === "block") {
                dateRangeApiUrlDiv.style.display = "none";
                dateRangeLinkButton.innerHTML = "Show Link";
            } else {
                dateRangeApiUrlDiv.innerHTML = dateRangeApiUrlHtml;
                dateRangeApiUrlDiv.style.display = "block";
                dateRangeLinkButton.innerHTML = "Hide Link";
            }
        });
    </script>
@endsection
