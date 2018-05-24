@extends('pangkat.layoutLTE.app')
@section('isi')
<section class="content-header">
         <h1>
           Daftar Usulan Kenaikan Pangkat
         </h1>
</section>
<br>


          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                  <center><a href="{{url('pangkat/cetak_lampiran')}}" type="submit" class="btn btn-success"><i class="fa fa-print"></i> Cetak Lampiran</a></center><hr>
                <table id="example1" class="table table-bordered table-hover">

                                <thead>
                                  <th>No</th>
                                  <th>NIP</th>
                                  <th>Nama</th>
                                  <th>Jenis KP</th>
                                  <th>Dokumen Usulan </th>
                                  <th>Catatan</th>
                                  <th>Tambah <br>Catatan</th>


                                </thead>
                                <tbody>
                                  @php $i = 1 @endphp
                                  @foreach($ukp as $ukp)
                                  <tr>
                                  <td>{{$i}}</td>
                                  <td>{{$ukp->nip_baru}}</td>
                                  <td>{{nama($ukp->glr_dpn,$ukp->nama,$ukp->glr_blk)}}</td>
                                  @if($ukp->gol4==0)
                                  <td>{{$ukp->nm_jenis_kp}}</td>
                                  @else
                                  <td>{{$ukp->nm_jenis_kp}}<br>(KP Golongan IV/a Keatas)</td>
                                  @endif
                                  @php
                                  $berkas_cpns = \App\z_pangkat_b_cpns::where("id_usul","=",$ukp->id)->get();
                                  $berkas_pns = \App\z_pangkat_b_pns::where("id_usul","=",$ukp->id)->get();
                                  $berkas_pangkat = \App\z_pangkat_b_pangkat::where("id_usul","=",$ukp->id)->orderby("golongan","DESC")->get();
                                  $berkas_ijazah = \App\z_pangkat_b_ijazah::leftjoin("ijazahs","kd_ijazah","=","id_ijazah")->where("id_usul","=",$ukp->id)->orderby("id_ijazah","DESC")->get();
                                  $berkas_transkrip = \App\z_pangkat_b_transkrip::leftjoin("ijazahs","kd_ijazah","=","id_ijazah")->where("id_usul","=",$ukp->id)->orderby("id_ijazah","DESC")->get();
                                  $berkas_skp1 = \App\z_pangkat_b_skp::where("id_usul","=",$ukp->id)->where("tahun","=",session()->get('thn')-2)->get();
                                  $berkas_skp2 = \App\z_pangkat_b_skp::where("id_usul","=",$ukp->id)->where("tahun","=",session()->get('thn')-1)->get();
                                  $berkas_lain = \App\z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$ukp->id)->where("ket","=",1)->get();
                                  $berkas_pak = \App\z_pangkat_b_pak::where("id_usul","=",$ukp->id)->get();
                                  $berkas_jabfung = \App\z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$ukp->id)->where("kd_berkas","=",12)->get();
                                  $berkas_jabstruk = \App\z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$ukp->id)->where("kd_berkas","=",10)->get();
                                  $berkas_drj = \App\z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$ukp->id)->where("kd_berkas","=",11)->get();
                                  $berkas_uraian = \App\z_pangkat_b_lain::leftjoin("dok_lains","kd_berkas","=","id_dok")->where("id_usul","=",$ukp->id)->where("kd_berkas","=",17)->get();
                                  @endphp
                                  <td>
                                    @foreach($berkas_cpns as $berkas_cpns)
                                    <a href="{{asset($berkas_cpns->lokasi)}}">{{$berkas_cpns->filename}}</a><br>
                                    @endforeach
                                    @foreach($berkas_pns as $berkas_pns)
                                    <a href="{{asset($berkas_pns->lokasi)}}">{{$berkas_pns->filename}}</a><br>
                                    @endforeach
                                    @foreach($berkas_pangkat as $berkas_pangkat)
                                    <a href="{{asset($berkas_pangkat->lokasi)}}">{{$berkas_pangkat->filename}}</a><br>
                                    @endforeach
                                    @foreach($berkas_ijazah as $berkas_ijazah)
                                    <a href="{{asset($berkas_ijazah->lokasi)}}">{{$berkas_ijazah->filename}}</a><br>
                                    @endforeach
                                    @foreach($berkas_transkrip as $berkas_transkrip)
                                    <a href="{{asset($berkas_transkrip->lokasi)}}">{{$berkas_transkrip->filename}}</a><br>
                                    @endforeach
                                    @foreach($berkas_pak as $berkas_pak)
                                    <a href="{{asset($berkas_pak->lokasi)}}">{{$berkas_pak->filename}}</a><br>
                                    @endforeach
                                    @foreach($berkas_skp1 as $berkas_skp1)
                                    <a href="{{asset($berkas_skp1->lokasi)}}">{{$berkas_skp1->filename}}</a><br>
                                    @endforeach
                                    @foreach($berkas_skp2 as $berkas_skp2)
                                    <a href="{{asset($berkas_skp2->lokasi)}}">{{$berkas_skp2->filename}}</a><br>
                                    @endforeach
                                    @foreach($berkas_jabfung as $berkas_jabfung)
                                    <a href="{{asset($berkas_jabfung->lokasi)}}">{{$berkas_jabfung->filename}}</a><br>
                                    @endforeach
                                    @foreach($berkas_jabstruk as $berkas_jabstruk)
                                    <a href="{{asset($berkas_jabstruk->lokasi)}}">{{$berkas_jabstruk->filename}}</a><br>
                                    @endforeach
                                    @foreach($berkas_drj as $berkas_drj)
                                    <a href="{{asset($berkas_drj->lokasi)}}">{{$berkas_drj->filename}}</a><br>
                                    @endforeach
                                    @foreach($berkas_uraian as $berkas_uraian)
                                    <a href="{{asset($berkas_uraian->lokasi)}}">{{$berkas_uraian->filename}}</a><br>
                                    @endforeach
                                    @foreach($berkas_lain as $berkas_lain)
                                    <a href="{{asset($berkas_lain->lokasi)}}">{{$berkas_lain->filename}}</a><br>
                                    @endforeach
                                  </td>
                                  <td>{{$ukp->catatan}}</td>
                                  <td><a href="#editModal" class='btn btn-success' data-id="{{$ukp->id}}" data-toggle='modal'><i class="fa fa-plus"></i><i class="fa fa-edit"></i></a></td>
                                  @php $i++ @endphp
                                  @endforeach
                                </tbody>
                            </table>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />


          </div>
        </div>
      </div>
      </div>

      <div class="modal fade" id="editModal" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Isi Catatan Apabila diperlukan</h4>
                      </div>
                      <div class="modal-body">
                          <div class="fetched-data"></div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                      </div>
                  </div>
              </div>
          </div>
          <meta name="_token" content="{!! csrf_token() !!}" />

      <script type="text/javascript">
      $(document).ready(function(){
          $('#editModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
              $.ajax({
                  type : 'get',
                  url : '{{url('pangkat/isi_catatan')}}/'+ rowid,
                  success : function(data){
                  $('.fetched-data').html(data);//menampilkan data ke dalam modal
                  }
              });
           });

        $('a.show').click (function() {
            $("[data-widget='collapse']").click();
         });

      });
      </script>

@stop
