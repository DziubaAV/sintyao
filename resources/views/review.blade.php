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
    
                        
                        <div class="fl_right">
                        <div class="rating-mini">                               
                                    <span type="$stars" class="active">{{ $review->stars }}</span>	  
                                </div>  
                            <div>
                                {{ $review->created_at }}
                            </div> 
                        </div>

           
                        <hr>
                        @endforeach
                        
                        {!! $reviews->links() !!}                     

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
                                <label for="star-5" title="5 баллов"></label>	
                                <input type="radio" id="star-4" name="stars" value="4" checked="checked">
                                <label for="star-4" title="4 балла"></label>    
                                <input type="radio" id="star-3" name="stars" value="3">
                                <label for="star-3" title="3 балла"></label>  
                                <input type="radio" id="star-2" name="stars" value="2">
                                <label for="star-2" title="2 балла"></label>    
                                <input type="radio" id="star-1" name="stars" value="1">
                                <label for="star-1" title="1 балл"></label>
                            </div>
                           
                            <textarea placeholder="Текст отзыва..." name="body" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                        </div>

                        <button class="btn btn-primary fl_right" type="submit">Отправить</button>
                        </form>
                        @endguest
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
