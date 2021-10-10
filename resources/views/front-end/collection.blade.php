@extends('front-end.layout.front-master')

@section('page_title')Collection @endsection

@section('bread_title')Collection @endsection
@section('bread_subtitle')Collection @endsection

@section('content')
<section class="collection section-b-space ratio_square ">
    <div class="container">
        @foreach ($collection->chunk(4) as $item)
        <div class="row partition-collection section-t-space">
            @foreach ($item as $collected)
            <div class="col-lg-3 col-md-6">
                <div class="collection-block">
                    <div><img src="{{asset('/')}}images/subcategory/{{ $collected->images ?? 'no-image.jpg' }}" class="img-fluid blur-up lazyload bg-img" alt=""></div>
                    <div class="collection-content">
                        <h4>({{ $collected->qty }} products)</h4>
                        <h3>{{ $collected->name }}</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry....</p>
                        <a href="{{ route('collection.view',$collected->url_slug) }}" class="btn btn-outline">shop now !</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach

    </div>
</section>
@endsection
