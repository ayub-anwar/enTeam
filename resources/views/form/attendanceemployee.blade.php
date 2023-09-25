<?php

use App\Models\AttendanceEmployee;

$a = Auth::user();
?>
@extends('layouts.master')
@section('content')

{{-- message --}}
{!! Toastr::message() !!}
<!-- Page Wrapper -->
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Attendance</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Attendance</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="card punch-status">
                    <div class="card-body">
                        <h5 class="card-title">Timesheet <small class="text-muted"> {{$date}} </small></h5>
                        <div class="punch-det">
                            <h5>Punch In at</h5>
                            <div class="text-muted">{{$day}}</div>

                        </div>

                        <div class="punch-hours" id="clock"> </div>

                        <div class="d-flex justify-content-around">
                            <div class="punch-btn-section">
                                <form action="{{ route('attendance123') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary punch-btn">Punch In</button>
                                </form>
                            </div>

                            <div class="punch-btn-section">
                                <form action="{{ route('attendance1234') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary punch-btn">Punch Out</button>
                                </form>
                            </div>
                        </div>

                        <div class="statistics">
                            <div class="row">
                                <div class="col-md-12 col-12 text-center">
                                    <div class="stats-box">
                                        <p>Today Spend Hours</p>
                                        @foreach($timediffer as $employee)
                                        <h6>{{$employee->total_hours}} </h6>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- Search Filter -->
        <div class="row filter-row">
            <div class="col-md-8">
                <div class="form-group form-focus">
                    <input type="text" id="searchinput" class="form-control floating" name="task_name">
                    <label class="focus-label">Search Field</label>
                </div>
            </div>
            <div class=" col-md-4">
                <button type="sumit" class="btn btn-success btn-block"> Search </button>
            </div>
        </div>
        <!-- /Search Filter -->

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name </th>
                                <th>Punch In</th>
                                <th>Punch Out</th>
                                <th>Today Spending Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendance as $employee)
                            <tr>
                                <td>{{$employee->date}}</td>
                                <td>{{$employee->name}}</td>
                                <td> {{$employee->punch_in}} </td>
                                <td> {{$employee->punch_out}} </td>
                                <td> {{$employee->total_hours}} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

</div>
<!-- /Page Content -->


</div>
<!-- /Page Wrapper -->


@section('script')


<script>
    // JavaScript code to display the current date and day
    document.getElementById('currentDate').textContent = new Date().toLocaleDateString();
    document.getElementById('currentDay').textContent = new Date().toLocaleString('en-us', {
        weekday: 'long'
    });
</script>

<script>
    document.getElementById("getTimeButton").addEventListener("click", function() {
        var currentTime = new Date();
        var currentTimeString = currentTime.toLocaleTimeString(); // Format the time as a string
        document.getElementById("currentTime").textContent = "Current Time: " + currentTimeString;
    });
</script>
<script>
    $('#searchinput').keydown(function() {
        var SearchTask = $(this).val().toLowerCase();
        $('.table tbody tr').each(function() {
            var rowText = $(this).text().toLowerCase();
            if (SearchTask === '') {
                $(this).show();
            }
            if (rowText.indexOf(SearchTask) === -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });
</script>
<script>
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12 || 12;
        // Format the time with leading zeros
        var formattedTime = `${hours}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')} ${ampm}`;

        // Update the clock's content
        document.getElementById('clock').textContent = formattedTime;
    }

    // Initial call to update the clock
    updateClock();

    // Update the clock every second
    setInterval(updateClock, 1000);
</script>
@endsection
@endsection