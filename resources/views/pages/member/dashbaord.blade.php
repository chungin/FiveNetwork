@extends('layouts.member')
@section('member-css')
<link href="{{asset('assets/dashboard/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
<link href="{{asset('assets/dashboard/plugins/footable/css/footable.core.css')}}" rel="stylesheet">
<link href="{{asset('assets/dashboard/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
<style type="text/css">
    .jvectormap-marker{
        r:2;
        fill: #1ba7ff;
        fill-opacity:1;
        stroke: #0080ff;
        stroke-width : 1;
        stroke-opacity: 1;
        animation: pulse 1.5s 2;
    }

    @-webkit-keyframes pulse {
      0% {
        r:0;fill-opacity:1;
      }
      50% {
        r:5;fill-opacity:0.5;
      }
      100% {
        r:0;fill:transparent;fill-opacity:0;
      }

    }
    @keyframes pulse {
      0% {
        r:0;fill-opacity:1;
      }
      50% {
        r:5;fill-opacity:0.5;
      }
      100% {
        r:0;fill:transparent;fill-opacity:0;
      }
    }
      
</style>
@endsection


@section('member-content')
<?php $i=1;?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">United States Member Location Interactive Map</h4>
                    <div id="usa" style="height: 600px"></div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <a href="{{route('member.request-opportunity')}}" class="btn btn-block btn-outline-info">Submit co-investment opportunity</a>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <a href="{{route('member.refer-member-view')}}" class="btn btn-block btn-outline-info">Refer a Family to the FIVE Network</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <a href="{{route('member.profile')}}" class="btn btn-block btn-outline-info">Edit Profile</a>
                        </div>
                        
                        <div class="col-md-6 col-lg-6">
                            <a href="{{route('member.verified-opportunity')}}" class="btn btn-block btn-outline-info">My FIVE Verified Opportunities</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <a href="{{route('member.faq')}}" class="btn btn-block btn-outline-info">Frequently Asked Questions</a>
                        </div>
                        
                        <div class="col-md-6 col-lg-6">
                            <a href="#" class="btn btn-block btn-outline-info">Dealroom</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Analytics</h4>
                    <h6 class="card-subtitle">List of opportunities opend by you</h6>
                    <div class="row m-t-40">
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <div class="card card-inverse card-info">
                                <div class="box bg-info text-center">
                                    <h1 class="font-light text-white">2,064</h1>
                                    <h6 class="text-white">Total opportunities</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <div class="card card-success card-inverse">
                                <div class="box text-center">
                                    <h1 class="font-light text-white">1,738</h1>
                                    <h6 class="text-white">Responded</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <div class="card card-inverse card-danger">
                                <div class="box text-center">
                                    <h1 class="font-light text-white">1100</h1>
                                    <h6 class="text-white">Resolve</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <div class="card card-inverse card-dark">
                                <div class="box text-center">
                                    <h1 class="font-light text-white">964</h1>
                                    <h6 class="text-white">Pending</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                    <hr>
                    <h6 class="card-subtitle">List of Login Information</h6>
                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>ID #</th>
                                    <th>IP Address</th>
                                    <th>Location</th>
                                    <th>Device</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logins as $login)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$login->ip_addr}}</td>
                                    <td>{{$login->location}}</td>
                                    <td>{{$login->device}}</td>
                                    <td>{{$login->created_at}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="text-right">
                                            <ul class="pagination"> </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->

@endsection

@section('member-js')
<script src="{{asset('assets/dashboard/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/vectormap/jquery-jvectormap-in-mill.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/vectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/footable/js/footable.all.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
<!-- <script src="{{asset('assets/dashboard/plugins/vectormap/jvectormap.custom.js')}}"></script> -->

<script type="text/javascript">
$('#usa').vectorMap({
    map : 'us_aea_en',
    backgroundColor: '#4c4c4c',
    borderColor: '#818181',
    borderOpacity: 0.25,
    borderWidth: 1,
    zoomOnScroll: true,
    color: '#009efb',
    regionStyle : {
        initial : {
          fill : 'black'
        }
      },
    markerStyle: {
      initial: {
        },
    },
    enableZoom: true,
    hoverColor: '#009efb',
    markers : [
    {latLng : [36.778259, -119.417931],name : 'I Love My India'},
    {latLng : [44.182205, -84.506836],name : 'I Love My India'},
    {latLng : [33.247875, -83.441162],name : 'I Love My India'},
    {latLng : [66.160507, -153.369141],name : 'I Love My India'}
    ],
    hoverOpacity: null,
    normalizeFunction: 'linear',
    scaleColors: ['#b6d6ff', '#005ace'],
    selectedColor: '#c9dfaf',
    selectedRegions: [],
    showTooltip: true,
});
</script>
<script type="text/javascript">
    var addrow = $('#demo-foo-addrow');
        addrow.footable().on('click', '.delete-row-btn', function() {

        //get the footable object
        var footable = addrow.data('footable');

        //get the row we are wanting to delete
        var row = $(this).parents('tr:first');

        //delete the row
        footable.removeRow(row);
    });

</script>
@endsection