@extends('layouts.app')

@push('scripts')
    <script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
    showSlides(slideIndex += n);
    }

    function currentSlide(n) {
    showSlides(slideIndex = n);
    }

    function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("GalleryMySlides");
    var dots = document.getElementsByClassName("GalleryDemo");
    var captionText = document.getElementById("GalleryCaption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
    }
    </script>  
    
    <script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
</script> 


@endpush

@push('styles')
    <link rel="stylesheet" href="{{asset('css\welcome.blade.css')}}"/>
@endpush

@section('content')
<div class="wrapper bgded">
  <div id="pageintro" class="hoc clear"> 

    <article>
      <div class="overlay inspace-30 btmspace-30">
      <img class="round " src="{{ asset('/images/SinTyaoBuda.jpg') }}" alt="SinTyaoBuda"></a>

        <h2 class="heading">СК "Sin Tyao"</h2>
        <p>"Sin Tyao" — один из первых бойцовских клубов Беларуси, специализирующийся на восточных единоборствах.</p>
      </div>
      <footer>
        <ul class="nospace inline pushright">
          <li><a class="btn btn-primary" onclick="document.getElementById('subject').style.display='block'">Задать вопрос</a></li>
        </ul>
      </footer>
    </article>

  </div>
</div>


<!-- Цитаты великих боксеров -->

<div class="col-container">

  <div class="col" style="background: #FFFFFF; background-color: rgba(255,255,255,0.5); font-weight: 700;">
  <img src="{{ asset('/images/tys.png') }}" alt="Майк Тайсон" class="avatar">
    <h2>Майк Тайсон</h2>
    <p>«Некоторые парни сейчас слишком бизнес-ориентированы. Когда я дрался, мы не думали о том, останется ли у нас потом хоть доллар за душой»</p>
    <p>«Я много молюсь, но все равно попаду в ад за всё то, что сделал, но это не мешает мне радоваться жизни здесь и сейчас»</p>
    <p>«Лучше говорить с набитым ртом, чем молчать с выбитыми зубами»</p>    

  </div>

  <div class="col" style="background: #FFFFFF; background-color: rgba(255,255,255,0.5); font-weight: 700;">
  <img src="{{ asset('/images/roy.png') }}" alt="Рой Джонс" class="avatar">
    <h2>Рой Джонс</h2>
    <p>«Борись до конца, боль временна, триумф вечен!»</p>
    <p>«Великие тоже падают, но ты должен встать чего бы тебе это не стоило, и только после этого ты поймёшь, чего ты стоишь на самом деле»</p>
    <p>«Настоящие чемпионы – это те, кто, проиграв один бой, в следующем выходят и доказывают, что чего-то стоят»</p>

  </div>

  <div class="col" style="background: #FFFFFF; background-color: rgba(255,255,255,0.5); font-weight: 700;">
  <img src="{{ asset('/images/m_ali.png') }}" alt="Мухаммед Али" class="avatar">
    <h2>Мухаммед Али</h2>
    <p>«Чемпионами становятся не в спортивном зале. Чемпионами становятся от того, что есть глубоко внутри: желание, мечта, видение»</p>
    <p>«Я ненавидел каждую минуту тренировок, но я говорил себе: «Не уходи. Страдай сейчас и живи остаток жизни чемпионом»</p>
    <p>«Если вы мечтаете победить меня, вам лучше проснуться и попросить прощения»</p>   

  </div>

</div>

@endsection
