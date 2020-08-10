@extends('layouts.user.app')

@section('content')
<br>
<section class="single-post">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="post-img">
                    <img class="img-responsive" style="height:400px; width:790px;" src="{{asset('image/'.$post->cover)}}">
                </div>
                <div class="post-content">
                    <h3>{{$post->title}}</h3>
                    <br>
                    {!! $post->content !!}
                </div>
                
            </div>
        </div>
        
        {{-- Komentar --}}
        <div class="row">
            <div class="col-md-12">
                <div class="comments">
                @foreach($post->comments as $row)
                    <div class="media">
                        <a href="" class="pull-left">
                            <img alt="" src="{{asset('images/icon.png')}}" style="height:110px; width:100px;" class="media-object">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                            {{$row->email}}</h4>
                            <p class="text-muted">
                                {{$row->created_at->format('d-m-Y')}}
                            </p>
                            <p>
                                {{$row->comment}}
                            </p>
                            <a href="javascript:void(0)" onclick="balasKomentar({{ $row->id }}, '{{ $row->comment }}')">Reply</a>
                            <hr>
                            <!-- Nested media object -->
                            @foreach($row->child as $child)
                            <div class="media">
                                <a href="" class="pull-left">
                                    <img alt="" src="{{asset('images/icon.png')}}" style="height:110px; width:100px;" class="media-object">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                    {{$child->email}}</h4>
                                    <p class="text-muted">
                                        {{$child->created_at->format('d-m-Y')}}
                                    </p>
                                    <p>
                                        {{$child->comment}}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                            <!--end media-->
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="post-comment">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {!! session('success') !!}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {!! session('error') !!}
                        </div>
                    @endif

                    <h3>Leave a Reply</h3>
                    <form action="{{route('comment_article')}}" method="POST" role="form" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}" class="form-control">
                        <input type="hidden" name="parent_id" id="parent_id" class="form-control">
                        <div class="form-group">
                            <div class="col-lg-6">
                                <input type="email" name="email" class="col-lg-12 form-control" placeholder="Email">
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="col-lg-6" style="display:none;" id="formReplyComment">
                                <input type="text" id="replyComment" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <textarea class=" form-control" name="comment" rows="8" placeholder="Message" style="resize: none;"></textarea>
                            </div>
                        </div>
                        <p>
                        </p>
                        <p>
                            <button class="btn btn-send" type="submit">Comment</button>
                        </p>
                        
                        <p></p>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</section>  
@endsection