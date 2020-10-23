<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('/assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('/assets/demo/demo.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('/assets/css/imgareaselect-default.css') }}" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.8.0/css/flag-icon.min.css" />
</head>

<body class="">
  <div class="wrapper ">
   
    <div class="main-panel">
      <!-- Navbar -->
     
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">User Profile</h4>
                </div>
                <div class="card-body">
                  <div class="card card-profile">
                    <div class="card-avatar">
                      <a href="javascript:;">
                        <img class="img" src="../assets/img/faces/marc.jpg" />
                      </a>
                    </div>
                  <div class="card-body">
                 
                  <h4 class="card-title">{{$resultSet->firstname}}.''. {{$resultSet->lastname}}</h4>
                   <div class="row">
                    <div class="col-md-5">
                         <div class="form-group">
                            <label>FirstName: {{$resultSet->firstname}}</label>
                          </div>
                      </div>
                       <div class="col-md-5">
                         <div class="form-group">
                            <label>LastName:  {{$resultSet->lastname}}</label>
                          </div>
                      </div>
                    </div>
                     <div class="row">

                      <div class="col-md-5">
                         <div class="form-group">
                            <label>Address :  {{$resultSet->user_details->address}}</label>
                          </div>
                      </div>
                      <div class="col-md-5">
                         <div class="form-group">
                            <label>Country:  {{$resultSet->user_details->country}}</label>
                          </div>
                      </div>
                    </div>
                     <div class="row">

                      <div class="col-md-5">
                         <div class="form-group">
                            <label>Age:  {{$resultSet->user_details->age}}</label>
                          </div>
                      </div>
                       <div class="col-md-5">
                         <div class="form-group">
                            <label>Email:  {{$resultSet->email}}</label>
                          </div>
                      </div>
                    </div>
                     
                 
                </div>
              </div>
                  
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
     
    </div>
  </div>
 
  <!--   Core JS Files   -->
  <script src="{{asset('/assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('/assets/js/plugins/bootstrap-selectpicker.js')}}"></script>
  <script src="{{ asset('/assets/js/jquery.imgareaselect.dev.js') }}"></script>

  <script>
   
  </script>
</body>

</html>

