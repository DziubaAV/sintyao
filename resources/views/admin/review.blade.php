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
                      <button class="tablinks" onclick="openLayout(event, 'News')"> Новости</button>

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
                          <h3>Каталог фотогалереи</h3>
                          
                          @foreach($catalogs as $catalog)
                          <div class="line">
                          {{$catalog->name}}
                          <div class="fl_right">
                        <a href="{{ asset('/adminka/catalog/'.$catalog->id) }}">Перейти в галерею </a>
                          </div>
                          </div>
                          

                          @endforeach
                                 
                            <div class="fl_right">
                              <a href="#" class="btn btn-primary" id="edit"      type="button">Изменить</a>
                              <a href="#" class="btn btn-primary" id="download"  type="button">Добавить</a>
                            </div>
                          </div>

                          <div id="Video" class="tabcontent">
                          <h3>Видеогалерея</h3>
                              <p>Редактирвание раздела.</p>    
                            <div class="fl_right">  
                              <a href="#" class="btn btn-primary" id="edit"      type="button">Изменить</a>
                              <a href="#" class="btn btn-primary" id="download"  type="button">Добавить</a>
                            </div>
                          </div>

                          <div id="History" class="tabcontent">
                          <h3>История</h3>
                              <p>Редактирвание раздела.</p>   
                            <div class="fl_right">
                              <a href="#" class="btn btn-primary" id="edit"      type="button">Изменить</a>
                            </div>
                          </div>

                          <div id="Coaching_staff" class="tabcontent">
                              <h3>Тренерский состав</h3>
                              <p>Редактирвание раздела.</p>   
                          </div>

                          <div id="News" class="tabcontent">
                              <h3>Новости</h3>
                              <p>Редактирвание раздела.</p> 
                              <div class="fl_right">  
                              <a href="#" class="btn btn-primary" id="edit"      type="button">Изменить</a>
                              <a href="#" class="btn btn-primary" id="download"  type="button">Добавить</a>
                            </div>                            
                          </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
