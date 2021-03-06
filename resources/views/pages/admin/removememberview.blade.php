@extends('layouts.admin')
@section('admin-css')

@endsection


@section('admin-content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Remove Member From Platform</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">pages</li>
            <li class="breadcrumb-item active">Remove Member From Platform</li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<?php $i=1;?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Remove Member</h4>
                    <h6 class="card-subtitle">You can remove member from platform.</h6>
                    <div class="table-responsive m-t-40">
                        <table id="allow-apply" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Region of focus</th>
                                    <th>Sector of Focus</th>
                                    <th>How much capacity is left this round</th>
                                    <th>Area of Family/Investor Expertise</th>
                                    <th>Net Worth</th>
                                    <th>Applied Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Region of focus</th>
                                    <th>Sector of Focus</th>
                                    <th>Typical Check Size</th>
                                    <th>Area of Family/Investor Expertise</th>
                                    <th>Net Worth</th>
                                    <th>Applied Time</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if($members->count()>0)
                                @foreach($members as $user)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$user->fName.' '.$user->lName}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->investmentregion)
                                            @foreach($user->investmentregion as $ir)
                                                <span class="badge badge-success">{{$ir->type->type}}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->investmentsector)
                                            @foreach($user->investmentsector as $isr)
                                                <span class="badge badge-info">{{$isr->type->type}}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->investmentsize)
                                            @foreach($user->investmentsize as $isz)
                                                <span class="badge badge-warning">{{$isz->type->type}}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>{{$user->area_family_investor_expertise}}</td>
                                    <td>{{$user->networth_aum}}</td>
                                    <td>{{$user->updated_at}}</td>
                                    <td><button class="btn waves-effect waves-light btn-sm btn-danger" data-id="{{$user->id}}" id="remove-btn">Remove</button></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
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

<form action="{{route('admin.remove-member')}}" method="POST" id="remove-form">
    @csrf
    <input type="hidden" name="id" id="remove-id">
</form>
@endsection

@section('admin-js')
<!-- This is data table -->
<script src="{{asset('assets/dashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<script type="text/javascript">
	$('#allow-apply').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $(document).on("click","#remove-btn", function(){
        var id = $(this).data('id');
        $("#remove-id").val(id);
        $("#remove-form").submit();
    });
</script>
@if(Session::get('msg'))
<script type="text/javascript">
  swal({   
        title: "{{Session::get('msg')[0]}}",   
        text: "{{Session::get('msg')[1]}}",   
        type: "{{Session::get('msg')[2]}}",   
        showCancelButton: false,   
        confirmButtonColor:"#1e88e5",
        confirmButtonText: "OK!",   
        closeOnConfirm: false 
    });
</script>
@endif
@endsection