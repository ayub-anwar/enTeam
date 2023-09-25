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
                              </tr>
                        </thead>
                        <tbody>
                            @foreach ($employeeDetails as $employee)
                            <tr>
                                <td class="employee_name">{{ $employee['name'] }}</td>
                                <td class="assigned-task">{{ $employee['assignedTasks'] }}</td>
                                <td class="performed-task">{{ $employee['completedTasks'] }}</td>
                                <td class="average-status">{{ number_format($employee['averageStatus'] * 100, 2) }}%</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>