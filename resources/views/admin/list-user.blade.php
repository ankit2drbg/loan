@extends('layouts.admin-layout')

@section('content')
<section class="content-header">
   <h1>
      Users
   </h1>
   <ol class="breadcrumb">
      <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Users</li>
   </ol>
</section>

<section class="content"  style="min-height: 0;">
   <!-- Default box -->
   <div class="box">
      <div class="box-body">
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
               <!-- /.box-header -->
               <div class="box-body table-responsive no-padding">
                  <table class="table table-striped users-table">
                     <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Profile Status</th>
                          <th>Created At</th>
                          <th class="no-sort">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     @if(count($users))
                       @foreach($users as $user)
                          <tr>
                            <td>SF{{$user->id}}</td>
                            <td>{{$user->first_name.' '.$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                              @if($user->profile_status==0)
                              Incomplete
                              @elseif($user->profile_status==1)
                              Complete
                              @else
                              N/A
                              @endif
                            </td>
                            <td>
                            <a href="{{url('/admin/users/list-loan',$user->id)}}" class="icon-gap"><i class="fa fa-eye"></i></a>
                            </td>
                            <td>{{$user->created_at}}</td>
                          </tr>
                        @endforeach
                      @else
                        <tr>
                          <td colspan="6">No data found</td>
                        </tr>
                      @endif
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- Form Element sizes -->
         </div>
      </div>
      <!-- /.box-body -->
   </div>
   <!-- /.box -->
</section>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('.table').DataTable();
} );

</script>
@endsection