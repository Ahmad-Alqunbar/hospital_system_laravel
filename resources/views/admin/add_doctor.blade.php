
<!DOCTYPE html>
<html lang="en">
  <head>
      <style>
          label
          {
              display:inline-block;
              width: 200px;
          }
      </style>
    <!-- Required meta tags -->
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

                <div class="container mx-auto"align="center"style="padding-top:50px;">
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button"class="close"data-dismiss="alert">X</button>
                        {{session()->get('message')}}
                    </div>
                    @endif
                    <form class="main-form"action="{{url('upload_doctor')}}" method="post"enctype="multipart/form-data">
                                   @csrf
                                   <div class="row mt-5 ">
                                    <div class=" wow fadeInLeft"style="padding:15px;">
                                        <label for="">Doctor Name</label>
                                        <input type="text" name="name" style="color:black;" id="name"placeholder="write the name">
                                    </div>
                                    <div class=" wow fadeInLeft"style="padding:15px;">
                                        <label for="">Phone</label>
                                        <input type="number" style="color:black;" id="phone"placeholder="write the number"name="phone">
                                    </div>
                                    <div class=" wow fadeInLeft" style="padding:15px;">
                                        <label for="">Specialty</label>
                                    <select  name="specialty"style="color:black;width:210px;">
                                        <option >--Select--</option>
                                        <option value="skin">skin</option>
                                        <option value="heart">heart</option>
                                        <option value="eye">eye</option>
                                        <option value="nose">nose</option>
                                    </select>
                                    </div>
                                    <div  class=" wow fadeInLeft" style="padding:15px;">
                                        <label for="">Room number</label>
                                        <input type="text" name="room" style="color:black;" id="rom"placeholder="write number">
                                    </div>
                                    <div class=" wow fadeInLeft" style="padding:15px;">
                                        <label for="">Doctor Image</label>
                                        <input type="file"name="file" style="">
                                    </div>

                                    <div class=" wow fadeInLeft" style="padding:15px;">

                                        <input class="btn btn-success"type="submit" >
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
