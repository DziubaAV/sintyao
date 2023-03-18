<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Распознование Гуглом метатеги -->
    <meta name="description" content="✔Спортивный клуб по единоборствам. Скидки и акции. Звоните!☎✔">

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">

    @stack('styles') 
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
      
</head>

<body>
<div class='wrapper'>
<!-- Ряд 0: Регистрация и авторизация -->
    <!-- <div class="row0">
      <div id="topbar" class="hoc clear"> 
        <div class="fl_left">
          <ul class="nospace inline pushright">
            <li> <a class='abc' href="tel:+375297654924">+375 29 765-49-24</a></li>
              <li> <a class='abc' href="mailto:zebra-gor@yandex.by" target="_blank">zebra-gor@yandex.by</a></li>
                </ul>
        </div>

                    
      </div>
    </div> -->

<!-- Ряд 1: LOGO -->
      <!-- <div class="row1">
        <header id="header" class="hoc clear">
          <div class="fl_left">
            <a target="_blank" href="{{ asset('/images/SinTyaoBuda.jpg') }}">
              <img class="round" src="{{ asset('/images/SinTyaoBuda.jpg') }}" alt="SinTyaoBuda"></a>
                </div>
                  <div id="logo" class="fl_left">
                    <h1><a href="{{ asset('/') }}">SIN TYAO</a></h1>
                    </div>
        </header>
      </div> -->

<!-- Ряд 2: Навигация -->
      <div class="row2">
        <nav id="mainav" class="hoc clear"> 
          <ul class="clear">
            <li>
            @if($world == '')
            Главная
              @else
              <a href="{{ asset('/')}}">Главная</a></li>
              @endif

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

            <li>
              @if($world == 'price')
              Цена
              @else
              <a href=" {{ asset('price') }} ">Цена</a></li>
              @endif

            <li>
            @if($world == 'contacts')
              Отзывы
              @else
              <a href=" {{ asset('contacts') }} ">Контакты</a></li>
              @endif

            <li >
              @if($world == 'review')
              Отзывы
              @else
              <a href=" {{ asset('review') }}">Отзывы</a></li>
              @endif

             
            <!-- <li><a onclick="document.getElementById('subject').style.display='block'" style="width:auto;">Вопросы ?</a></li> -->
            
            @if(Auth::user())
            @if (Auth::user()->is_admin)

            <li> 
              @if($world == 'adminka')
              Административная панель
              @else
              <a href="{{ asset('adminka') }}">Административная панель</a>
              @endif
              </li>
            @endif
            @endif
           
            <div class='fl_right'>
            @guest
                        @if (Route::has('login'))
                          <li><a href="{{ route('login') }}">Авторизация</a></li>
  
                        @endif
                        @if (Route::has('register'))
                          <li><a href="{{ route('register') }}">Регистрация</a></li>                 
                        @endif

                        @else

                            <!-- Выход из учетных данных -->

                            <div class="button-container">

                            <li>{{Auth::user()->name }}</li>
                            <li>  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              Выйти</a></li>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                              @csrf
                              </form>   
                              
              @endguest
            </div>

                        
                        </ul>

            <!-- Второе меню, адаптив -->
            <script>
              function _go() {
                location.href=document.getElementById('address').options[document.getElementById('address').selectedIndex].value;
              }
            </script>

            <select onchange="_go()" id="address">
                <option value="#" selected="selected">МЕНЮ</option> 
                <option value="{{ asset('/') }}">Главная</option> 
                <option value="#">-Журнал</option> 
                <option value="{{ asset('catalog/foto') }}">--Фотогалерея</option> 
                <option value="{{ asset('catalog/video') }}">--Видеогалерея</option> 
                <option value="#">-О нас</option>
                <option value="{{ asset('history') }}">--История</option> 
                <option value="{{ asset('trener') }}">--Тренерский состав</option>
                <option value="{{ asset('contacts') }}">Контакты</option>
                <option value="{{ asset('price') }}">Цена</option>
                <option value="{{ asset('review') }}">Отзывы</option>

                @if(Auth::user())
                @if (Auth::user()->is_admin)
                <option value="{{ asset('review') }}">Административная панель</option>
                @endif
                @endif
            </select> 
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
                        <textarea name="body" placeholder="Введите вопрос" style="height:100px" required></textarea>
      
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

<footer class="footer-distributed">

  <div class="footer-left">

  <h2 class="heading" style="color: white">СК "Sin Tyao"</h2>

    <p class="footer-links">
      <a href="/" class="link-1">Главная</a>
      <a href="{{ asset('trener')}}">Тренерский состав</a>
      <a href=" {{ asset('contacts') }} ">Контакты</a>
    </p>

    <div class="footer-icons">
      <a href="https://vk.com/club4824870" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a>
      <a href="https://www.instagram.com/evgenysintyao/" target="_blank"><i class="fa fa-instagram"></i></a>
    </div>

    
  </div>

  <div class="footer-center">

    <div>
      <a> <i class="fa fa-map-marker"></i> </a>
      <p><a href="https://goo.gl/maps/DMvXHgVnhCbtkKZT6" target="_blank">г.Минск,ул. Калиновского 82/2</a></p>
    </div>

    <div>
      <i class="fa fa-mobile"></i>
      <p><a href="tel:+375297654924">+375 29 765-49-24</a></p>
    </div>

    <div>
      <i class="fa fa-envelope"></i>
      <p><a href="mailto:support@company.com" target="_blank">zebra-gor@yandex.by</a></p>
    </div>

  </div>

  <div class="footer-right">

    <p class="footer-company-about">
    Наши двери всегда открыты для всех желающих, независимо от пола и возраста.
    Работают группы младшего, среднего и старшего школьного возраста, группы для взрослых людей.
    Возможен вариант индивидуальных занятий под руководством действующих чемпионов по К-1 и Muay Thai.</p>

  </div>

</footer>


</div>

@stack('scripts')  
</html>