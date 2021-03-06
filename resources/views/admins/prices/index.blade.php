@extends('admins.layouts.master')

@section('content')

    <div class="row" style="padding-top:15px;">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Add New Price</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li><a href="#">Manage Price</a></li>
                    <li class="active">Add Prices</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-sm-6">

           <form action = "{{route('admin.store_price')}}" method="POST">
                            @csrf  
            
                <div class="panel panel-color panel-info">                    
                    <div class="panel-body">
                        
                    {{-- <form class="form-horizontal" role="form"> --}}

                        @if($errors->any())

                            <ul class="alert">

                                @foreach($errors->all() as $error)

                                <div style="color:red;"><b>{{ $error }}</b></div>

                                @endforeach

                            </ul>

                        @endif

                        @if (Session::has('message'))
                           <div class="alert alert-success">
                               {{ Session::get('message') }}
                           </div>
                        @endif



                        <div class="row">
                            <div class="col-md-12"> 
                                                   

                                <div class="form-group">
                                      <div class="col-sm-12" style="margin-top:5px;">
                                            <div class="form-group mb-10">
                                                <h3>Add New Price</h3>

                                           
                                            <div class="col-sm-6"> <p style="margin-top:10px;">Type of Service</p></div>
                                                   <div class="col-sm-9">

                                                <select name="service" class="form-control" >
                                                    <option value="">Select Service</option>
                                                    @forelse($services as $service)
                                                    <option value="{{$service->id}}"> {{$service->name }}</option>
                                                    @empty

                                                    @endforelse
                                                </select>
                                                </div>
                                            </div>
                                        </div>                                 
                                </div>


                                <div class="form-group">
                                      <div class="col-sm-12" style="margin-top:5px;">
                                            <div class="form-group mb-10">
                                           
                                            <div class="col-sm-6"> <p style="margin-top:10px;">Academic Level</p></div>
                                                   <div class="col-sm-9">

                                                <select name="academics" class="form-control" >
                                                    <option value="">Select Level</option>
                                                    @forelse($academics as $level)
                                                    <option value="{{$level->id}}"> {{$level->name }}</option>
                                                    @empty

                                                    @endforelse
                                                </select>
                                                </div>
                                            </div>
                                        </div>                                 
                                </div>


                                <div class="form-group">
                                      <div class="col-sm-12" style="margin-top:5px;">
                                            <div class="form-group mb-10">
                                           
                                            <div class="col-sm-6"> <p style="margin-top:10px;">Paper Type</p></div>
                                                   <div class="col-sm-9">

                                                <select name="papertype" class="form-control" >
                                                    <option value="">Select type</option>
                                                    @forelse($papers as $paper)
                                                    <option value="{{$paper->id}}"> {{$paper->name }}</option>
                                                    @empty

                                                    @endforelse
                                                </select>
                                                </div>
                                            </div>
                                        </div>                                 
                                </div>




                                <div class="form-group">
                                      <div class="col-sm-12" style="margin-top:5px;">
                                            <div class="form-group mb-10">
                                           
                                            <div class="col-sm-6"> <p style="margin-top:10px;">Set Urgency/Time</p></div>
                                                   <div class="col-sm-9">

                                            <input type="number" name = "duration" class="form-control">
                                                </div>
                                            </div>
                                        </div>                                 
                                </div>

                                <div class="form-group">
                                      <div class="col-sm-12" style="margin-top:5px;">
                                            <div class="form-group mb-10">
                                           
                                            <div class="col-sm-6"> <p style="margin-top:10px;">Set Days Or Hours</p></div>
                                                   <div class="col-sm-9">

                                            <select name="days_or_hours" class="form-control">
                                                <option value="">Select</option>
                                                <option value="days">Days</option>
                                                <option value="hours">Hours</option>
                                            </select>
                                                </div>
                                            </div>
                                        </div>                                 
                                </div>



                                <div class="form-group">
                                      <div class="col-sm-12" style="margin-top:5px;">
                                            <div class="form-group mb-10">
                                           
                                            <div class="col-sm-6"> <p style="margin-top:10px;">Set Price (in AUD without $ sign)</p></div>
                                                   <div class="col-sm-9">

                                           <input type="number" step="0.001" class="form-control" name="pricefield">
                                                </div>
                                            </div>
                                        </div>                                 
                                </div>

                           

                                                                                 

                            </div>

                        </div>
                    </div>
                </div>              

                <div class="form-group  m-b-0">
                    <div class="col-md-12">
                        <button class="btn btn-success waves-effect waves-light" type="submit">Save Price</button>
                        {{-- <button type="reset" class="btn btn-default waves-effect m-l-5">Cancel</button> --}}
                    </div>
                </div>

            </form>


        </div>
    </div>
    <div class="container panel " style=" margin:20px 1px; background-color:#fff;">
        <h3>List of all Available Prices Prices</h3>

        <table id="datatable-buttons" class="table table table-hover m-0" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Service</th>
      <th scope="col">Academic Level</th>
      <th scope="col">Paper</th>
      <th scope="col">Urgency</th>
      <th scope="col">Days or Hours</th>
      <th scope="col">price in AUD</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
        @foreach($prices as $key =>$price)
    <tr>
      <th scope="row"><?php echo $key+1; ?></th>
      <td>{{ $price->service->name }}</td>
      <td>{{ $price->academics->name }}</td>
      <td>{{ $price->paper->name }}</td>
      <td>{{ $price->urgency_value }}</td>
      <td>{{$price->urgency_hour_or_day}}</td>
      <td>{{ $price->price }}</td>
      
      
            <td>

<!-- Button trigger modal to delete price -->
<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$price->id}}">
  {{ "Delete" }}
</button>
</td>


<!-- Modal -->
<div class="modal fade" id="exampleModal{{$price->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal{{$price->id}}Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Price?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('admin.admin_delete_price') }}" method="POST">
      <div class="modal-body">
        <p>Once deleted, the price will not be recovered.</p>
        @method('DELETE')
        @csrf
        <input type="hidden" name="price" value="{{ $price->id }}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-sm btn-danger">{{ "Delete" }}</button>
      </div>
      </form>
    </div>
  </div>
</div>

{{-- end model --}}
      
      
      
      
      
      
    </tr>
    @endforeach
 
  </tbody>
</table>

    </div>

@stop


@section('styles')
<style> 
    div.dataTables_wrapper div.dataTables_paginate {
        display:none !important;
    }
    </style>
    
    <link href="{{asset('assets/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/fixedHeader.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/scroller.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/dataTables.colVis.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/fixedColumns.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>

@stop

@section('scripts')
    
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.bootstrap.js')}}"></script>

    <script src="{{asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/responsive.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.colVis.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.fixedColumns.min.js')}}"></script>

    <!-- init -->
    <script src="{{asset('assets/pages/jquery.datatables.init.js')}}"></script>        

    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({keys: true});
            $('#datatable-responsive').DataTable();
            $('#datatable-colvid').DataTable({
                "dom": 'C<"clear">lfrtip',
                "colVis": {
                    "buttonText": "Change columns"
                }
            });
            $('#datatable-scroller').DataTable({
                ajax: "assets/plugins/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
            var table = $('#datatable-fixed-col').DataTable({
                scrollY: "300px",
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                fixedColumns: {
                    leftColumns: 1,
                    rightColumns: 1
                }
            });
        });
        TableManageButtons.init();

    </script>

@stop



