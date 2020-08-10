@extends('layouts.user.app')

@section('content')

<section id="blog-full-width">
    <div class="container">
        @foreach($data as $rows)
        <div class="row">
            <div class="col-md-12">
                <article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
                    <div class="blog-post-image">
                        <a href="post-fullwidth.html"><img class="img-responsive" style="height:400px; width:790px;" src="{{asset('image/'.$rows->cover)}}" alt="" /></a>
                    </div>
                    <div class="blog-content">
                        <h2 class="blogpost-title">
                        <a href="{{url('/article/'.$rows->slug)}}">{{$rows->title}}</a>
                        </h2>
                        <div class="blog-meta">
                            <span>{{$rows->created_at->format('Y-m-d')}}</span>
                            <span>by <a>
                                @if($rows->user->name == 'Super Admin')
                                    Admin
                                @else
                                    {{$rows->user->name}}
                                @endif
                            </a></span>
                        </div>
                        <p>{!! \Str::limit($rows->content, 45) !!}
                        </p>
                        <a href="{{url('article/'.$rows->slug)}}" class="btn btn-dafault btn-details">Continue Reading</a>
                    </div>
                </article>
            </div>
        </div>
        @endforeach
    </div>
</section>


@endsection