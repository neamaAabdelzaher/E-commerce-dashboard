@extends('layouts.parent')
@section('title','sub_categories')
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sub_category name</th>
                    <th>Operations</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    @foreach($sub_categories as $sub_category)
                    <td>{{$sub_category->sub_cat_name}}</td>
                  
                    <td>
                        <a href="{{route('sub_categories.edit',$sub_category->id)}}"  class="btn btn-outline-primary">Edit</a>
                        <a href="http://"  class="btn btn-outline-danger">Delete</a>
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
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   
  });
</script>
@endsection