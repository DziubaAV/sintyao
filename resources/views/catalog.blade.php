@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $catalog_name }}</div> 

                      
                <div class="card-body">
                  @foreach($catalogs as $catalog)
                  <hr>
                  <form action="{{ asset('catalog_one/'.$catalog->id) }}">
                    
                    <button class="custom-btn-16">{{ $catalog->name }}</button>
                    </form>
                    
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection