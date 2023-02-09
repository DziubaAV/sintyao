<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>СК "SIN TYAO"</title>

    <!-- Fonts -->
    <link rel="shortcut icon" href="..\images\SinTyaoBuda.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('css/framework.css')}}" rel="stylesheet">
    <link href="{{asset('css/layout.css')}}" rel="stylesheet">
    <link href="{{asset('css/windows_modal.css')}}" rel="stylesheet">
    

    @stack('styles') 
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
      
</head>

<body>
<div class='wrapper'>
<!-- Ряд 0: Регистрация и авторизация -->
    <div class="row0">
      <div id="topbar" class="hoc clear"> 
        <div class="fl_left">
          <ul class="nospace inline pushright">
            <li> <a class='abc' href="tel:+375297654924">+375 29 765-49-24</a></li>
              <li><a class='abc' href="mailto:sintyao@gmail.com" target="_blank">sintyao@gmail.com</a></li>
                </ul>
                  </div>

                    <div class="fl_right">
                      <ul class="nospace inline pushright">
                      @guest
                      @if (Route::has('login'))
                        <li><a class='abc' href="{{ route('login') }}">Авторизация</a></li>
                      
                      @endif
                      @if (Route::has('register'))
                        <li><a class='abc' href="{{ route('register') }}">Регистрация</a></li>                 
                      @endif

                      @else

                            <!-- Выход из учетных данных -->
                            <li class="nav-item dropdown ">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></a>
                                    {{ Auth::user()->name }}
                                
                                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                      Выйти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                                        </div>
                                          </div>
                                            </div>

<!-- Ряд 1: LOGO -->
      <div class="row1">
        <header id="header" class="hoc clear">
          <!-- <div class="fl_left">
          <img src="..\images\SinTyaoBuda.jpg" alt="" class="round">
          </div> -->
          <div id="logo" class="fl_left">
            <h1><a href="{{ asset('/') }}">SIN TYAO</a></h1>
              </div>
                </header>
                  </div>

<!-- Ряд 2: Навигация -->
      <div class="row2">
        <nav id="mainav" class="hoc clear"> 
          <ul class="clear">
            <li class="active"><a href="{{ asset('/')}}">Главная</a></li>
            <li><a href="#">Журнал</a>
                <ul>
                <li><a href="{{ asset('catalog/foto') }}">Фотогалерея</a></li>
                <li><a href="{{ asset('catalog/video') }}">Видеогалерея</a></li>
                </ul>
            </li>
            <li><a href="#">О нас</a>
              <ul>
                <li><a href="{{ asset('history')}}">История</a></li>
                <li><a href="{{ asset('trener')}}">Тренерский состав</a></li>
              </ul>
            </li>
            <li><a href=" {{ asset('contacts') }} ">Контакты</a></li>
            <li><a href=" {{ asset('review') }}">Отзывы</a></li>
            <li><a onclick="document.getElementById('subject').style.display='block'" style="width:auto;" href="#">Вопросы ?</a></li>
            
            @if (Auth::user()->is_admin)
            <li class='admin'><a href="{{ asset('adminka') }}">Административная панель</a></li>
            @endif

            </ul>
        </nav>
              </div>


<!-- МО "Вопросы?" --> 
      <div id="subject" class="modal_modal">
        <span onclick="document.getElementById('subject').style.display='none'" class="modal_close" title="Close Modal">×</span>
            <form class="modal_content" method="post" action="{{asset('question')}}">
              @csrf
              <div class="modal_container">
                  <h2>Задайте нам вопрос и мы обязательно на него ответим!</h2>
                    <p>Пожалуйста, заполните эту форму, чтобы задать нам вопрос.</p>
                    <hr>

                        <label>ФИО</label>
                        <input type="Modaltext" name="fullname" placeholder="Введите полное имя" required>
              
                        <label">Email</label>
                        <input type="Modaltext" name="email" placeholder="Введите электронную почту" required>
    
                        <label><h2>Введите Ваш вопрос:</h2></label>
                        <textarea name="body" placeholder="Введите вопрос" style="height:100px"></textarea>
      
                          <div class="modal_clearfix">
                            <button class="btn btn-primary" type="button" onclick="document.getElementById('subject').style.display='none'" class="modal_cancelbtn">Отмена</button>
                            <button class="btn btn-primary" type="submit">Отправить</button>
                          </div>
              </div>
            </form>
                            </div>

<!-- Ряд 3: Контент --> 
  <div class='body-content row3'>
    <div class="main-content"> 
      @yield('content')
        </div>
          </div> 
  
<!-- Ряд 6: Подвал -->
  <div class="footer"><div class="row6">
    <div id="copyright" class="hoc clear"> 
      <p class="fl_left">Дипломный проект 2023 - <a href="https://iti.bsuir.by/">© ИИТ БГУИР</a></p>
        <p class="fl_right"><a>Разработчик: Дзюба АВ</a></p>
          </div>
            </div>
              </div>


</div>
</body>
@stack('scripts')  
</html>
