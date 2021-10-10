@extends('back-end.layout.master_back_end')

@section('master_title')
Multikart - Product
@endsection

@section('page_title')
Product
@endsection

@section('bread_title')
Product
@endsection

@section('product_list')
active
@endsection

@section('product')
active
@endsection


@push('custom_css')
 <!-- Datatables css-->
 <link rel="stylesheet" type="text/css" href="{{ asset('back-end/assets/css/datatables.css') }}">
@endpush



@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Product Lists</h5>
                </div>
                <div class="card-body">
                    {{-- <div id="basicScenario" class="product-list digital-product jsgrid" style="position: relative; height: auto; width: 100%;">
                        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                            <table class="jsgrid-table">
                                <tr class="jsgrid-header-row">
                                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 5px;">Id</th>
                                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 20px;">Product</th>
                                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Product Title</th>
                                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Category</th>
                                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Basic Info</th>
                                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Price</th>
                                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;">Status</th>
                                    <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
                                        <a href="{{ route('product.create') }}" class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button" type="button" title="Switch to inserting">
                                    </th>
                                </tr>
                            </table>
                        </div>
                        <div class="jsgrid-grid-body">
                            <table class="jsgrid-table">
                                <tbody>
                                    @foreach ($product as $item)
                                    <tr class="jsgrid-row">
                                        <td class="jsgrid-cell" style="width: 5px;">{{ $loop->index+1 }}</td>
                                        <td class="jsgrid-cell" style="width: 20px;">
                                            <img src="{{asset('/')}}images/product/{{ $item->singleImage->name ?? 'no-image.jpg' }}" style="height: 50px; width: 50px;">
                                        </td>
                                        <td class="jsgrid-cell" style="width: 50px;">{{ $item->name }}</td>
                                        <td class="jsgrid-cell" style="width: 50px;">{{ $item->categories_item->name ?? '' }}</td>
                                        <td class="jsgrid-cell" style="width: 50px; text-align: right !important;">
                                            @if (isset($item->color_item) > 0 )
                                            <p><span class="bold">Color:</span> {{ $item->color_item->name ?? 'No Color' }}</p>
                                            @endif
                                            @if (isset($item->size_item) > 0)
                                            <p><span class="bold">Size:</span> {{ $item->size_item->name ?? 'No Size' }}</p>
                                            @endif

                                        </td>
                                        <td class="jsgrid-cell" style="width: 50px; text-align: right !important;">{{ $item->price }}</td>
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;">
                                            @if ($item->status == 1)
                                                <i class="fa fa-circle font-success f-12" title="Acitve" aria-hidden="true"></i>
                                                @else
                                                <i class="fa fa-circle font-danger f-12" aria-hidden="true"></i>
                                            @endif
                                            @if ($item->best_sell == 1)
                                            <i class="fa fa-circle font-info f-12" title="Best Seller Product" aria-hidden="true"></i>
                                            @endif
                                            @if ($item->is_feature == 1)
                                            <i class="fa fa-circle font-secondary f-12" title="Feature Product" aria-hidden="true"></i>
                                            @endif
                                        </td>
                                        <td class="jsgrid-cell jsgrid-control-field" style="width: 50px;">
                                            <a href="{{ route('product.edit',$item->id) }}" class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></a>
                                            <a href="{{ route('product.delete',$item->id) }}" class="jsgrid-button jsgrid-delete-button" type="button" title="Delete" onclick="return confirm('Are you sure you want to delete ?')"></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="jsgrid-pager-container" style="">
                            <div class="jsgrid-pager">Pages: <span class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a href="javascript:void(0);">First</a></span> <span class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a href="javascript:void(0);">Prev</a></span>
                            <span class="jsgrid-pager-page jsgrid-pager-current-page">1</span><span class="jsgrid-pager-page"><a href="javascript:void(0);">2</a></span>
                            <span class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Next</a></span>
                            <span class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Last</a></span>
                            &nbsp;&nbsp; 1 of 2
                        </div>
                        </div>
                        <div class="jsgrid-load-shader" style="display: none; position: absolute; inset: 0px; z-index: 1000;"></div>
                        <div class="jsgrid-load-panel"  style="display: none; position: absolute; top: 50%; left: 50%; z-index: 1000;">Please, wait...</div>
                    </div> --}}
                    <table class="display" id="product-list">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product</th>
                                <th>Product Title</th>
                                <th>Category</th>
                                <th>Basic Info</th>
                                <th>Price</th>
                                <th>Discount Value</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    <img src="{{asset('/')}}images/product/{{ $item->singleImage->name ?? 'no-image.jpg' }}" style="height: 50px; width: 50px;">
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->categories_item->name ?? '' }}</td>
                                <td>
                                    @if (isset($item->color_item) > 0 )
                                        <p><span class="bold">Color:</span> {{ $item->color_item->name ?? 'No Color' }}</p>
                                    @endif
                                    @if (isset($item->size_item) > 0)
                                        <p><span class="bold">Size:</span> {{ $item->size_item->name ?? 'No Size' }}</p>
                                    @endif
                                </td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <p>{{ $item->discount_value ? $item->discount_value.'%' : 'No Discount' }}</p>
                                    @if ($item->discount_end <= date("Y-m-d"))
                                        @if ($item->discount_status == 1)
                                        <p class="text-danger">Discount End</p>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status == 1)
                                        <i class="fa fa-circle font-success f-12" title="Acitve" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-circle font-danger f-12" aria-hidden="true"></i>
                                    @endif
                                    @if ($item->best_sell == 1)
                                    <i class="fa fa-circle font-info f-12" title="Best Seller Product" aria-hidden="true"></i>
                                    @endif
                                    @if ($item->is_feature == 1)
                                    <i class="fa fa-circle font-secondary f-12" title="Feature Product" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('product.edit',$item->id) }}" class="text-success" type="button" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="{{ route('product.delete',$item->id) }}" class="text-danger" type="button" title="Delete" onclick="return confirm('Are you sure you want to delete ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom_js')
<!-- Datatable js-->
<script src="{{ asset('back-end/assets/js/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('back-end/assets/js/datatables/custom-basic.js') }}"></script>
@endpush
