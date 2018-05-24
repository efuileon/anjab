@extends('latihan.app')

{{-- data akan ditampilkan di resources/views/layouts/app.blade.php --}}
@section('content')
    <div class="panel"><button id="btn_add" name="btn_add" class="btn btn-primary">Tambah Tag</button></div>

    <div class="panel panel-primary">

        <div class="panel-heading">Laravel dan Ajax CRUD Keren oleh ArsipTI.com </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Tag</th>
                    <th>Slug</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="tags-list" name="tags-list">
                @foreach ($tags as $tag)
                    <tr id="tag{{$tag->id}}">
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->tagname}}</td>
                        <td>{{$tag->slug}}</td>
                        <td>
                            <button class="btn btn-warning btn-detail open_modal" value="{{$tag->id}}">Edit</button>
                            <button class="btn btn-danger btn-delete delete-tag" value="{{$tag->id}}">Hapus</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Input Tag</h4>
                </div>
                <div class="modal-body">
                    <form id="frmTags" name="frmTags" class="form-horizontal" novalidate="">
                        <div class="form-group error">
                            <label for="inputName" class="col-sm-3 control-label">Nama Tag</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="tagname" name="tagname" placeholder="Nama Tag" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDetail" class="col-sm-3 control-label">Slug</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" value="add">Simpan</button>
                    <input type="hidden" id="tag_id" name="tag_id" value="0">
                </div>
            </div>
        </div>
    </div>
    <meta name="_token" content="{!! csrf_token() !!}" />
@endsection