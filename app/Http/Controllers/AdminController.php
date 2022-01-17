<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctor;
use App\Models\Appointment;
use Notification;
use App\Notifications\SendEmailNotification;
class AdminController extends Controller
{
    public function add_doctor()
    {
        return view('admin.add_doctor');

    }
    public function upload(Request $req)
    {

      $doctor=new doctor;
      $image=$req->file;
      $imagename=time().'.'.$image->getClientOriginalExtension();
      $req->file->move('doctorimage',$imagename);
      $doctor->image=$imagename;
      $doctor->name=$req->name;
      $doctor->phone=$req->phone;
      $doctor->room=$req->room;
      $doctor->specialty=$req->specialty;


      $doctor->save();

      return  redirect()->back()->with('message','Doctor added successfully');
    }
    public function showappointment()
    {
        $data=Appointment::all();
    return view('admin.showappointment',compact('data'));
    }
    public function approved($id)
    {
        $data=Appointment::find($id);
       $data->status="approved";
       $data->save();

      return  redirect()->back();

    }
    public function canceled($id)
    {
        $data=Appointment::find($id);
       $data->status="canceled";
       $data->save();

      return  redirect()->back();

    }
    public function showdoctor()
    {
        $data=doctor::all();
        return view('admin.showdoctor',compact('data'));

    }
    public function deletedoctor($id)
    {
        $data=doctor::find($id);
        $data->delete();
         return redirect()->back();

    }
    public function updatedoctor($id)
    {
        $data=doctor::find($id);
        return view('admin.updatedoctor',compact('data'));

    }
    public function editdoctor(Request $req ,$id)
    {
        $doctor=doctor::find( $id);
        $doctor->name=$req->name;
        $doctor->phone=$req->phone;
        $doctor->room=$req->room;
        $doctor->specialty=$req->specialty;

        $image=$req->file;
        if ($image) {


      $imagename=time().'.'.$image->getClientOriginalExtension();
      $req->file->move('doctorimage',$imagename);
      $doctor->image=$imagename;
        }
      $doctor->save();
      return redirect()->back()->with('message','Doctor Details update successfully');

    }
    public function emailview($id)
    {
        $data=appointment::find($id);
           return view('admin.emailview',compact('data'));
    }
    public function sendemail(  Request $req,$id){

        $data=appointment::find($id);
   $details=[
    'greeting'=> $req-> greeting,
    'body'=> $req-> body,
    'actiontext'=> $req-> actiontext,
    'actionurl'=> $req-> actionurl,
    'endpart'=> $req-> endpart

   ];

         Notification::send($data,new SendEmailNotification($details));
         return  redirect()->back()->with('message','send email is succeful');
    }
}
