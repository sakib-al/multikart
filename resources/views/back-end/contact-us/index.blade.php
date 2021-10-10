@extends('back-end.layout.master_back_end')

@section('master_title')
Multikart - Contact Us
@endsection

@section('page_title')
Web Section
@endsection

@section('bread_title')
Contact Us
@endsection

@section('web')
active
@endsection

@section('contact-us')
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
                    <h5>Information Lists</h5>
                </div>
                <div class="card-body">
                    <div id="basicScenario" class="product-list digital-product jsgrid" style="position: relative; height: auto; width: 100%;">
                        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                            <table class="jsgrid-table">
                                <tr class="jsgrid-header-row">
                                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable">Id</th>
                                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable">Google Maps</th>
                                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable">Contact Us</th>
                                    <th class="jsgrid-header-cell jsgrid-header-sortable">Email</th>
                                    <th class="jsgrid-header-cell jsgrid-header-sortable">Address</th>
                                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable">Fax</th>
                                    <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center">
                                        <a href="{{ route('contact.create') }}" class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button" type="button" title="Switch to inserting">
                                    </th>
                                </tr>
                            </table>
                        </div>
                        <div class="jsgrid-grid-body">
                            <table class="jsgrid-table">
                                <tbody>
                                    @foreach ($contact as $contact_us)
                                    <tr class="jsgrid-row">
                                        <td class="jsgrid-cell">1</td>
                                        <td class="jsgrid-cell">{{ $contact_us->google_map }}</td>
                                        <td class="jsgrid-cell">{{ $contact_us->phone_no_1 }}<br>{{ $contact_us->phone_no_2 }}</td>
                                        <td class="jsgrid-cell">{{ $contact_us->email_address_1 }}<br>{{ $contact_us->email_address_2 }}</td>
                                        <td class="jsgrid-cell"ext-align: right !important;">{{ $contact_us->contact_address }}</td>
                                        <td class="jsgrid-cell jsgrid-align-center" >{{ $contact_us->fax_address_1 }}<br>{{ $contact_us->fax_address_2 }}</td>
                                        <td class="jsgrid-cell jsgrid-control-field" >
                                            <a href="{{ route('contact.edit',$contact_us->id) }}" class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></a>
                                            <a href="#" class="jsgrid-button jsgrid-delete-button" type="button" title="Delete" onclick="return confirm('Are you sure you want to delete ?')"></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="jsgrid-pager-container" style="">
                            <div class="jsgrid-pager">Pages: <span class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a href="javascript:void(0);">First</a></span> <span class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a href="javascript:void(0);">Prev</a></span>
                            <span class="jsgrid-pager-page jsgrid-pager-current-page">1</span><span class="jsgrid-pager-page"><a href="javascript:void(0);">2</a></span>
                            <span class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Next</a></span>
                            <span class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Last</a></span>
                            &nbsp;&nbsp; 1 of 2
                        </div> --}}
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
