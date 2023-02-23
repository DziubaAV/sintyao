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

                            @foreach($media_arr as $key=>$value)
                        <div class="GalleryMySlides">                           
                            <img src="{{ asset($value) }}" class="catalog-img">
                            <div class="GalleryOverlay">
                                <a href="{{ asset('catalog_one/'.$key) }}" class="btn btn-primary">{{ $catalog_arr[$key] }}</a>
                            </div>
                            
                        </div>
                            @endforeach
                        
                            
                        <a class="GalleryPrev" onclick="plusSlides(-1)">❮</a>
                        <a class="GalleryNext" onclick="plusSlides(1)">❯</a>

                        <!-- <div class="GalleryCaption-container">
                            <p id="GalleryCaption"></p>
                        </div> -->

                        <div class="GalleryRow">
                        @foreach($media_arr as $key=>$value)

                            <div class="GalleryColumn">
                            <img class="GalleryDemo GalleryCursor catalog-img" src="{{ asset($value) }}" onclick="currentSlide({{$key}})" alt="{{$key}}">
                            </div>

                        @endforeach

                        </div>`


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
