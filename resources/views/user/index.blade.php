@extends('layouts.user.app')

@section('content')
<!--
==================================================
Slider Section Start
================================================== -->
<section id="hero-area" >
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="block wow fadeInUp" data-wow-delay=".3s">
                <!-- Slider -->
                    <section class="cd-intro">
                        <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s" >
                            <span>Selamat Datang Di Website Content Management System</span><br>
                            <span class="cd-words-wrapper">
                                <b class="is-visible">Laravel</b>
                            </span>
                        </h1>
                    </section> <!-- cd-intro -->
                    <!-- /.slider -->
                    <h2 class="wow fadeInUp animated" data-wow-delay=".6s" >
                        With 10 years experience, I've occupied many roles including digital design director,<br> web designer and developer. This site showcases some of my work.
                    </h2>
                    <a class="btn btn-lines" data-wow-delay=".9s" href="{{url('/article')}}">Melihat Artikel</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#main-slider-->

@endsection