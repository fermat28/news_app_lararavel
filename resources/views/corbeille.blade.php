<!DOCTYPE html>
          <html lang="en">

          <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="">
            <meta name="author" content="Dashboard">
            <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
            <title>Dashio - Bootstrap Admin Template</title>

            <!-- Favicons -->
            <link rel="icon" href="{{ URL::asset('assets/img/favicon.png') }}" type="image/x-icon"/>
            <link rel="icon" href="{{ URL::asset('assets/img/apple-touch-icon.png') }}" type="image/x-icon"/>

            <!-- Bootstrap core CSS -->
            <link href= {{ asset('assets/lib/bootstrap/css/bootstrap.min.css') }}  rel="stylesheet">
            <!--external css-->
            <link href= {{ asset('assets/lib/font-awesome/css/font-awesome.css') }}  rel="stylesheet">
            <link href= {{ asset('assets/lib/font-awesome/css/zabuto_calendar.css') }}  rel="stylesheet">
            <link href= {{ asset('assets/lib/gritter/css/jquery.gritter.css') }}  rel="stylesheet">
            <!-- Custom styles for this template -->
            <link href= {{ asset('assets/css/style.css') }}  rel="stylesheet">
            <link href= {{ asset('assets/css/style-responsive.css') }}  rel="stylesheet">
            <script src="{{ asset('assets/lib/chart-master/Chart.js')}}"></script>

            <!-- =======================================================
              Template Name: Dashio
              Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
              Author: TemplateMag.com
              License: https://templatemag.com/license/
            ======================================================= -->
          </head>

          <body>
            <section id="container">
              <!-- **********************************************************************************************************************************************************
                  TOP BAR CONTENT & NOTIFICATIONS
                  *********************************************************************************************************************************************************** -->
              <!--header start-->
              @include('gabarits.sidebar')
              <!--sidebar end-->
              <!-- **********************************************************************************************************************************************************
                  MAIN CONTENT
                  *********************************************************************************************************************************************************** -->
              <!--main content start-->

              </section>
              <!-- /MAIN CONTENT -->
              <!--main content end-->
              <section id="main-content">
                <section class="wrapper">
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users Deleted') }}
                <a class="btn btn-success" title="restaurer" href="{{route('admin.matiere')}}"> <i class="fa fa-arrow-left"></i></a>
            </h2>
            <table class="table table-bordered table-dark">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>

                    <th scope="col">Active</th>
                    <th scope="col">action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($matiere as $matieres)
                    <tr>
                        <th>{{$matieres->name}}</th>
                        <td>{{$matieres->code}}</td>
                        <td>{{$matieres->active}}</td>
                        <td>
                            <a class="btn btn-success" title="restaurer" href="{{route('admin.restoremat' , $matieres->id)}}"> <i class="fa fa-undo"></i></a>
                            <a class="btn btn-success" title="supprimer definitivement" href="{{route("admin.secondstatusmat" , $matieres->id)}}"> <i class="fa fa-trash"></i></a>
                            {{-- <a class="btn btn-success" href=""> <i class="fa fa-plus"></i></a> --}}
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              </section>
            </section>

            <!-- js placed at the end of the document so the components load faster -->
            @include('gabarits.footer')
            <!--script for this page-->
          </body>
          </html>
