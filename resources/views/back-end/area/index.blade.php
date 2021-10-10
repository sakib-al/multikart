@extends('back-end.layout.master_back_end')

@section('master_title')Multikart - Settings @endsection
@section('page_title')Settings @endsection
@section('bread_title')Area @endsection

@section('settings')active @endsection
@section('area')active @endsection

@section('back_custom_css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

<style>
    .user-table th{
        text-align: center;
    }
</style>
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Area List</h5>
                </div>
                <div class="card-body">
                    <div class="btn-popup pull-right">
                        <button type="button" class="btn btn-primary addAreaModal" data-type="add-area" data-status="1" data-city_status="0" data-country_id="2" data-url="{{ route('area.create') }}" data-toggle="modal" data-original-title="test"data-target="#areaModal">Add Area</button>

                        {{-- Modal Start --}}
                        <div class="modal fade" id="areaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="areaHead">Add Area</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" id="area-form" action="{{ route('area.create') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="name" value="null" class="source_id">

                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Country Name:</label>

                                                    {!! Form::select('country_id', $country, 2, ['placeholder' => 'Select Country', 'class' => 'form-control', 'id' => 'country_id', 'required',]) !!}
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">City Name:</label>

                                                    {!! Form::select('city_id', $city, null, [ 'class' => 'form-control', 'id' => 'city_id', 'required']) !!}
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="mb-1">Area Name:</label>
                                                    <input class="form-control area-name" id="validationCustom01" type="text" name="area_name" placeholder="Enter Area" required>
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label>Status</label>
                                                    <select class="form-control" name="status" id="area-status" required>
                                                        <option value="">Select Status</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary submit-btn" type="submit">Save</button>
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- Modal End --}}
                    </div>
                    <table id="countries" class="table table-striped table-bordered user-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Area</th>
                                <th>Status</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($area->count() > 0)
                            @foreach ($area as $areas)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $areas->country_name }}</td>
                                <td>{{ $areas->city_name }}</td>
                                <td>{{ $areas->area_name }}</td>
                                <td style="text-align: center">
                                    @if ($areas->status == 1)
                                        <i class="fa fa-circle font-success f-12" aria-hidden="true"></i>
                                        @else
                                        <i class="fa fa-circle font-danger f-12" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>{{ $areas->edited_by }}</td>
                                <td class="text-center" width="15%">
                                    <a href="#" class="btn btn-sm btn-danger editAreaModal" data-toggle="modal" data-target="#areaModal"  data-type="edit" data-url="{{ route('area.update',[$areas->id]) }}" data-city_status="{{ $areas->city_id }}" data-area_name="{{ $areas->area_name }}" data-status="{{ $areas->status }}" data-country_id="{{ $areas->country_id }}" >Edit</a>
                                    <a href="{{ route('area.delete',[$areas->id]) }}" class="btn btn-sm btn-primary" onclick="return confirm('Are you sure you want to delete ?')">Delete</a>
                                </td>
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

@endsection

@section('back-end_custom_js')
<script>
    $(document).ready(function() {
        $('#countries').DataTable();
    } );
</script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('back-end/assets/js/back-panel/location.js') }}"></script>

@endsection
