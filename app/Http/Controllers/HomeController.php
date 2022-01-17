<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\doctor;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor= doctor::all();
                return view('user.home',compact('doctor'));
            }
            else
            {
                return view('admin.home');
            }
        }
        else
        {
             return redirect()->back();
        }
    }
    public function index()
    {
        if (Auth::id())
         {
            return redirect('home');
         }
         else
         {
            $doctor= doctor::all();
            return view('user.home',compact('doctor'));
         }

    }
    function appoitment(Request $request)
    {
            $data=new Appointment;
            $data->name=$request->name;
            $data->email=$request->email;
            $data->date=$request->date;
            $data->phone=$request->number;
            $data->message=$request->message;
            $data->doctor=$request->doctor;
            $data->status="In Progress";
            if (Auth::id()) {
                $data->user_id=Auth::user()->id;
            }
            $data->save();
                 return redirect()->back()->with('message',' Appointment Request  successful . we will contact with you soon');

    }
    public function myappoiment()
    {
        if(Auth::id()) {
            $userid=Auth::user()->id;
            $appoint=Appointment::where('user_id',$userid)->get();
            return view('user.my_appoitment',compact('appoint'));
        }
        else
        {
        return redirect()->back();
        }

    }
    function cancel_appoint($id)
    {
        $data=Appointment::find($id);
        $data->delete();
        return redirect()->back();
    }

}
