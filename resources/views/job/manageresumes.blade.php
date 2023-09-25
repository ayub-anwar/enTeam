@extends('layouts.master')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-12">
                    <h3 class="page-title">Manage Resumes</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage Resumes</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        {!! Toastr::message() !!}
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Job Title</th>
                                <th>Department</th>
                                <th>Start Date</th>
                                <th>Expire Date</th>

                                <th class="text-right">Actions</th>
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

                                        <a>{{ $items->name }} <span>{{ $items->job_title }}</span></a>
                                    </h2>
                                </td>
                                <td>{{ $items->job_title }}</td>
                                <td>{{ $items->department }}</td>
                                <td>{{ date('d F, Y',strtotime($items->start_date)) }}</td>
                                <td>{{ date('d F, Y',strtotime($items->expired_date)) }}</td>


                                <td class="text-center">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item delete_resume" data-toggle="modal" data-target="#delete_resume"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Delete Job Modal -->
    <div class="modal custom-modal fade" id="delete_resume" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Resume</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <form action="{{ route('delete/Resume') }}" method="POST">
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
    <!-- /Delete Job Modal -->

</div>
<!-- /Page Wrapper -->
@section('script')
{{-- delete model --}}
<script>
    $(document).on('click', '.delete_resume', function() {
        var _this = $(this).parents('tr');
        $('.e_id').val(_this.find('.id').text());
    });
</script>
@endsection
@endsection