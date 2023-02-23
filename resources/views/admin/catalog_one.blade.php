@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{asset('css\admin_style.css')}}"/>
@endpush

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-header">Каталог {{ $catalog->name }}</div>
                    <div class='admin_body'>

                        <form action="{{asset('adminka/catalog/'.$catalog->id.'/add_picture')}}" method='POST' enctype="multipart/form-data" >
                            @csrf
                            <input type="file" name='picture'>
                            <button class="btn btn-primary fl_right" type="submit">Добавить</button>
                        </form>
<hr />
                        
                        @if(sizeof($media_arr))
                        @foreach ($media_arr as $key=>$value)
                            <div class="xcontainer">
                                <img src="{{ $value }}" class="catalog-img">
                                <div class="xoverlay">
                                <a href="{{ asset('adminka/delete_picture/'.$key) }}" class="btn btn-primary" id="edit" type="button">Удалить</a>
                                </div>
                            </div> 
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection