@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Отзывы
                </div> 
                    <div class="card-body">
                        @foreach($reviews as $review)
                        
                        
                        <b>{{ $review->users->name }}: </b>
                        {{ $review->body }}

                        <hr>
                        @endforeach
                        
                        {!! $reviews->links() !!}                     
<hr>
                        @guest()

                        <div class="alert alert-danger" role="alert">
                        Авторизуйтесь, чтобы добавить комментарий.
                        </div>
                        
                        @else
                        <form action="{{ asset('review') }}" method="POST">
                        @csrf  
                        <div class="mb-3">

                        <div class="rating-area">
                            <input type="radio" id="star-5" name="stars" value="5">
                            <label for="star-5" title="Оценка '5'"></label>	
                            <input type="radio" id="star-4" name="stars" value="4">
                            <label for="star-4" title="Оценка '4'"></label>    
                            <input type="radio" id="star-3" name="stars" value="3">
                            <label for="star-3" title="Оценка '3'"></label>  
                            <input type="radio" id="star-2" name="stars" value="2">
                            <label for="star-2" title="Оценка '2'"></label>    
                            <input type="radio" id="star-1" name="stars" value="1">
                            <label for="star-1" title="Оценка '1'"></label>
                        </div>

                            <label for="exampleFormControlTextarea1" class="form-label">Текст отзыва</label>
                            <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
<!-- Расчет рейтига -->
                        

                        <button class="btn btn-primary" type="submit">Отправить</button>
                        </form>
                        @endguest
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
