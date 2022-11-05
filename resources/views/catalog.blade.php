@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $catalog_name }}</div> 

                <div class="card-body">
                  @foreach($catalogs as $catalog)

                <a href="{{ asset('catalog_one/'.$catalog->id) }}">{{ $catalog->name }}</a> |
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
