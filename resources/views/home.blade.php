@extends('layouts.app')
<link rel="stylesheet"  href="css/style.css">
<link rel="stylesheet"  href="css/button.css">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard

                  <!--   <div style="margin: 4px 150px;">
                    <form action="{{route('home')}}" method="get">
                        Search: <input type="text" name="search" placeholder="Keyword" value="{{ isset($search) ? $search : ''}}" >
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                    </div> -->


                        <div style="text-align: right;">
                          <form action="{{ route('home')}}" method="get" class="btn-group center-block mt-4">
                            <h5>Search:</h5>&nbsp;&nbsp;&nbsp;
                            <div>
                              <input type="text" class="form-control" name="search" placeholder="Keyword" value="{{ isset($search) ? $search : ''}}">
                            </div>&nbsp;
                            <div class="form-group">
                              <button class="btn btn-success btn-lg" type="submit">Search</button>
                            </div>
                          </form>

                        </div>


                </div>
                
               

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    


                
                    <div style="margin: 5px 75%;">
                        <a href="{{route('input')}}" type="button" class="btn btn-success btn-lg">เพิ่มข้อมูล</a>
                    </div><br>

                <div>    
                <form action="{{route('export')}}" method="get">
                    @if(!empty($search))
                       <input type="hidden" name="search" value="{{$search}}">
                    @endif

                <center>
                
                    <table border="1">
                        <tr>
                            <th>Checkbox</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>EDIT</th>
                            
                            <th>DELETE</th>
                        </tr>
                        @foreach($customer as $customer)
                        <tr>
                            <td><input type="checkbox" name="checkbox[]" value="{{$customer->id}}"></td>
                            <td>{{ $customer->firstname }}</td>
                            <td>{{ $customer->lastname }}</td>
                            <td>{{ $customer->Email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td><a href="{{route('edit', $customer->id)}}">EDIT</a></td>

                            <td> 
                               <!--  <form action="{{route('delete', $customer->id)}}" method="post">
                                   @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="submit" value="ลบ">
                                  </form> -->
                                <a  href="#" style="color:black" data-toggle="modal" data-target="#myModaldelete-{{ $customer->id }}">DELETE</a>

                            </td>
                           
                            </tr>
                        @endforeach
                    </table>
                </center>
                <br>
                    <input style="margin: 5px 75%;" type="submit" class="btn btn-success" name="export" value="Eport">
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<div class="modal fade" id="myModaldelete-{{ $customer->id }}" role="dialog">
    <div class="modal-dialog">

      <!-- Modal Delete-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

          <form role="form" class="form-group" action="{{route('delete', $customer->id)}}" method="post">
            @csrf
            {{ method_field('DELETE') }}

            <label><b>Sure to delete? {{ $customer->firstname }}</b></label>

            <div class="modal-footer">
              <button type="submit" class="btn btn-danger">Sure</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

          </form>

        </div>
      </div>

    </div>
  </div>
