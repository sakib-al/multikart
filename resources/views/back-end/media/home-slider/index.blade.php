@extends('back-end.layout.master_back_end')

@section('master_title')
Multikart - Home Slider
@endsection

@section('page_title')
Home Slider
@endsection

@section('bread_title')
Home Slider
@endsection

@section('slider')
active
@endsection

@section('media')
active
@endsection


@push('custom_css')
<!-- jsgrid css-->
<link rel="stylesheet" type="text/css" href="{{ asset('back-end/assets/css/jsgrid.css') }}">
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Slider Lists</h5>
                </div>
                <div class="card-body">
                    <div id="basicScenario" class="product-list digital-product jsgrid" style="position: relative; height: auto; width: 100%;">
                        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                            <table class="jsgrid-table">
                                <tr class="jsgrid-header-row">
                                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 5px;">Id</th>
                                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 20px;">Slide Image</th>
                                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 20px;">Slider Name</th>
                                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Slider Title</th>
                                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Slider Subtitle</th>
                                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;">Status</th>
                                    <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
                                        <a href="{{ route('slider.create') }}" class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button" type="button" title="Switch to inserting">
                                    </th>
                                </tr>
                            </table>
                        </div>
                        <div class="jsgrid-grid-body">
                            <table class="jsgrid-table">
                                <tbody>
                                    @foreach ($slide as $slide_image)
                                    <tr class="jsgrid-row">
                                        <td class="jsgrid-cell" style="width: 5px;">{{ $loop->index+1 }}</td>
                                        <td class="jsgrid-cell" style="width: 20px;">
                                            <img src="{{asset('/')}}images/slider/{{ $slide_image->slide_image ?? 'no-image.jpg' }}" style="height: 50px; width: 50px;">
                                        </td>
                                        <td class="jsgrid-cell" style="width: 20px;">{{ $slide_image->name }}</td>
                                        <td class="jsgrid-cell" style="width: 50px;">{{ $slide_image->slide_title }}</td>
                                        <td class="jsgrid-cell" style="width: 50px; text-align: right !important;">{{ $slide_image->slide_subtitle }}</td>
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;">
                                            @if ($slide_image->status == 1)
                                            <i class="fa fa-circle font-success f-12" aria-hidden="true"></i>
                                             @else
                                             <i class="fa fa-circle font-danger f-12" aria-hidden="true"></i>
                                            @endif
                                        </td>
                                        <td class="jsgrid-cell jsgrid-control-field" style="width: 50px;">
                                            <a href="{{ route('slider.edit',$slide_image->id) }}" class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></a>
                                            <a href="{{ route('slider.delete',$slide_image->id) }}" class="jsgrid-button jsgrid-delete-button" type="button" title="Delete" onclick="return confirm('Are you sure you want to delete ?')"></a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
