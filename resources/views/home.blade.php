@extends('adminlte::page')

@section('title', 'DL SHOES')

@section('content_header')
<h1>DL SHOES</h1>
@stop

@section('content')
@if($user->roles_id == 1)
<!-- Anda Login Sebagai Admin -->
<h4>SELAMAT DATANG ADMIN DI TOKO DL SHOES</h4>
@else
<!-- Anda Login Sebagai User -->
<h4>SELAMAT DATANG USER DI TOKO DL SHOES</h4>
@endif
<!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ '../vendor/adminlte/dist/img/adidas1.jpg' }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ '../vendor/adminlte/dist/img/adidas1.jpg' }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ '../vendor/adminlte/dist/img/adidas1.jpg' }}" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div> -->
<!-- Container for the image gallery -->
<div class="container-fluid">

    <!-- Full-width images with number text -->
    <div class="mySlides">
        <div class="numbertext">1 / 6</div>
        <img src="{{ '../vendor/adminlte/dist/img/adidas2.jpg' }}" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">2 / 6</div>
        <img src="{{ '../vendor/adminlte/dist/img/adidas3.jpg' }}" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">3 / 6</div>
        <img src="{{ '../vendor/adminlte/dist/img/puma1.jpg' }}" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">4 / 6</div>
        <img src="{{ '../vendor/adminlte/dist/img/puma2.jpg' }}" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">5 / 6</div>
        <img src="{{ '../vendor/adminlte/dist/img/puma3.jpg' }}" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">6 / 6</div>
        <img src="{{ '../vendor/adminlte/dist/img/vans4.jpeg' }}" style="width:100%">
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <!-- Image text -->
    <div class="caption-container">
        <p id="caption"></p>
    </div>

    <!-- Thumbnail images -->
    <div class="row">
        <div class="column">
            <img class="demo cursor" src="{{ '../vendor/adminlte/dist/img/pumaK1.jpg' }}" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
        </div>
        <div class="column">
            <img class="demo cursor" src="{{ '../vendor/adminlte/dist/img/vansK1.jpeg' }}" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
        </div>
        <div class="column">
            <img class="demo cursor" src="{{ '../vendor/adminlte/dist/img/vansK2.jpg' }}" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
        </div>
        <div class="column">
            <img class="demo cursor" src="{{ '../vendor/adminlte/dist/img/nikeK1.jpg' }}" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
        </div>
        <div class="column">
            <img class="demo cursor" src="{{ '../vendor/adminlte/dist/img/nikeK2.jpg' }}" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
        </div>
        <div class="column">
            <img class="demo cursor" src="{{ '../vendor/adminlte/dist/img/nikeK3.jpg' }}" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
        </div>
    </div>
</div>
@stop

@section('footer')
<div class="float-right d-none d-sm-block">
    <b>Version</b> 1.0.0
</div>
<strong>CopyRight &copy; {{date('Y')}}
    <a href="http://ft.unsur.ac.id/" target="_blank">Fakultas Teknik,
        Universitas Suryakancana</a>.</strong> All Right reserved
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    * {
        box-sizing: border-box;
    }

    /* Position the image container (needed to position the left and right arrows) */
    .container {
        position: relative;
    }

    /* Hide the images by default */
    .mySlides {
        display: none;
    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor {
        cursor: pointer;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 40%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* Container for image text */
    .caption-container {
        text-align: center;
        background-color: #222;
        padding: 2px 16px;
        color: white;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Six columns side by side */
    .column {
        float: left;
        width: 16.66%;
    }

    /* Add a transparency effect for thumnbail images */
    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }
</style>
@stop

@section('js')
<script>
    console.log('Hi!')
</script>
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>
@stop