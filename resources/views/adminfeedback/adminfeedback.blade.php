@extends('layouts.master')
@section('content')
<div class="page-wrapper">
  <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="page-title">Feedback</h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{route('home')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Organization feedback</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="stats-info">
          <h6>Total Feedbacks</h6>
          <h4>{{$totalFeedbackRecords}}</h4>

        </div>
      </div>  

      <div class="col-md-4">
        <div class="stats-info">
          <h6>Overall Record Average</h6>
          <h4>{{ $overallRecordAverage }}%</h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-striped custom-table datatable">
            <thead>
              <tr>
                <th>#</th>
                <th>Feedback</th>

              </tr>
            </thead>
            <tbody><?php $count = 1 ?>
              @foreach ($averageForEach as $average)
             
              <tr>

                <td class="task_name"><?php echo $count++ ?></td>
                <td class="task_name"><?php if ($average < 20) { echo "Worst" ; } elseif ($average>= 20 && $average < 40) { echo "Fair" ; } elseif ($average>= 40 && $average < 60) { echo "Average" ; } elseif ($average>= 60 && $average < 80) { echo "Good" ; } else { echo "Excellent" ; } ?>
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

@endsection