@extends('layouts.master')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12">
                    <h3>Welcome, {{ Auth::user()->name }}!</h3>
                    <p>{{ $todayDate }}</p>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <section class="dash-section">
                    <h1 class="dash-sec-title">Today</h1>
                    <div class="dash-sec-content">
                        <div class="dash-info-list">
                            <a href="#" class="dash-card text-danger">
                                <div class="dash-card-container">
                                    <div class="dash-card-icon">
                                        <i class="fa fa-hourglass-o"></i>
                                    </div>
                                    <div class="dash-card-content">
                                        <p>Richard Miles is off sick today</p>
                                    </div>
                                    <div class="dash-card-avatars">
                                        <div class="e-avatar"><img src="{{ URL::to('assets/img/profiles/avatar-09.jpg') }}" alt=""></div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="dash-info-list">
                            <a href="#" class="dash-card">
                                <div class="dash-card-container">
                                    <div class="dash-card-icon">
                                        <i class="fa fa-suitcase"></i>
                                    </div>
                                    <div class="dash-card-content">
                                        <p>You are away today</p>
                                    </div>
                                    <div class="dash-card-avatars">
                                        <div class="e-avatar"><img src="{{ URL::to('assets/img/profiles/avatar-02.jpg') }}" alt=""></div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="dash-info-list">
                            <a href="#" class="dash-card">
                                <div class="dash-card-container">
                                    <div class="dash-card-icon">
                                        <i class="fa fa-building-o"></i>
                                    </div>
                                    <div class="dash-card-content">
                                        <p>You are working from home today</p>
                                    </div>
                                    <div class="dash-card-avatars">
                                        <div class="e-avatar"><img src="{{ URL::to('assets/img/profiles/avatar-02.jpg') }}" alt=""></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </section>

                <section class="dash-section">
                    <h1 class="dash-sec-title">Tomorrow</h1>
                    <div class="dash-sec-content">
                        <div class="dash-info-list">
                            <div class="dash-card">
                                <div class="dash-card-container">
                                    <div class="dash-card-icon">
                                        <i class="fa fa-suitcase"></i>
                                    </div>
                                    <div class="dash-card-content">
                                        <p>2 people will be away tomorrow</p>
                                    </div>
                                    <div class="dash-card-avatars">
                                        <a href="#" class="e-avatar"><img src="{{ URL::to('assets/img/profiles/avatar-04.jpg') }}" alt=""></a>
                                        <a href="#" class="e-avatar"><img src="{{ URL::to('assets/img/profiles/avatar-08.jpg') }}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="dash-sidebar">
                    <section>
                        <h5 class="dash-title">Projects</h5>
                        <div class="card">
                            <div class="card-body">
                                <div class="time-list">
                                    <div class="dash-stats-list">
                                        <h4>{{$taskcompleted}}</h4>
                                        <p>Completed Tasks</p>
                                    </div>
                                    <div class="dash-stats-list">
                                        <h4>{{$taskpending}}</h4>
                                        <p>Pending Tasks</p>
                                    </div>
                                </div>
                                <div class="request-btn">
                                    <div class="dash-stats-list">
                                        <h4>{{$tasks}}</h4>
                                        <p>Total Tasks</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section>
                        <h5 class="dash-title">Your Leaves</h5>
                        <div class="card">
                            <div class="card-body">
                                <div class="time-list">
                                    <div class="dash-stats-list">
                                        <h4>{{$leaves}}</h4>
                                        <p>Leave Taken</p>
                                    </div>
                                    <div class="dash-stats-list">
                                        <h4>{{$total}}</h4>
                                        <p>Remaining</p>
                                    </div>
                                </div>
                                <div class="request-btn">
                                    <a class="btn btn-primary" href="{{route('form/leavesemployee/new')}}">Apply Leave</a>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section>
                        <h5 class="dash-title">Upcoming Holiday</h5>
                        <div class="card">
                            <div class="card-body text-center">
                                <table class="table table-striped custom-table datatable">
                                    <tbody>
                                        @foreach($holidays as $holiday)
                                        <tr>
                                            <td>
                                                <h4 class="holiday-title mb-0">{{$holiday->name_holiday}}
                                            </td>
                                            <td>
                                                <h4 class="holiday-title mb-0">{{$holiday->date_holiday}}</h4>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->


<!-- /Page Wrapper -->
@endsection