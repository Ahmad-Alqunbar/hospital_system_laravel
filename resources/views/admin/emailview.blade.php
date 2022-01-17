
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
                    <form class="main-form"action="{{url('sendemail',$data->id)}}" method="post">
                                   @csrf
                                   <div class="row mt-5 ">
                                    <div class=" wow fadeInLeft"style="padding:15px;">
                                        <label for="">Greeting</label>
                                        <input type="text" name="greeting" style="color:black;" required="">
                                    </div>
                                    <div class=" wow fadeInLeft"style="padding:15px;">
                                        <label for="">body</label>
                                        <input type="text"name="body"style="color:black;" required="">
                                    </div>

                                    <div  class=" wow fadeInLeft" style="padding:15px;">
                                        <label for="">Action text</label>
                                        <input type="text" name="actiontext" style="color:black;"required="">
                                    </div>
                                    <div  class=" wow fadeInLeft" style="padding:15px;">
                                        <label for="">Action url</label>
                                        <input type="text" name="actionurl" style="color:black;"required="">
                                    </div>

                                    <div  class=" wow fadeInLeft" style="padding:15px;">
                                        <label for="">End part</label>
                                        <input type="text" name="endpart" style="color:black;"required="">
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
