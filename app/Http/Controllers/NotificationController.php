<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Healthmatrix_employee;
use App\Models\Healthmatrixemployee;
use App\Models\Notification;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class NotificationController  extends Controller
{
    //
    public function getNotified($user_id)
    {
        $getNotified = Notification::where('user_id', $user_id)->get();
        return response()->json($getNotified);
    }
    public function clearmynotfications($user_id)
    {
        Notification::where('user_id', $user_id)->delete();
        Toastr::success('Notifications Removed Successfully');
        return redirect()->back();
    }
    public function setfeedbacknotification($id)
    {
        $getuserdetailfromfeedback = Feedback::find($id);
        $rating = '';
        if ($getuserdetailfromfeedback->feedbackrating == 1) {
            $rating = "You have been rated Not Satisfied, Review is : " . strval($getuserdetailfromfeedback->feedbackdescription);
        } else if ($getuserdetailfromfeedback->feedbackrating == 2) {
            $rating = "You have been rated Slow Task Progress, Review is : " . strval($getuserdetailfromfeedback->feedbackdescription);
        } else if ($getuserdetailfromfeedback->feedbackrating == 3) {
            $rating = "You have been rated Average, Review is : " . strval($getuserdetailfromfeedback->feedbackdescription);
        } else if ($getuserdetailfromfeedback->feedbackrating == 4) {
            $rating = "You have been rated Good, Review is : " . strval($getuserdetailfromfeedback->feedbackdescription);
        } else if ($getuserdetailfromfeedback->feedbackrating == 5) {
            $rating = "You have been rated Excellent, Review is : " . strval($getuserdetailfromfeedback->feedbackdescription);
        }

        Notification::create([
            'user_id'      => $getuserdetailfromfeedback->user_id,
            'notification_message'    => $rating
        ]);

        return redirect()->back();
    }
    public function setPerformancenotification($name)
    {
        $getuserdetails = User::where('name', $name)->first();
        $completedTasks = DB::table('tasks')
            ->where('employee_name', $name)
            ->where('status', 'Complete')
            ->count();

        $pendingTasks = DB::table('tasks')
            ->where('employee_name', $name)
            ->where('status', 'Pending')
            ->count();

        $totalTasksAssigned = $completedTasks + $pendingTasks;

        if ($totalTasksAssigned > 0) {
            $userAverageProgress = ($completedTasks / $totalTasksAssigned) * 100;
            $formattedUserAverageProgress = number_format($userAverageProgress, 2); // Format to 2 decimal places
        } else {
            $userAverageProgress = 0; // Default value if no tasks are assigned
        }
        if ($userAverageProgress <= 60.0) {
            Notification::create([
                'user_id'      => $getuserdetails->user_id,
                'notification_message'    => 'Your Overall Task Performance Progress is:' . $formattedUserAverageProgress . '%'
            ]);

            if (!DB::table('healthmatrixemployee')->where('user_id', $getuserdetails->user_id)->exists()) {
                DB::table('healthmatrixemployee')->insert([
                    'actionable_employee' => $name,
                    'user_id' => $getuserdetails->user_id,
                    'progress' => $formattedUserAverageProgress . '%'
                ]);
            }
        } else {
            Notification::create([
                'user_id'      => $getuserdetails->user_id,
                'notification_message'    => 'Your Overall Task Performance Progress is:' . $formattedUserAverageProgress . '%'
            ]);
        }

        Toastr::success('Employee Notified ', 'Success');
        return redirect()->back();
    }
}
