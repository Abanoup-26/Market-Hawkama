<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use  RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class CartController extends Controller
{
  
    public function index()
    {
        if(auth()->check()){
            $projects = session('cart', []);
            //   return $projects;
        }
        return view('frontend.cart.index', compact('projects'));
    }
    public function addToCart(Request $request)
{
    $project = Project::findOrFail($request->id);
    
    $cart = session()->get('cart', []);

    if (isset($cart[$request->id])) {
        // Update the donation amount if the project already exists in the cart
        $cart[$request->id]['donation-amount'] = $request->donation_amount;
        toast('تم تحديث مبلغ التبرع للمشروع بنجاح', 'info')->position('center');
        // session update
        session()->put('cart', $cart);
        // cart index redirect
        return redirect()->route('frontend.cart.index');
    } else {
        // add a new project to cart
        $cart[$request->id] = [
            'title' => $project->title,
            'collected' => $project->collected,
            'goal' => $project->goal,
            'donation-amount' => $request->donation_amount,
            'user_id' => auth()->user()->id,
            'image' => $project->image,
        ];
        toast('تم إضافة المشروع إلى قائمة التبرعات بنجاح', 'success')->position('center');
    }
    // add data to session 
    session()->put('cart', $cart);

    return redirect()->route('frontend.home');
}

    // remove from cart
    public function destroy($id)
    {
        toast(' تم ازالة المشروع من قئمة التبرعات', 'info')->position('center');
        session()->forget("cart.{$id}");
        return redirect()->route('frontend.cart.index');
    }
}
