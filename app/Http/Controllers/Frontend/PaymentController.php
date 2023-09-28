<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function payment(Request $request)
    {  
        if(!session('cart')){
            toast('أضف مشاريع أولا', 'error')->position('center');
            return redirect()->route('frontend.home');
        }
        // Getting next donation_num
        $payment = Payment::latest()->first();
        if ($payment) {
            $donation_num = $payment->donation_num ? intval(str_replace('#', '', strrchr($payment->donation_num, "#"))) : 0;
        } else {
            $donation_num = 0;
        }

        

        foreach(session('cart') as $cartItem){
            $payment = Payment::create([
                'user_id' => Auth::id(), 
                'project_id' => $cartItem['id'], 
                'donation_num' => 'donation#' . ($donation_num + 1),
                'donation' => $cartItem['donation-amount'],
                'payment_status' => 'paid',
                'completed' => 1,
                'payment_type' => $request->payment_type, 
            ]);

            $project = Project::find($cartItem['id']);
            $project->collected += $cartItem['donation-amount'];
            $project->save();

        }

        session()->put('cart',null);

        toast('تم التبرع للمشروع بنجاح', 'success')->position('center');

        return redirect()->route('frontend.home');
    } 
}
