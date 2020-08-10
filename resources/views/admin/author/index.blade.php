@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Author Table</h1>
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
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        @foreach($author as $row)
                        <tr>
                            <td><a href="#">{{$loop->iteration}}.</a></td>
                            <td class="font-weight-600">{{$row->name}}</td>
                            <td class="font-weight-600">{{$row->email}}</td>
                            <td>
                                @if($row->status == 1)
                                    <div class="badge badge-warning"><i class="fa fa-times" aria-hidden="true"></i></div>
                                @elseif($row->status == 0)
                                    <div class="badge badge-success"><i class="fa fa-check-square" aria-hidden="true"></i></div>
                                @endif
                            </td>
                            <td>July 19, 2018</td>
                            <td>
                                <form action="{{ url('/admin/author/' . $row -> id . '/delete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" class="form-control">
                                    <span class="btn btn-info" data-toggle="modal" data-target="#modal-status-{{ $row->id }}">Change Status</span>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>

<!-- Modal Ubah Status Author -->
@foreach($author as $rows)
<div class="modal fade" id="modal-status-{{ $rows->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Ubah Status Author</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/admin/author/'. $rows->id .'/change_status' ) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                <select class="form-control" name="status">
                    <option {{ $rows->status == '0' ? 'selected':'' }} value="0">Diterima</option>
                    <option {{ $rows->status == '1' ? 'selected':'' }} value="1">Menunggu</option>
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