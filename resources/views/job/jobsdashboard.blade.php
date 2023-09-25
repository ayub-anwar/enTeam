@extends('layouts.master')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Job Dashboard</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Job Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-briefcase"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{$jobs}}</h3>
                            <span>Jobs</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{$jobTypes}}</h3>
                            <span>Job Types</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{$employees}}</h3>
                            <span>Employees</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-clipboard"></i></span>
                        <div class="dash-widget-info">
                            <h3>{{$applicant}}</h3>
                            <span>Applications</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card flex-fill">
                    <div class="card-body">
                        <h3 class="card-title text-center">Jobs</h3>
                        <ul class="list-group">
                            @foreach($jobsdetails as $jobs)
                            <li class="list-group-item list-group-item-action">{{$jobs->job_title}}</li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-table">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Applicants List</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-nowrap custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Job Title</th>
                                        <th>Department</th>
                                        <th>Start Date</th>
                                        <th>Expire Date</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($manageResumes as $key=>$items)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td hidden class="id">{{ $items->id }}</td>
                                        <td hidden class="job_title">{{ $items->job_title }}</td>
                                        <td hidden class="job_location">{{ $items->job_location }}</td>
                                        <td hidden class="no_of_vacancies">{{ $items->no_of_vacancies }}</td>
                                        <td hidden class="experience">{{ $items->experience }}</td>
                                        <td hidden class="salary_from">{{ $items->salary_from }}</td>
                                        <td hidden class="salary_to">{{ $items->salary_to }}</td>
                                        <td hidden class="job_type">{{ $items->job_type }}</td>
                                        <td hidden class="status">{{ $items->status }}</td>
                                        <td hidden class="start_date">{{ $items->start_date }}</td>
                                        <td hidden class="expired_date">{{ $items->expired_date }}</td>
                                        <td hidden class="description">{{ $items->description }}</td>
                                        <td hidden class="age">{{ $items->age }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar"><img alt="" src="{{ URL::to('assets/img/profiles/avatar-02.jpg')}}"></a>
                                                <a href="profile.html">{{ $items->name }} <span>{{ $items->job_title }}</span></a>
                                            </h2>
                                        </td>
                                        <td><a href="job-details.html">{{ $items->job_title }}</a></td>
                                        <td>{{ $items->department }}</td>
                                        <td>{{ date('d F, Y',strtotime($items->start_date)) }}</td>
                                        <td>{{ date('d F, Y',strtotime($items->expired_date)) }}</td>
                                        <td class="text-right">
                                            <a class="btn delete-actionable-emp" href="#" data-toggle="modal" data-target="#delete_record"><i class="la la-trash text-danger" style="font-size:25px;"></i> </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /Delete Holiday Modal -->
    </div>
    <!-- /Page Content -->
</div>
<!-- /Page Wrapper -->
@endsection