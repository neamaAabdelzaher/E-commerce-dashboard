@extends('layouts.parent')
@section('title','Users')
@section('css')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset ('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset ('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset ('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset ('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset ('assets/dist/css/adminlte.min.css')}}">
@endsection
@section('content')

<div class="card-body">
  @include('includes.messages')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>User name</th>
                    <th>User email</th>
                    <th>Type</th>
                    <th>Operations</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    @foreach($users as $user)
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td >
                         
                      <form action="{{route('users.toggle',$user->id)}}" method="post">
                       @csrf
                       @method('PATCH')
                      
                  <button class="border-0 " >
                   <input type="checkbox"  name="type"   {{ $user->type =="ADM" ? 'checked' : ' ' }} 
                   data-bootstrap-switch data-off-color="danger" data-on-color="success">
                  </button>
                      </form>
                   </td>
                  
                    <td>
                       
                        <form action="{{route('users.destroy',$user->id)}}"method="post">
                          @csrf
                          @method('DELETE')
                          <input class="btn btn-outline-danger" type="submit" value="delete">

                        
                        </form>
                    </td>
                  </tr>
                  @endforeach

                

                </table>
              </div>

@endsection

@section('js')
<!-- jQuery -->
<script src="{{asset ('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset ('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset ('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset ('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset ('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset ('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset ('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset ('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset ('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset ('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset ('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset ('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset ('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset ('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset ('assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset ('assets/dist/js/demo.js')}}"></script>
    <!-- Bootstrap Switch -->
<script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   
  });

  $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
</script>
@endsection