<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\FormFeedback;
use App\Models\Notification;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Auth;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $loginuserid = Auth::user()->user_id;

        $isUserfilled = DB::table('form_feedback')
            ->where('user_id', $loginuserid)
            ->count();

        if ($isUserfilled > 0) {
            $isUserfilled = true;
        } else {
            $isUserfilled = false;
        }

        return view('form.feedback', compact('isUserfilled'));
    }
    public function adminfeedback()
    {
        $feedbackRecords = FormFeedback::all();

        // Count the total number of feedback records (entries)
        $totalFeedbackRecords = $feedbackRecords->count();

        // Initialize variables for averages
        $averageForEach = [];
        $overallRecordAverage = 0;

        foreach ($feedbackRecords as $record) {
            // Access form values for each record
            $formValues = $record->formvalues;

            // Calculate the average for each array (assuming total value is out of 100)
            $average = array_sum($formValues) / count($formValues) * 20; // Multiply by 20 to get a scale out of 100

            // Add the average to the $averageForEach array
            $averageForEach[] = $average;

            // Add the average to the overall record average
            $overallRecordAverage += $average;
        }

        // Calculate the overall record average
        $overallRecordAverage /= $totalFeedbackRecords;

        return view('adminfeedback.adminfeedback', [
            'averageForEach' => $averageForEach,
            'overallRecordAverage' => $overallRecordAverage,
            'totalFeedbackRecords' => $totalFeedbackRecords, // Renamed the variable
        ]);
    }
    public function rateorganization(Request $request)
    {
        $formValues = array_values(request()->only([
            'feedback_1', 'feedback_2', 'feedback_3', 'feedback_4', 'feedback_5',
            'feedback_6', 'feedback_7', 'feedback_8', 'feedback_9', 'feedback_10',
            'feedback_11', 'feedback_12', 'feedback_13', 'feedback_14', 'feedback_15',
            'feedback_16', 'feedback_17', 'feedback_18', 'feedback_19', 'feedback_20',
        ]));

        // Get the currently logged-in user's ID
        $userId = Auth::user()->user_id;

        // Create a new FormFeedback record
        FormFeedback::create([
            'formvalues' => $formValues,
            'user_id' => $userId,
        ]);
        return redirect()->back();
    }
}
