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
<p>Добро пожаловать в административную панель:</p>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Административная панель</div>

                <div class='admin_body'>
                
                    <div class="tab">                      
                      <button class="tablinks" onclick="openLayout(event, 'Foto')"> Фотогалерея</button>
                      <button class="tablinks" onclick="openLayout(event, 'Video')"> Видеогалерея</button>
                      <button class="tablinks" onclick="openLayout(event, 'Reviews')" id="defaultOpen"> Отзывы</button>
                      <button class="tablinks" onclick="openLayout(event, 'History')"> Истории</button>     
                      <button class="tablinks" onclick="openLayout(event, 'Coaching_staff')"> Тренерский состав</button>
                    </div>

                          <div id="Reviews" class="tabcontent">
                           
                            @foreach($reviews as $review)
                            {{$review->body}}

                            <div class="fl_right">
                            <a href="{{ asset('/adminka/review/'.$review->id.'/edit') }}" class="btn btn-primary" id="edit" type="button">Изменить</a>
                            <a href="{{ asset('/adminka/review/'.$review->id.'/delete') }}" class="btn btn-primary" id="del"  type="button">Удалить</a>
                            </div>
                            
                            <hr />  
                            @endforeach
                          </div>
        
                          <div id="Foto" class="tabcontent">
                            <h3>Фотогалерея</h3>
                            <p>Редактирование фото и видеоматериалов.</p>
                          </div>

                          <div id="Video" class="tabcontent">
                            <h3>Видеогалерея</h3>
                            <p>Редактирование фото и видеоматериалов.</p>
                          </div>

                          <div id="History" class="tabcontent">
                            <h3>Истории</h3>
                            <p>Редактирование историй.</p> 
                          </div>

                          <div id="Coaching_staff" class="tabcontent">
                              <h3>Тренерский состав</h3>
                              <p>Редактирвание тренерского состава.</p>
                          </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
