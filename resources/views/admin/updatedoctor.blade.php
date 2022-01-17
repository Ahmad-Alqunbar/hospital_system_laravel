
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    <style>
        label{
            display:inline-block;
            width:200px;
        }
        </style>
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper mx-auto">

            <div class="container mx-auto"align="center"style="padding-top:50px;">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button"class="close"data-dismiss="alert">X</button>
                    {{session()->get('message')}}
                </div>
                @endif
                <form class="main-form"action="{{url('editdoctor',$data->id)}}" method="post"enctype="multipart/form-data">
                               @csrf
                               <div class="row mt-5 ">
                                <div class=" wow fadeInLeft"style="padding:15px;">
                                    <label for="">Doctor Name</label>
                                    <input type="text"value="{{$data->name}}" name="name" style="color:black;" id="name"placeholder="write the name">
                                </div>
                                <div class=" wow fadeInLeft"style="padding:15px;">
                                    <label for="">Phone</label>
                                    <input type="number" value="{{$data->phone}}"style="color:black;" id="phone"placeholder="write the number"name="phone">
                                </div>
                                <div class=" wow fadeInLeft" style="padding:15px;">
                                    <label for="">Specialty</label>
                                    <input type="text"  value="{{$data->specialty}}" name="specialty"style="color:black;">

                                </div>
                                <div  class=" wow fadeInLeft" style="padding:15px;">
                                    <label for="">Room number</label>
                                    <input type="text" value="{{$data->room}}" name="room" style="color:black;" id="rom"placeholder="write number">
                                </div>
                                <div style="padding-top:60px;padding-bottom:15px;float:left">
                                    <label for="">Old Image</label>
                                    <img style="height:150px;width:150;"src="doctorimage/{{$data->image}}">

                                </div>

                                <div class=" wow fadeInLeft" style="padding:15px;">
                                    <label for="">Change Image</label>
                                    <input type="file"name="file"style="">
                                </div>


                                <div class=" wow fadeInLeft" style="padding:15px;">
                                    <input class="btn btn-primary"type="submit" value="Update">
                                </div>
                            </div>
                </form>
            </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
