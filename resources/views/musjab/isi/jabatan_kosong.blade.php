@extends('musjab.layoutLTE.app')
@section('isi')
<section class="content-header">
         <h1>
           Data Jabatan Yang Masih Belum Terisi
           <small>Pejabat Struktural</small>
         </h1>
</section>
<br>
<div class="row">
  <div class="col-md-12">
     <div class="box box-danger">
       <div class="box-header with-border">
         <h3 class="box-title"><span class ="badge bg-purple">Total Jabatan Kosong</span> &nbsp <span class ="badge bg-purple">{{count($total)}}</span></h3><br>
         <div class="box-tools pull-right">
           <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
         </div><!-- /.box-tools -->
       </div><!-- /.box-header -->
       <div class="box-body">
         @foreach($jum_esl as $jum_esl)
         <span class= "{{warna_esl($jum_esl->eselon)}}">{{$jum_esl->NM_ESELON}}</span> &nbsp <span class= "{{warna_esl($jum_esl->eselon)}}">{{$jum_esl->jum}}</span>&nbsp &nbsp &nbsp &nbsp
         @endforeach
       </div><!-- /.box-body -->
     </div><!-- /.box -->
   </div><!-- /.col -->
</div>
<hr>
<?php $i =0; ?>

@foreach($unker_kosong as $unker_kosong)
<?php
$list = DB::table('unor_alls')->leftjoin('eselons','eselon','=','KD_ESELON')->where('UNIT_KERJA','=',$unker_kosong->UNIT_KERJA)->where('NIP_PJB','=',null)->where('mulai_berlaku','=','2017-01-01')->where('eselon','<>','')->orderby('KD_UNOR')->get();
$jumlah = DB::table('unor_alls')->selectRaw('eselon,NM_ESELON,count(*) as jum')->leftjoin('eselons','eselon','=','KD_ESELON')->where('UNIT_KERJA','=',$unker_kosong->UNIT_KERJA)->where('NIP_PJB','=',null)->where('mulai_berlaku','=','2017-01-01')->where('eselon','<>','')->groupby('NM_ESELON')->get();
?>
@if($i==2 || $i == 0)
<div class="row">
@endif
  <div class="col-md-6">
     <div class="box box-warning collapsed-box">
       <div class="box-header with-border">
         <h3 class="box-title">{{$unker_kosong->UNIT_KERJA}}</h3><br>
         @foreach($jumlah as $jumlah)
         <span class= "{{warna_esl($jumlah->eselon)}}">{{$jumlah->NM_ESELON}}</span> &nbsp <span class= "{{warna_esl($jumlah->eselon)}}">{{$jumlah->jum}}</span>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
         @endforeach
         <div class="box-tools pull-right">
           <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
         </div><!-- /.box-tools -->
       </div><!-- /.box-header -->
       <div class="box-body">
         <table class="table table-striped">

           @foreach($list as $list)
           <tr>
            <td style="width: 400px">{{$list->NM_JAB}}</td>
            <td><span class= "{{warna_esl($list->eselon)}}">{{$list->NM_ESELON}}</span></td>
           </tr>
           @endforeach
         </table>
       </div><!-- /.box-body -->
     </div><!-- /.box -->
   </div><!-- /.col -->

<?php $i++; ?>
@if($i==2 || $i == 0)
 </div><!-- /.row -->
<?php $i =0; ?>
 @endif
@endforeach

@stop
