@extends('layouts.app')

@push('scripts')
<script>
    function openLayout(evt, Layout) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(Layout).style.display = "block";
        evt.currentTarget.className += " active";
    }
        document.getElementById("defaultOpen").click();
    </script>
@endpush

@push('styles')
<link rel="stylesheet" href="{{asset('css\admin_style.css')}}"/>
@endpush

@section('content')

    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Редактирование отзыва</div>
                      <div class='admin_body'>

                        <form action="{{  asset('adminka/review/'.$review->id)}}" method='POST'>
                        @csrf
                        <textarea name="body" id="body" cols="30" rows="10">{{$review->body}}</textarea>
                        <button class="btn btn-primary fl_right" type="submit">Cохранить</button>
                        </form>
                       
                        

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
