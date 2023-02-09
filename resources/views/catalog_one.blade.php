@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $catalog->name }}</div> 

                <div class="card-body">
                @if(isset($media_arr[0]))
                @foreach ($media_arr as $key=>$value)

                <a target="_blank" href="{{ $value }}">
                    <img class="catalog-img" src="{{ $value }}" alt="#" width="150px" height="200px">
                        </a>

                @endforeach
                @endif
                <div>{{ $catalog->body }}</div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
