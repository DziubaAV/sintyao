@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Отзывы  
                </div>

                    <div class="card-body">


                        @foreach($reviews as $review)
                        <br>
                       
                        <b>
                        user name (аватарка)
                        </b>
                      
                        {{ $review->body }}
                        <hr>
                        @endforeach

                        <div class='pagination'>
{!! $reviews->links() !!}

                        </div>

                        @guest()
                        <div class="alert alert-danger" role="alert">
                        Чтобы оставить отзыв - зарегистрируйтесь.
                        </div>
                        
                        @else
                        
                            <form action="{{ asset('review') }}" method="POST">
                                @csrf  
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Текст отзыва</label>
                                        <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                            <button class="btn btn-primary" type="submit">Отправить</button>
                            </form>
                            @endguest
                                            </div>

                                    </div>
                                </div>
    </div>
</div>
@endsection
