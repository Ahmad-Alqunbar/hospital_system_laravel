
<!DOCTYPE html>
<html lang="en">
  <head>
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
            <div class=""align=""style="padding-top:100px;">
                <table align=""class="table ">
                    <tr align="center" style="background-color:black;">
                    <th style="padding:10px;">Doctors </th>
                    <th style="padding:10px;">Phone</th>
                    <th style="padding:10px;">Specialty</th>

                    <th style="padding:10px;"> Room No.</th>
                    <th style="padding:10px;"> Image</th>
                    <th style="padding:10px;"> Delete</th>
                    <th style="padding:10px;"> Update</th>

                    </tr>
                    @foreach ( $data as $datas)
                    <tr align="center" style="background-color:black;">
                        <td style="padding:10px;">{{$datas->name}} </td>
                        <td style="padding:10px;">{{$datas->phone}} </td>
                        <td style="padding:10px;">{{$datas->specialty}} </td>

                        <td style="padding:10px;"> {{$datas->room}}</td>
                        <td style="padding:10px;"><img style="height:100px!important;width:100px !important;"src="doctorimage/{{$datas->image}}"> </td>
                        <td style="padding:10px;"><a onclick="return confirm('are you sure ?')" class="btn btn-danger"href="{{url('deletedoctor',$datas->id)}}">Delete</a></td>
                        <td style="padding:10px;"><a  class="btn btn-primary"href="{{url('updatedoctor',$datas->id)}}">Update</a></td>
                        </tr>
                    @endforeach
                </table>
                </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
