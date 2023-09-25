@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome {{ Session::get('name') }}!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <div class="dash-widget-info">
                            <h3>EnTeam</h3> <span>FYP</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{$admin}}</h3> <span>Admins</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{$task}}</h3> <span>Tasks</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body"> <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{$user}}</h3> <span>Employees</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- message --}}
        {!! Toastr::message() !!}
        <!-- Users and Admins -->
        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Users</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                    <tr>
                                        <td>{{$employee->name}} <br><span>{{$employee->position}}</span></td>
                                        <td>{{$employee->email}}</td>
                                        <td>
                                            <div class="dropdown action-label">
                                                @if ($employee->status=='Active')
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-success"></i>
                                                    <span class="statuss">{{ $employee->status }}</span>
                                                </a>
                                                @elseif ($employee->status=='Inactive')
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-info"></i>
                                                    <span class="statuss">{{ $employee->status }}</span>
                                                </a>
                                                @elseif ($employee->status=='Disable')
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-danger"></i>
                                                    <span class="statuss">{{ $employee->status }}</span>
                                                </a>
                                                @elseif ($employee->status=='')
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-dark"></i>
                                                    <span class="statuss">N/A</span>
                                                </a>
                                                @endif

                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-dot-circle-o text-success"></i> Active
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-dot-circle-o text-warning"></i> Inactive
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-dot-circle-o text-danger"></i> Disable
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer"> <a href="{{ route('all/employee/card') }}">View all Employees</a> </div>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Admins</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Name </th>
                                        <th>Email</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($admins as $admin)
                                    <tr>
                                        <td>{{$admin->name}} <br><span>{{$admin->position}}</span></td>
                                        <td>{{$admin->email}}</td>
                                        <td>
                                            <div class="dropdown action-label">
                                                @if ($admin->status=='Active')
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-success"></i>
                                                    <span class="statuss">{{ $admin->status }}</span>
                                                </a>
                                                @elseif ($admin->status=='Inactive')
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-info"></i>
                                                    <span class="statuss">{{ $admin->status }}</span>
                                                </a>
                                                @elseif ($admin->status=='Disable')
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-danger"></i>
                                                    <span class="statuss">{{ $admin->status }}</span>
                                                </a>
                                                @elseif ($admin->status=='')
                                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-dot-circle-o text-dark"></i>
                                                    <span class="statuss">N/A</span>
                                                </a>
                                                @endif

                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-dot-circle-o text-success"></i> Active
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-dot-circle-o text-warning"></i> Inactive
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-dot-circle-o text-danger"></i> Disable
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a>Admins</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Users and Admins -->

        <!-- Statistics Widget -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <h4 class="card-title">Leaves Statistics</h4>
                        <div class="statistics">
                            <div class="row">
                                <div class="col-md-6 col-6 text-center">
                                    <div class="stats-box mb-4">
                                        <p>Total Leaves</p>
                                        <h3>{{$totalLeaves}}</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6 text-center">
                                    <div class="stats-box mb-4">
                                        <p>Today Leaves</p>
                                        <h3>{{$todayLeaves}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <?php $competedTask = $task - $pendingTask ?>
                            <p><i class="fa fa-dot-circle-o text-purple mr-2"></i>Total Leaves <span class="float-right">{{$totalLeaves}}</span></p>
                            <p><i class="fa fa-dot-circle-o text-success mr-2"></i>Approved Leaves <span class="float-right">{{$approvedLeaves}}</span></p>
                            <p><i class="fa fa-dot-circle-o text-warning mr-2"></i>Pending Leaves <span class="float-right">{{$pendingLeaves}}</span></p>
                            <p><i class="fa fa-dot-circle-o text-danger  mr-2"></i>Declined Leaves <span class="float-right">{{$declineLeaves}}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <h4 class="card-title">Task Statistics</h4>
                        <div class="statistics">
                            <div class="row">
                                <div class="col-md-6 col-6 text-center">
                                    <div class="stats-box mb-4">
                                        <p>Total Tasks</p>
                                        <h3>{{$task}}</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6 text-center">
                                    <div class="stats-box mb-4">
                                        <p>Pending Task</p>
                                        <h3>{{$pendingTask}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <?php $competedTask = $task - $pendingTask ?>
                            <p><i class="fa fa-dot-circle-o text-purple mr-2"></i>Total Tasks <span class="float-right">{{$task}}</span></p>
                            <p><i class="fa fa-dot-circle-o text-success  mr-2"></i>Completed Tasks <span class="float-right">{{$competedTask}}</span></p>
                            <p><i class="fa fa-dot-circle-o text-danger mr-2"></i>Pending Tasks <span class="float-right">{{$pendingTask}}</span></p>
                            <p><i class="fa fa-dot-circle-o text-warning mr-2"></i>Inprogress Tasks <span class="float-right">{{$pendingTask}}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <h4 class="card-title">Today Absent <span class="badge bg-inverse-danger ml-2">{{$todayLeaves}}</span></h4>
                        <div class="leave-info-box">
                            @foreach($leaveList as $list)
                            <div class="stats-info ">
                                <div class="col-6">
                                    <h5>{{$list->name}}</h5>
                                </div>
                                <div class="row align-items-center mt-3">
                                    <div class="col-6 ">
                                        <h6 class="mb-0">{{$list->from_date}}</h6> <span class="text-sm text-muted">Leave Date</span>
                                    </div>
                                    <div class="col-6 text-right"> <span class="badge bg-inverse-danger">{{$list->leave_status}}</span> </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="load-more text-center"> <a class="text-dark" href="{{route('form/leaves/new')}}">Load More</a> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Statistics Widget -->

        <!-- Users and Admins -->
        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Departments</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($department as $departments)
                                    <tr>
                                        <td>{{$departments->id}} </td>
                                        <td>{{$departments->department}}</td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer"> <a href="{{route('form/departments/page') }}">View all Deparrtments</a> </div>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Holidays</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th># </th>
                                        <th>Name</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($holiday as $holidays)
                                    <tr>
                                        <td>{{$holidays->id}}</td>
                                        <td>{{$holidays->name_holiday}}</td>
                                        <td>{{$holidays->date_holiday}}</td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer"> <a href="{{route('form/holidays/new') }}">View all Holidays</a> </div>
                </div>
            </div>
        </div>
        <!-- End of Users and Admins -->

    </div>
    <!-- /Page Content -->
</div>
@section('style')
<style>
    .progress {
        width: 80%;
        margin: 50px auto;
        border: 1px solid #ccc;
        height: 20px;
    }

    .progress-bar {
        width: 0;
        height: 100%;
        background-color: #4caf50;
        transition: width 0.3s;
    }
</style>
@endsection
@endsection