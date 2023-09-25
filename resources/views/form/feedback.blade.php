@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}

<!-- Page Wrapper -->
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title"> Feedback <span id="year"></span></h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Feedback Your Company</li>
                    </ul>
                </div>

            </div>
        </div>
        @if($isUserfilled)
        <h3 class="page-title"> YOU HAVE ALREADY FILLED THE FEEDBACK <span id="year"></span></h3>
        @else
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                    <form action="{{ route('usercompanyfeedback') }}" method="post">
                        @csrf
                        <tbody>
                            <tr>
                                <td>1. I am satisfied with the clarity of my job responsibilities and expectations
                                <td>
                                    <label for="feedback_1">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_1" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_1" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_1" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_1" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_1" value="5" required>
                                </td>

                                </td>

                            </tr>
                            <tr>

                                <td>2. My immediate supervisor provides regular and constructive feedback to help me improve
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_2" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_2" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_2" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_2" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_2" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>3. The company's goals and mission are well-communicated and understood by employees
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_3" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_3" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_3" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_3" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_3" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>4. I have access to the resources and tools necessary to perform my job effectively
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_4" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_4" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_4" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_4" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_4" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>5. The company promotes a culture of teamwork and collaboration.
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_5" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_5" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_5" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_5" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_5" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>6. Opportunities for professional growth and development are readily available to me
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_6" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_6" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_6" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_6" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_6" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>7. My workload is manageable and aligned with my skills and capacity.
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_7" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_7" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_7" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_7" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_7" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>8. I feel recognized and valued for my contributions to the company
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_8" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_8" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_8" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_8" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_8" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>9. The company demonstrates a commitment to work-life balance and employee well-being
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_9" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_9" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_9" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_9" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_9" value="5"  required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>10. I am satisfied with the level of communication within the company.
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_10" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_10" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_10" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_10" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_10" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>11. Performance goals and targets are set in a clear and achievable manner
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_11" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_11" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_11" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_11" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_11" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>12. The company encourages and supports innovation and creative thinking
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_12" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_12" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_12" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_12" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_12" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>13. The company provides fair and equal opportunities for advancement.
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_13" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_13" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_13" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_13" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_13" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>14. I feel comfortable raising concerns or issues without fear of retaliation
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_14" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_14" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_14" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_14" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_14" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>15. The company's leadership is effective in guiding the organization toward success
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_15" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_15" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_15" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_15" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_15" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>16. The company takes appropriate actions to address diversity and inclusion in the workplace.
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_16" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_16" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_16" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_16" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_16" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>17. I am satisfied with the compensation and benefits provided by the company.
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_17" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_17" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_17" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_17" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_17" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>18. The company's policies and procedures are transparent and well-understood
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_18" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_18" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_18" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_18" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_18" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>19. My work aligns with the company's overall strategy and objectives.
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_19" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_19" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_19" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_19" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_19" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>

                                <td>20. I believe the company is committed to ethical and responsible business practices
                                <td>
                                    <label for="feedback_2">Very Disagree</label>
                                    <input type="radio" id="feedback_1" name="feedback_20" value="1" required>
                                </td>
                                <td>
                                    <label for="feedback_2">Disagree</label>
                                    <input type="radio" id="feedback_2" name="feedback_20" value="2" required>
                                </td>
                                <td>
                                    <label for="feedback_3">Agree</label>
                                    <input type="radio" id="feedback_3" name="feedback_20" value="3" required>
                                </td>
                                <td>
                                    <label for="feedback_4">Fine</label>
                                    <input type="radio" id="feedback_4" name="feedback_20" value="4" required>
                                </td>
                                <td>
                                    <label for="feedback_5">Exactly</label>
                                    <input type="radio" id="feedback_5" name="feedback_20" value="5" required>
                                </td>
                                </td>

                            </tr>
                            <tr>
                                <td> <button type="submit" class="btn add-btn">submit</button></td>
                               
                            </tr>

                        </tbody>
                </div>
            </div>
        </div>
</form>

        @endif


    </div>
    <!-- /Page Content -->




</div>

<!-- /Page Wrapper -->



@endsection