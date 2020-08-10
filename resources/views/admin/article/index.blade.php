@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Article Table</h1>
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4></h4>
                <div class="card-header-action">
                  <a href="{{route('article.add')}}" class="btn btn-secondary">Add Article</a>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                  @foreach($article as $rows)
                  <table class="table table-striped">
                    <tr>
                      <th>No</th>
                      <th>Title</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                    <tr>
                      <td><a href="#">{{$loop->iteration}}</a></td>
                      <td class="font-weight-600">{{$rows->title}}</td>
                      <td>
                        @if($rows->status == 0)
                        <div class="badge badge-warning">Draft</div>
                        @else 
                        <div class="badge badge-success">Published</div>
                        @endif
                      </td>
                      <td>{{$rows->created_at->format('Y-m-d')}}</td>
                      <td>
                        <form action="{{ url('/admin/article/' . $rows -> id . '/delete') }}" method="POST">
                          @csrf
                          <input type="hidden" name="_method" value="DELETE" class="form-control">
                            <a href="{{url('/admin/article/edit/'.$rows->id)}}" class="btn btn-primary">Edit</a>
                                                        
                            @if(auth()->user()->role == 0) 
                              <span class="btn btn-info" data-toggle="modal" data-target="#modal-status-{{ $rows->id }}">Change Status</span>
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')">Delete</button>
                              <a href="{{url('/admin/article/comment/'.$rows->id)}}" class="btn btn-light">Comment</a>
                            @endif

                        </form>
                      </td>
                    </tr>
                  </table>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- Modal Ubah Status Article -->
@foreach($article as $rows)
<div class="modal fade" id="modal-status-{{ $rows->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Ubah Status Article</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/admin/article/'. $rows->id .'/change_status' ) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                <select class="form-control" name="status">
                    <option {{ $rows->status == '0' ? 'selected':'' }} value="0">Draft</option>
                    <option {{ $rows->status == '1' ? 'selected':'' }} value="1">Published</option>
                </select>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-sm">Save changes</button>
        </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
@endforeach

@endsection