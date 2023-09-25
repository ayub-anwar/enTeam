<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalInformation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;


class PersonalInformationController extends Controller
{
    /** save record */
    public function saveRecord(Request $request)
    {
//dd($request);
        $request->validate([
            'passport_no'          => 'required|string|max:255',
            'passport_expiry_date' => 'required|string|max:255',
            'tel'                  => 'required|string|max:255',
            'nationality'          => 'required|string|max:255',
            'religion'             => 'required|string|max:255',
            'marital_status'       => 'required|string|max:255',
            'employment_of_spouse' => 'required|string|max:255',
            'children'             => 'required|string|max:255',
            'pc_name'              => 'required|string|max:255',
            'pc_relationship'      => 'required|string|max:255',
            'pc_phone_one'         => 'required|string|max:255',
            'pc_phone_second'      => 'required|string|max:255',
            'sc_name'              => 'required|string|max:255',
            'sc_relationship'      => 'required|string|max:255',
            'sc_phone_one'         => 'required|string|max:255',
            'sc_phone_second'      => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            
            $user_information = PersonalInformation::firstOrNew(
                ['user_id' =>  $request->user_id],
            );
            $user_information->user_id              = $request->user_id;
            $user_information->passport_no          = $request->passport_no;
            $user_information->passport_expiry_date = $request->passport_expiry_date;
            $user_information->tel                  = $request->tel;
            $user_information->nationality          = $request->nationality;
            $user_information->religion             = $request->religion;
            $user_information->marital_status       = $request->marital_status;
            $user_information->employment_of_spouse = $request->employment_of_spouse;
            $user_information->children             = $request->children;
            $user_information->pc_name              = $request->pc_name;
            $user_information->pc_relationship      = $request->pc_relationship;
            $user_information->pc_phone_one         = $request->pc_phone_one;
            $user_information->pc_phone_second      = $request->pc_phone_second;
            $user_information->sc_name              = $request->sc_name;
            $user_information->sc_relationship      = $request->sc_relationship;
            $user_information->sc_phone_one         = $request->sc_phone_one;
            $user_information->sc_phone_second      = $request->sc_phone_second;
            $user_information->save();

            DB::commit();
            Toastr::success('Create personal information successfully :)','Success');
            return redirect()->back();
            
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add personal information fail :)','Error');
            return redirect()->back();
        }
    }
}
