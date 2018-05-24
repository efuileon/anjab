@extends('musjab.layoutLTE.app')
@section('isi')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Tables
    <small>advanced tables</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tables</a></li>
    <li class="active">Data tables</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Hover Data Table</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Golongan</th>
                <th>SKPD</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; ?>
              @foreach($pns as $list)
              <tr>
                <td>{{$i}}</td>
                <td>{{$list->PNS_NIPBARU}}</td>
                <td>{{$list->PNS_PNSNAM}}</td>
                <td>{{$list->PNS_GOLRU}}</td>
                <td>{{$list->PNS_UNOR}}</td>
              </tr>
              @endforeach
            </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->


    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
@stop
