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
@endpush

@push('styles')
    <link rel="stylesheet" href="{{asset('css\welcome.blade.css')}}"/>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="GalleryBody">

                    <h2 style="text-align:center">Галерея слайд-шоу</h2>

                        <div class="GalleryContainer">
                        <div class="GalleryMySlides">
                            <div class="GalleryNumberText">1 / 6</div>
                            <img src="#" style="width:100%">
                        </div>

                        <div class="GalleryMySlides">
                            <div class="GalleryNumberText">2 / 6</div>
                            <img src="#" style="width:100%">
                        </div>

                        <div class="GalleryMySlides">
                            <div class="GalleryNumberText">3 / 6</div>
                            <img src="#" style="width:100%">
                        </div>
                            
                        <div class="GalleryMySlides">
                            <div class="GalleryNumberText">4 / 6</div>
                            <img src="#" style="width:100%">
                        </div>

                        <div class="GalleryMySlides">
                            <div class="GalleryNumberText">5 / 6</div>
                            <img src="#" style="width:100%">
                        </div>
                            
                        <div class="GalleryMySlides">
                            <div class="GalleryNumberText">6 / 6</div>
                            <img src="#" style="width:100%">
                        </div>
                            
                        <a class="GalleryPrev" onclick="plusSlides(-1)">❮</a>
                        <a class="GalleryNext" onclick="plusSlides(1)">❯</a>

                        <div class="GalleryCaption-container">
                            <p id="GalleryCaption"></p>
                        </div>

                        <div class="GalleryRow">
                            <div class="GalleryColumn">
                            <img class="GalleryDemo GalleryCursor" src="1" style="width:100%" onclick="currentSlide(1)" alt="1">
                            </div>
                            <div class="GalleryColumn">
                            <img class="GalleryDemo GalleryCursor" src="2" style="width:100%" onclick="currentSlide(2)" alt="2">
                            </div>
                            <div class="GalleryColumn">
                            <img class="GalleryDemo GalleryCursor" src="3" style="width:100%" onclick="currentSlide(3)" alt="3">
                            </div>
                            <div class="GalleryColumn">
                            <img class="GalleryDemo GalleryCursor" src="4" style="width:100%" onclick="currentSlide(4)" alt="4">
                            </div>
                            <div class="GalleryColumn">
                            <img class="GalleryDemo GalleryCursor" src="5" style="width:100%" onclick="currentSlide(5)" alt="5">
                            </div>    
                            <div class="GalleryColumn">
                            <img class="GalleryDemo GalleryCursor" src="6" style="width:100%" onclick="currentSlide(6)" alt="6">
                            </div>
                        </div>`


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
