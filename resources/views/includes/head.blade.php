@php
$theme =App\Models\Theme::find(1);
    
@endphp
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content = "{{csrf_token()}}">
  <link rel="icon" href="{{asset ('public/uploads/theme/'.$theme->favicon)}}" type="image/ico" />

  <title>Admin Dashboard - {{ config('app.name', 'Laravel') }}</title>

  <!-- Bootstrap -->
  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link href="{{asset ('public/dashboard/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{asset ('public/dashboard/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{asset ('public/dashboard/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{asset ('public/dashboard/.../vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="{{asset ('public/dashboard/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
  <!-- JQVMap -->
  <link href="{{asset ('public/dashboard/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="{{asset ('public/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.css')}}"rel="stylesheet">
   <!-- Datatables -->
    
   <link href="{{asset('public/dashboard/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
   <link href="{{asset('public/dashboard/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
   <link href="{{asset('public/dashboard/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
   <link href="{{asset('public/dashboard/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
   <link href="{{asset('public/dashboard/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href=" {{asset ('public/dashboard/build/css/custom.min.css')}}" rel="stylesheet">
</head>