@extends('layouts.admin.app')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Add Arcticle</h1>
        </div>
        
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

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Form Add Article</h4>
                    </div>
                    <form action="{{ url('/admin/article/update/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT" class="form-control">
                    <div class="card-body">
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="title" class="form-control" value="{{ $data->title }}">
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                        <div class="col-sm-12 col-md-7">
                            <img src="{{ asset('image/' . $data->cover) }}" id="preview_cover" class="profile-user-img img-responsive" style="height: 150px; width: 150px; display: block;">
                            <input type="file" name="cover" class="form-control-file" id="image-cover">
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea name="content" id="content">{{$data->content}}</textarea>
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control" name="status">
                                <option {{ $data->status == '0' ? 'selected':'' }} value="0">Draft</option>
                                <option {{ $data->status == '1' ? 'selected':'' }} value="1">Published</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </section>

@endsection