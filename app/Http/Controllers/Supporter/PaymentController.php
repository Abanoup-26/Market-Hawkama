<?php

namespace App\Http\Controllers\Supporter;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $projects = Project::pluck('title', 'id');
        return view("frontend.payments.index" ,compact("projects"));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request)
    {
        // validation 
        $data = $request->validate([
            'user_id' => 'required|integer',
            'name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(auth()->id()),
            ],
            'phone_number' => [
                'required',
                'string',
                'regex:/^01[0-9]{9}$/',
                Rule::unique('users')->ignore(auth()->id()),
            ],
            'donation' => 'required|numeric',
            'payment_type' => 'required|string',
            'project_ids' => [
                'required',
                'array',
                function ($attribute, $value, $fail) {
                    $projects = Project::pluck('id')->toArray();
                    foreach ($value as $projectId) {
                        if (!in_array($projectId, $projects)) {
                            $fail("One or more $attribute are invalid.");
                        }
                    }
                },
            ],
            'project_ids.*' => 'required|integer',
            'project_donation_amounts' => 'required|array',
            'project_donation_amounts.*' => 'required|numeric',
        ]);
        
         // create payment_orderid ,  donation_num
         $lastPayment = Payment::latest()->first();
         $donation_num = 'supporter_donation#1'; 
         $payment_order_id = 'supporter#1'; 
         if ($lastPayment) {
             $lastPaymentNumber = $lastPayment->payment_orderid;
             // Remove the "#Supporter_Payment_" prefix
             $lastPaymentNumber = substr($lastPaymentNumber, strlen('supporter#')); 
             $PaymentCount = intval($lastPaymentNumber);
             $nextPaymentCount = $PaymentCount + 1;
             $payment_order_id = 'supporter#' . $nextPaymentCount;
            //  donation 
            $lastdonationNumber = $lastPayment->donation_num;
            // Remove the "#supporter_donation_" prefix
            $lastdonationNumber = substr($lastdonationNumber, strlen('supporter_donation#')); 
            $donationCount = intval($lastdonationNumber);
            $nextdonationCount = $donationCount + 1;
            $donation_num = 'supporter_donation#' . $nextdonationCount;
         }
        
        
        // create First Payment  
        $payment = Payment::create([
            'user_id' => $data['user_id'],
            'payment_orderid'=> $payment_order_id,
            'donation_num'=> $donation_num,
            'donation'=> $request->donation,
            'payment_status'=> 'unpaid' ,
            'payment_type'=> $request->payment_type,
            'completed'=> 0,
        ]);
        // Attach projects with donation amounts to the payment
        $projectsWithAmounts = [];

        foreach ($data['project_ids'] as $key => $projectId) {
            $projectsWithAmounts[$projectId] = ['donation_amount' => $data['project_donation_amounts'][$key]];
        }
        $payment->projects()->attach($projectsWithAmounts);
        $payment->save(); 
        Alert::success('You Created A payment Successfully ');
        return redirect()->route('supporter.home');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
