@extends('back-end.layout.master_back_end')

@push('custom_css')
<!-- jsgrid css-->
<link rel="stylesheet" type="text/css" href="{{ asset('back-end/assets/css/jsgrid.css') }}">
@endpush



@section('master_title')
Multikart - Media
@endsection

@section('page_title')
Media Gallery
@endsection

@section('bread_title')
Media
@endsection

@section('media')
active
@endsection
@section('content')
<div class="container-fluid bulk-cate">

    <div class="card">

        <div class="card-header">
            <h5>Media File List</h5>
        </div>
        <div class="card-body">
            <div class="btn-popup pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test"
                    data-target="#exampleModal">Add Media</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Media Image</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" action="{{ route('media.create') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- see error -->
                                    @if($errors->any())
                                    {{ implode('', $errors->all('<div>:message</div>')) }}
                                     @endif
                                    <div class="form">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="mb-1">Media Name :</label>
                                            <input class="form-control" name="name" id="validationCustom01" type="text">
                                            {!! $errors->first('name', '<label class="bg-danger">:message</label>') !!}
                                        </div>
                                        <div class="form-group mb-0">
                                            <label for="validationCustom02" class="mb-1">Media Image :</label>
                                            <input class="form-control" name="gallery_image" id="validationCustom02"
                                                type="file">
                                                {!! $errors->first('gallery_image', '<label class="bg-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div id="batchDelete" class="category-table media-table"></div> --}}
            {{-- Table --}}
            <div id="batchDelete" class="category-table media-table jsgrid"
                style="position: relative; height: auto; width: 100%;">
                <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                    <table class="jsgrid-table">
                        <tr class="jsgrid-header-row">
                            <th class="jsgrid-header-cell jsgrid-align-center" style="width: 50px;"><button
                                    type="button" class="btn btn-danger btn-sm btn-delete mb-0 b-r-4">Delete</button>
                            </th>
                            <th class="jsgrid-header-cell jsgrid-align-center" style="width: 50px;">Image</th>
                            <th class="jsgrid-header-cell jsgrid-align-right" style="width: 90px;">File Name</th>
                            <th class="jsgrid-header-cell" style="width: 100px;">Url</th>
                        </tr>
                        <tr class="jsgrid-filter-row" style="display: none;">
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;"></td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;"></td>
                            <td class="jsgrid-cell jsgrid-align-right" style="width: 90px;"><input type="number"></td>
                            <td class="jsgrid-cell" style="width: 100px;"></td>
                        </tr>
                        <tr class="jsgrid-insert-row" style="display: none;">
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;"></td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;"><input type="file"></td>
                            <td class="jsgrid-cell jsgrid-align-right" style="width: 90px;"><input type="number"></td>
                            <td class="jsgrid-cell" style="width: 100px;"></td>
                        </tr>
                    </table>
                </div>
                <div class="jsgrid-grid-body">
                    <table class="jsgrid-table">
                        <tbody>
                            @foreach ($media as $item)
                            <tr class="jsgrid-row">
                                <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;"><input type="checkbox"></td>
                                <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;">
                                    <img
                                        src="{{asset('/')}}images/gallery/{{ $item->images ??'' }}"
                                        style="height: 50px; width: 50px;">
                                </td>
                                <td class="jsgrid-cell jsgrid-align-right" style="width: 90px;">{{ $item->name }}</td>
                                <td class="jsgrid-cell" style="width: 100px;">{{ $item->images }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="jsgrid-pager-container" style="">
                    <div class="jsgrid-pager">Pages: <span
                            class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a
                                href="javascript:void(0);">First</a></span> <span
                            class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a
                                href="javascript:void(0);">Prev</a></span> <span
                            class="jsgrid-pager-page jsgrid-pager-current-page">1</span><span
                            class="jsgrid-pager-page"><a href="javascript:void(0);">2</a></span> <span
                            class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Next</a></span> <span
                            class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Last</a></span> &nbsp;&nbsp; 1
                        of 2 </div>
                </div>
                <div class="jsgrid-load-shader" style="display: none; position: absolute; inset: 0px; z-index: 1000;">
                </div>
                <div class="jsgrid-load-panel"
                    style="display: none; position: absolute; top: 50%; left: 50%; z-index: 1000;">Please, wait...</div>
            </div>
        </div>
    </div>
</div>
@endsection
