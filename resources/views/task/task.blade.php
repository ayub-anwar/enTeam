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
                    <h3 class="page-title">Tasks</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('home')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Task</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a class="btn add-btn" data-toggle="modal" data-target="#add_task"><i class="fa fa-plus"></i> Add Task</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <!-- Task Statistics -->
        <div class="row">
            <div class="col-md-4">
                <div class="stats-info">
                    <h6>Total Tasks</h6>
                    <h4>{{$totalTask}}</h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-info">
                    <h6>Completed Tasks</h6>
                    <h4>{{$completeTask}}</h4>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stats-info">
                    <h6>Pending Tasks</h6>
                    <h4>{{$pendingTask}}</h4>
                </div>
            </div>
        </div>
        <!-- End Task Statistics -->
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
        <!-- Search Filter -->

        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>Task Name</th>
                                <th>User Name</th>
                                <th hidden>Departement</th>
                                <th>Task Description</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($task as $detail)
                            <tr>
                                <td hidden class="id">{{ $detail->id }}</td>
                                <td class="task_name">{{$detail->task_name}}</td>
                                <td class="employee_name">{{$detail->employee_name }}</td>
                                <td class="task_description">{{$detail->task_description}}</td>
                                <td hidden class="department">{{$detail->department}}</td>
                                <td class="starting_date">{{$detail->starting_date}}</td>
                                <td class="ending_date">{{$detail->ending_date}}</td>
                                <td hidden class="worth_of_task">{{$detail->worth_of_task}}</td>
                                <td class="text-center">
                                    <div class="dropdown action-label">
                                        <?php
                                        if ($detail->status == 'Incompleted') {
                                            $design = "fa fa-dot-circle-o text-danger";
                                        } else if ($detail->status == 'Complete') {
                                            $design = "fa fa-dot-circle-o text-success";
                                        } else {
                                            $design = "fa fa-dot-circle-o text-purple";
                                        }
                                        ?>
                                        <a class="btn btn-white btn-sm btn-rounded" href="#" data-toggle="dropdown" aria-expanded="false">
                                            <i class="{{$design}}"></i> {{$detail->status}}
                                        </a>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item edit_task" data-toggle="modal" data-target="#edit_task"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item taskDelete" href="#" data-toggle="modal" data-id="{{$detail->id}}" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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

    <!-- Add Task Modal -->
    <div id="add_task" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('task/save') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Task Name</label>
                                    <input class="form-control" type="text" id="task_name" name="task_name" value="{{ old('task_name') }}" placeholder="Enter Task Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Employee Name</label>
                                    <select class="select form-control employee-dropdown" id="employee_name" name="employee_name">
                                        <option selected disabled>-- Select --</option>
                                        @foreach ($employee as $key=>$user )
                                        <option value="{{ $user->name }}" data-department={{ $user->department}}> {{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label class="col-form-label">Department</label>
                                <input class="form-control department-input" type="department" id="department" name="department" placeholder="Auto Department" readonly>
                            </div>

                            <div class="col-sm-6">
                                <label>Worth of Task</label>
                                <select class="select select2s-hidden-accessible form-control" id="worth_of_task" name="worth_of_task">
                                    <option selected disabled> --Select --</option>
                                    <option>Low</option>
                                    <option>Medium</option>
                                    <option>Hight</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>From <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control " id="date" name="starting_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>To</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker " id="ending_date" name="ending_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea rows="4" class="form-control" id="task_description" name="task_description"></textarea>
                        </div>

                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add Model -->
    <!-- Edit Task Modal -->
    <div id="edit_task" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="edit-modal-form" action="{{ route('update-task') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="e_id" value="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Task Name</label>
                                    <input class="form-control" type="text" id="task_name" name="task_name" value="{{ old('task_name') }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Employee Name</label>
                                    <select class="select form-control employee-dropdown" id="employee_name" name="employee_name">
                                        @foreach ($employee as $key=>$user )
                                        <option value="{{ $user->name }}" data-department="{{ $user->department}}"> {{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label class="col-form-label">Department</label>
                                <input class="form-control department-input" type="department" id="department" name="department" placeholder="Auto Department" readonly>
                            </div>

                            <div class="col-sm-6">
                                <label class="col-form-label">Worth of Task</label>
                                <select class="select select2s-hidden-accessible form-control" id="worth_of_task" name="worth_of_task" class="select" value="{{old('worth_of_task')}}">
                                    <option selected disabled> --Select --</option>
                                    <option>Low</option>
                                    <option>Medium</option>
                                    <option>Hight</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>From <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" id="starting_date" name="starting_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>To<span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" id="ending_date" name="ending_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea rows="4" class="form-control" id="task_description" name="task_description"></textarea>
                        </div>

                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Department Modal -->

    <!-- Delete Model-->
    <div class="modal custom-modal fade" id="delete_approve" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Task </h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <form action="{{ route("delete-task", ["id" => 1]) }}" method="POST" class="delete-form">
                            @csrf
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
    <!-- End Delete Model-->
</div>
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.edit_task').on('click', function(e) {
            e.preventDefault();
            var dataId = $(this).data('id');

            // Get the row data
            var tid = $(this).closest('tr').find('.id').text();
            var taskName = $(this).closest('tr').find('.task_name').text();
            var employeeName = $(this).closest('tr').find('.employee_name').text();
            var taskDescription = $(this).closest('tr').find('.task_description').text();
            var startingDate = $(this).closest('tr').find('.starting_date').text();
            var endingDate = $(this).closest('tr').find('.ending_date').text();
            var worth = $(this).closest('tr').find('.worth_of_task').text();
            var dept = $(this).closest('tr').find('.department').text();
            // Populate the modal form fields
            $('#edit_task #e_id').val(tid);
            $('#edit_task #task_name').val(taskName);
            $('#edit_task #employee_name').val(employeeName).trigger('change');
            $('#edit_task #task_description').val(taskDescription);
            $('#edit_task #starting_date').val(startingDate);
            $('#edit_task #ending_date').val(endingDate);
            $('#edit_task #worth_of_task').val(worth);
            $('#edit_task #department').val(dept);
            // Set the form action with the dataId
            $('#edit_task form.edit-modal-form').attr('action', '{{ route("update-task", ["id" => ":dataId"]) }}'.replace(':dataId', dataId));
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('.taskDelete').on('click', function(e) {
            e.preventDefault();
            var dataId = $(this).data('id');
            $('.delete-form').attr('action', '{{ route("delete-task", ["id" => ":dataId"]) }}'.replace(':dataId', dataId));
        });
    });
</script>
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
    // select auto department
    $(document).ready(function() {
        $('.employee-dropdown').on('change', function() {
            $(this).closest('.modal').find('.department-input').val($(this).find(':selected').data('department'));
        });
    });

    $("#searchTheKey").on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $("#matchKey li").each(function() {
            if ($(this).text().toLowerCase().search(value) > -1) {
                $(this).show();
                $(this).prev('.subjectName').last().show();
            } else {
                $(this).hide();
            }
        });
    });

</script>
@endsection