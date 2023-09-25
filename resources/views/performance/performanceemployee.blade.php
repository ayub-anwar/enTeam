@extends('layouts.master')
@section('content')

<!--Page Wrap-->
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        {!! Toastr::message() !!}
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Performance</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('home')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Performance</li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /Page Header -->
        <!-- Leave Statistics -->
        <div class="row">
            <div class="col-md-4">
                <div class="stats-info">
                    <h6>Total Task Performer</h6>
                    <h4>{{ $totalTaskPerformer }}</h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-info">
                    <h6>Total Assigned Tasks</h6>
                    <h4>{{ $totalAssignedTasks }}</h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-info">
                    <h6>Completed Average Task</h6>
                    <h4>{{ number_format($totalCompletedAverageTask * 100, 2) }}%</h4>
                </div>
            </div>
        </div>

        <!-- /Leave Statistics -->
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th hidden></th>
                                <th>Assigned Tasks</th>
                                <th>Performed Tasks</th>
                                <th>Overall Progress</th>
                                <th>Notify User</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($employeeDetails as $employee)
                            <tr>
                                <td class="employee_name">{{ $employee['name'] }}</td>
                                <td class="assigned-task">{{ $employee['assignedTasks'] }}</td>
                                <td class="performed-task">{{ $employee['completedTasks'] }}</td>
                                <td class="average-status">{{ number_format($employee['averageStatus'] * 100, 2) }}%</td>
                                <td>
                                    <form action="{{ url('form/PerformanceEmployee/notify/'.$employee['name']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary punch-btn" id="getTimeButton">Notify Employee</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>