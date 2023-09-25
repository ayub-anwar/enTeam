@extends('layouts.master')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Leaves <span id="year"></span></h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Leaves</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i> Add Leave</a>
                </div>
            </div>
        </div>
        <!-- Leave Statistics -->
        <div class="row">
            <div class="col-md-3">
                <div class="stats-info">
                    <h6>Total Leaves</h6>
                    <h4>{{ $totalLeaves }}</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-info">
                    <h6>Approved Leaves</h6>
                    <h4>{{$approvedLeaves}}</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-info">
                    <h6>Declined Leaves</h6>
                    <h4>{{$declinedLeaves}}</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-info">
                    <h6>Pending Requests</h6>
                    <h4>{{$pendingLeaves}}</h4>
                </div>
            </div>
        </div>
        <!-- /Leave Statistics -->

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

        <!-- /Page Header -->
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table  class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Leave Type</th>
                                <th>From</th>
                                <th>To</th>
                                <th>No of Days</th>
                                <th>Reason</th>
                                <th class="text-center">Status</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(!empty($leaves))
                            @foreach ($leaves as $items )
                            <tr>
                                <td style="text-decoration: none; color:black;">{{ $items->name }}</td>
                                <td hidden class="id">{{ $items->id }}</td>
                                <td class="leave_type">{{$items->leave_type}}</td>
                                <td hidden class="from_date">{{ $items->from_date }}</td>
                                <td>{{date('d F, Y',strtotime($items->from_date)) }}</td>
                                <td hidden class="to_date">{{$items->to_date}}</td>
                                <td>{{date('d F, Y',strtotime($items->to_date)) }}</td>
                                <td class="day">{{$items->day}} Day</td>
                                <td class="leave_reason">{{$items->leave_reason}}</td>
                                <td class="text-center">
                                    <div class="dropdown action-label">
                                        <?php
                                        if ($items->leave_status == 'Declined') {
                                            $design = "fa fa-dot-circle-o text-danger";
                                        } else if ($items->leave_status == 'Approved') {
                                            $design = "fa fa-dot-circle-o text-success";
                                        } else {
                                            $design = "fa fa-dot-circle-o text-purple";
                                        }
                                        ?>
                                        <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                            <i class="{{$design}}"></i> {{$items->leave_status}}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item changeStatusApprove" data-toggle="modal" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                            <a class="dropdown-item changeStatusDecline" data-toggle="modal" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-danger"></i> Declined</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">    
                                            <a class="dropdown-item leaveDelete" href="#" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Add Leave Modal -->
    <div id="add_leave" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Leave</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('form/leaves/save') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Leave Type <span class="text-danger">*</span></label>
                            <select class="select" id="leaveType" name="leave_type">
                                <option selected disabled>Select Leave Type</option>
                                <option value="Casual Leave 12 Days">Casual Leave 12 Days</option>
                                <option value="Medical Leave">Medical Leave</option>
                                <option value="Loss of Pay">Loss of Pay</option>
                            </select>
                        </div>
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->user_id }}">
                        <div class="form-group">
                            <label>From <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" id="from_date" name="from_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>To <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" id="to_date" name="to_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Leave Reason <span class="text-danger">*</span></label>
                            <textarea rows="4" class="form-control" id="leave_reason" name="leave_reason"></textarea>
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Leave Modal -->

    <!-- Edit Leave Modal -->
    <div id="edit_leave" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Leave</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('form/leaves/edit') }}" method="POST">
                        @csrf
                        <input type="hidden" id="e_id" name="id" value="">
                        <div class="form-group">
                            <label>Leave Type <span class="text-danger">*</span></label>
                            <select class="select" id="e_leave_type" name="leave_type">
                                <option selected disabled>Select Leave Type</option>
                                <option value="Casual Leave 12 Days">Casual Leave 12 Days</option>
                                <option value="Medical Leave">Medical Leave</option>
                                <option value="Loss of Pay">Loss of Pay</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>From <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" id="e_from_date" name="from_date" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>To <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" id="e_to_date" name="to_date" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Number of days <span class="text-danger">*</span></label>
                            <input class="form-control" readonly type="text" id="e_number_of_days" name="number_of_days" value="">
                        </div>
                        <div class="form-group">
                            <label>Leave Reason <span class="text-danger">*</span></label>
                            <textarea rows="4" class="form-control" id="e_leave_reason" name="leave_reason" value=""></textarea>
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Leave Modal -->
 <!-- Approve Leave Modal -->
 <div class="modal custom-modal fade" id="approve_leave" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Leave Approve</h3>
                        <p>Are you sure want to approve for this leave?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <form action="{{ route('form/leaves/edit/editstatus') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" class="e_id" value="">
                            <input type="hidden" name="status" class="statusval" value="">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary continue-btn submit-btn aproveDeclineText"></button>
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
    <!-- /Approve Leave Modal -->
 

    <!-- Delete Leave Modal -->
    <div class="modal custom-modal fade" id="delete_approve" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Leave</h3>
                        <p>Are you sure want to delete this leave?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <form action="{{ route('form/leaves/edit/delete') }}" method="POST">
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
    <!-- /Delete Leave Modal -->
</div>
<!-- /Page Wrapper -->
@section('script')
<script>
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>
{{-- Update Status model --}}
<script>
    //Updaaaaaaaate Status Modal
    $(document).on('click', '.changeStatusApprove', function() {
        var _this = $(this).parents('tr');
        $('.e_id').val(_this.find('.id').text());
        $('.statusval').val(_this.find('.changeStatusApprove').text());
        $('.aproveDeclineText').html("Approve");
        console.log('Status Changed')
    })
    $(document).on('click', '.changeStatusDecline', function() {
        var _this = $(this).parents('tr');
        $('.e_id').val(_this.find('.id').text());
        $('.statusval').val(_this.find('.changeStatusDecline').text());
        $('.aproveDeclineText').html("Decline");
        console.log('Status Changed')
    })
</script>
{{-- update js --}}
<script>
    $(document).on('click', '.leaveUpdate', function() {
        var _this = $(this).parents('tr');
        $('#e_id').val(_this.find('.id').text());
        $('#e_number_of_days').val(_this.find('.day').text());
        $('#e_from_date').val(_this.find('.from_date').text());
        $('#e_to_date').val(_this.find('.to_date').text());
        $('#e_leave_reason').val(_this.find('.leave_reason').text());

        var leave_type = (_this.find(".leave_type").text());
        var _option = '<option selected value="' + leave_type + '">' + _this.find('.leave_type').text() + '</option>'
        $(_option).appendTo("#e_leave_type");
    });
</script>
{{-- delete model --}}
<script>
    $(document).on('click', '.leaveDelete', function() {
        var _this = $(this).parents('tr');
        $('.e_id').val(_this.find('.id').text());
    });
</script>

<script>
    function change() {
        inner.text = Approved;
    }
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