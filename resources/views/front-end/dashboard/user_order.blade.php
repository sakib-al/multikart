@extends('front-end.layout.front-master')

@section('page_title')User Dashboard @endsection
@section('dashboard_order')active @endsection

@section('bread_title')Dashboard @endsection
@section('bread_subtitle')My Order @endsection

@push('custom_css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
<style>
    .paginate_button .next{
        background-color: #5fcbc4;
        color: #fff;
        padding: 7px 13px;
        margin-left: 5px;
    }
    .paginate_button .previous{
        background-color: #5fcbc4;
        color: #fff;
        padding: 7px 13px;
    }
    .paginate_button{
        border: 1px solid;
        padding: 6px 10px;
        margin-left: 5px;
    }
    .paginate_button.current {
        background-color: #5fcbc4;
        color: #fff !important;
    }
    .paginate_button{cursor: pointer;}

</style>
@endpush

@section('content')
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="account-sidebar"><a class="popup-btn">my account</a></div>
                <div class="dashboard-left">
                    <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                aria-hidden="true"></i> back</span></div>
                    <div class="block-content">
                        @include('front-end.layout.user_dashboard_nav')
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        {{-- <div class="page-title">
                            <h2>My Dashboard</h2>
                        </div> --}}
                        <div class="box-account box-info">
                            <div>
                                <div class="box">
                                    <div class="box-title">
                                        <h3>My Order List</h3>
                                    </div>
                                    <div class="order-list">
                                        <table id="order_list" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Order ID#</th>
                                                    <th>Date</th>
                                                    <th>Total Amount</th>
                                                    <th>Payment Type</th>
                                                    <th>Order Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (isset($order) && $order->count() > 0)
                                                    @foreach ($order as $list)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td><a href="{{ route('user.order.view',[$list->id]) }}">#ORD-{{ $list->order_id }}</a></td>
                                                        <td>{{ date('d-m-y',strtotime($list->created_at)) }}</td>
                                                        <td>{{ $list->order_sum }}.00৳</td>
                                                        <td>
                                                            @if ($list->is_cod == 1)
                                                                COD
                                                            @elseif ($list->is_paid == 2)
                                                                BKash
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($list->is_cancel == 1)
                                                            Cancelled
                                                            @elseif ($list->is_active == 0)
                                                            Processing
                                                            @elseif ($list->is_active == 1)
                                                            Order Confirmed
                                                            @endif
                                                        </td>
                                                        <td class="text-center"><a href="{{ route('user.order.view',[$list->id]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('custom_js')
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
    $('#order_list').DataTable({
        "paging":   true,
        "ordering": false,
        "info":     true,
        "shorting": false,
        "filter": false,
        "bLengthChange": false
    });
} );
</script>
@endpush

