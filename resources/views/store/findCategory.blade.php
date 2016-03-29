@extends('store.templateStore')

@section('categories')
    @include('store.partials._categories')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">{{ $category->name }}</h2>

            @include('store.partials._product')

        </div><!--features_items-->
    </div>
@stop