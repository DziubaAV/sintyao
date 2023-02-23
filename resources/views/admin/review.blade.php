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
                      <button class="tablinks" onclick="openLayout(event, 'Gallery')"> Каталог</button>
                      <button class="tablinks" onclick="openLayout(event, 'Reviews')" id="defaultOpen"> Отзывы</button>
                      <button class="tablinks" onclick="openLayout(event, 'History')"> Истории</button>     
                      <button class="tablinks" onclick="openLayout(event, 'Coaching_staff')"> Тренерский состав</button>
                      <button class="tablinks" onclick="openLayout(event, 'News')"> Новости</button>
                    </div>

                          <!-- Фото и видеогалерея -->
                          <div id="Gallery" class="tabcontent">
                            <form action="{{ asset('/adminka/catalog') }}" method="POST">
                              @csrf
                              <input type="text" name="name"  placeholder="Введите название альбома">
                                <select name="type" id="type">
                                  <option selected value="foto">В фотогалерею</option>
                                  <option value="video">В видеогалерею</option>
                                </select>

<br>

                              <input type="submit" value="Добавить альбом">
                            </form>

<br>
<br>
<br>
                            
<hr>
                          @foreach($catalogs as $catalog)
                            <span style="font-size: 15px">{{$catalog->name}}</span>
                              <div class="fl_right">
                              <a href="{{ asset('/adminka/catalog/'.$catalog->id) }}" class="btn btn-primary" id="edit" type="button">Перейти</a>
                              </div>                                                       
<hr /> 
                          @endforeach      
                          </div>

                          <!-- Отзывы -->
                          <div id="Reviews" class="tabcontent">
                          @foreach($reviews as $review)
                            <span style="font-size: 15px"><b>{{ $review->users->name }}:</b> {{$review->body}}</span>
                              <div class="fl_right">
                                <a href="{{ asset('/adminka/review/'.$review->id.'/edit') }}" class="btn btn-primary" id="edit" type="button">Изменить</a>
                                <a href="{{ asset('/adminka/review/'.$review->id.'/delete') }}" class="btn btn-primary" id="del"  type="button">Удалить</a>
                              </div>  
<hr />  
                            @endforeach
                          </div>

                          <!-- Истории -->
                          <div id="History" class="tabcontent">
                            <h3>История</h3>
                            <p>Редактирвание раздела.</p>    
                          </div>

                          <!-- Тренерский состав  -->
                          <div id="Coaching_staff" class="tabcontent">
                              <h3>Тренерский состав</h3>
                              <p>Редактирвание раздела.</p>   
                          </div>
                          
                          <!-- Новости -->
                          <div id="News" class="tabcontent">
                            <h3>Новости</h3>
                            <p>Редактирвание раздела.</p> 
                          </div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
