@extends('template.base')
@section('conten')
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li>
                    <h5 class="bc-title">API</h5>
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
                        Employee </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Employee</a></li>
            </ol>
            <a class="text-primary fs-13" data-bs-toggle="offcanvas" href="#offcanvasExample1" role="button"
                aria-controls="offcanvasExample1">+ Add Task</a>
        </div>
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
                                {{-- <table id="empoloyees-tblwrapper" class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">API</th>
                                            <th style="width: 10px">Value 1</th>
                                            <th style="width: 10px">Value 2</th>
                                            <th style="width: 10px"></th>
                                            <th style="width: 10px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span>Store APi</span></td>
                                            <td>
                                                <span>
                                                    <input type="text">suhu
                                                </span>
                                            </td>
                                            <td>
                                                <span>
                                                    <input type="text">kelembapan
                                                </span>
                                            </td>
                                            <td></td>
                                            <td>
                                                <button type="button" class="btn btn-primary"
                                                    id="sensor-link">store</button>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table> --}}
                                <!-- resources/views/sensor.blade.php -->

                                <form id="sensor-form">
                                    <div class="form-group">
                                        <label for="suhu">Suhu:</label>
                                        <input type="text" class="form-control" id="suhu" name="suhu"
                                            placeholder="Masukkan suhu">
                                    </div>
                                    <div class="form-group">
                                        <label for="kelembapan">Kelembapan:</label>
                                        <input type="text" class="form-control" id="kelembapan" name="kelembapan"
                                            placeholder="Masukkan kelembapan">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>

                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        // URL API
                                        const apiUrl = "/api/api-post";

                                        // Kirim permintaan POST untuk menyimpan data sensor
                                        $('#sensor-form').submit(function(e) {
                                            e.preventDefault();
                                            const suhu = $('#suhu').val();
                                            const kelembapan = $('#kelembapan').val();
                                            const requestData = {
                                                suhu: suhu,
                                                kelembapan: kelembapan
                                            };
                                            $.post(apiUrl, requestData, function(data) {
                                                // Tampilkan data sensor yang baru saja disimpan
                                                console.log(data);
                                            });
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
