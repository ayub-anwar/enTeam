@extends('layouts.master')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
  <style>
    .styled-time-input {
      display: inline-block;
      width: 100%;
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      border-radius: 0.25rem;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .styled-time-input::-webkit-calendar-picker-indicator {
      filter: invert(56%) sepia(94%) saturate(7483%) hue-rotate(338deg) brightness(89%) contrast(86%);
    }
  </style>
  <!-- Page Content -->
  <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="page-title">Set Appointments</h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{route('home')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Health Appointment</li>
          </ul>
        </div>
        <div class="col-auto float-right ml-auto">
          <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_doctor"><i class="fa fa-plus"></i> Add Doctor</a>
        </div>
      </div>
    </div>
    <!-- /Page Header -->

    <section class="review-section information">
      <div class="review-header text-center">
        <h3 class="review-title">Make Appointment</h3>
        <p class="text-muted">Select the Employees with less performance and appoint them to consult</p>
      </div>
      <div class="row my-3">
        <div class="col-md-12 col-lg-12 col-xl-8 d-flex">
          <div class="card flex-fill">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 col-12 text-center">
                  <div class="stats-box mb-4">
                    <h3>Appointment Settings</h3>
                  </div>
                </div>
              </div>
              <form action="{{ route('setdoctor_Appointment') }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-sm-3">
                    <label>Employee Name</label>
                    <select class="select" name="appointed_employee" id="appointed_employee">
                      <option selected disabled> --Select Employee --</option>
                      @foreach($actionableHealthEmployees as $emp)
                      <option value="{{$emp->actionable_employee}}">{{$emp->actionable_employee}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <label>Select Doctor</label>
                    <select class="select" name="appointed_doctor" id="appointed_doctor">
                      <option selected disabled> --Select Doctor --</option>
                      @foreach($getavailabledoctors as $doc)
                      <option value="{{$doc->doctor_name}}">{{$doc->doctor_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Appoint Date</label>
                      <div class="cal-icon">
                        <input type="text" class="form-control datetimepicker" id="appointed_date" name="appointed_date">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="appointed_date">Appoint Time</label>
                      <input type="time" class="styled-time-input form-control" id="appointed_time" name="appointed_time">
                    </div>
                  </div>
                </div>
                <div class="row filter-row">
                  <div class="col-md-12 ">
                    <div class="form-floating">
                      <label>Appointment Reason</label>
                      <textarea class="form-control" placeholder="Describe the Employee condition...." name="appointed_reason" id="floatingTextarea2" style="height: 100px"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="submit-section d-flex justify-content-center">
                      <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
          <div class="card flex-fill">
            <div class="card-body">
              <h4 class="card-title text-center">Actionable Employees <span class="badge bg-inverse-danger ml-2"></span></h4>
              <div class="card card-table flex-fill">
                <div class="card-header">
                  <h3 class="card-title mb-0 text-center">Employees</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table custom-table mb-0">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Progress</th>
                          <th>Remove</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        @foreach($actionableHealthEmployees as $emp)
                        <tr class="row{{$emp->user_id}}">
                          <td>{{$emp->actionable_employee}}</td>
                          <td>{{$emp->progress}}</td>
                          <td>
                            <a href="deleteactionableemployee/{{$emp->user_id}}" class="btn delete-actionable-emp" data-user-id="{{$emp->user_id}}">
                              <i class="la la-trash text-danger" style="font-size:30px;"></i>
                            </a>
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
        </div>
      </div>
      <!-- Add Doctor Modal Start -->
      <div id="add_doctor" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Doctor</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('add_doctor') }}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Doctor Name</label>
                      <input class="form-control" type="text" id="" name="doctor_name" placeholder="Enter Doctor Name" required>
                    </div>
                  </div>
                </div>
                <div class="submit-section">
                  <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Add Doctor Modal END -->

    </section>
  </div>

  <!-- /Page Content -->
</div>
<!-- /Page Wrapper -->
@endsection