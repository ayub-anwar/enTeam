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
                    <h3 class="page-title">Attendance</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Attendance</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
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
                                <th>No</th>
                                <th>User Name </th>
                                <th>Punch In</th>
                                <th>Punch Out</th>
                                <th>Role</th>
                                <th>Total Hours</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $key=>$user)
                            <tr>
                                <td class="ids">{{ $key++}}</td>
                                <td class="id">{{ $user->user_name }}</td>
                                <td class="punchin">{{ $user->punch_in }}</td>
                                <td class="punchout">{{ $user->punch_out }}</td>
                                <td class="">{{ $user->status }}</td>
                                <td class="workinghours">{{$user->total_hours}} </td>
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