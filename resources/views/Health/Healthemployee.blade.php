@extends('layouts.master')
@section('content')
<!--Page Wrap-->
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Health Matrix</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('home')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Health Matrix</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End of Page Header -->
        <!-- Page View ---->
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th hidden></th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $employee)
                            <tr>
                                <td>{{$employee->user_id}}</td>
                                <td>{{$employee->appointed_employee}}</td>
                                <td class="appointmant_date">{{$employee->appointed_date}}</td>
                                <td>{{$employee->appointed_time}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--- End of Page Content --->
</div>
<!--- End Page Wrap--->
@section('script')
<script>
    //Search Task |
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
@endsection
@endsection