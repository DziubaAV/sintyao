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
                    <div class='card-body'>

                        <form action="{{asset('adminka/catalog/'.$catalog->id.'/add_picture')}}" method='POST' enctype="multipart/form-data" >
                            @csrf
                            <input type="file" name='picture'>
                            <button class="btn btn-primary fl_right" type="submit">Добавить файл</button>
                        </form>
                        <hr>
                        <form action="{{asset('adminka/catalog/'.$catalog->id.'/add_video')}}" method='POST'>
                            @csrf
                            <textarea name="video" placeholder="Введите URL" id="video" cols="30" rows="1"></textarea>
                            <button class="btn btn-primary fl_right" type="submit">Добавить ссылку</button>
                        </form>
                        
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