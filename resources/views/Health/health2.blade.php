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
<!-- Search Filter -->

<div class="row filter-row">
            <div class="col-md-12">
                <div class="form-group form-focus">
                    <input type="text" id="searchinput" class="form-control floating" name="appointmant_date">
                    <label class="focus-label">Search Field</label>
                </div>
            </div>
            
        </div>
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
                                <th>Appointment Reason</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $employee)
                            <tr>
                                <td>{{$employee->user_id}}</td>
                                <td>{{$employee->appointed_employee}}</td>
                                <td class="appointmant_date">{{$employee->appointed_date}}</td>
                                <td>{{$employee->appointed_time}}</td>
                                <td>{{$employee->appointed_reason}}</td>
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
        <!-- Delete Health Modal -->
        <div class="modal custom-modal fade" id="delete_record" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Record</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <form action="{{ route('deleteHealthView',['id' => $employee->user_id , 'date' => $employee->appointed_date])}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" class="e_id" value="">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary continue-btn submit-btn">Delete</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Health Modal -->
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