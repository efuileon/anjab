@extends('pangkat.layoutLTE.app')
@section('isi')
<section class="content-header">
         <h1>
           DATA SAPK
           <small>{{$pns->nip_baru}} / {{$pns->nama}}</small>
         </h1>
</section>
<br>
           <div class="row">
            <div class="col-md-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="{{url('pangkat/admin/verifpns')."/".$pns->id}}" aria-expanded="true">Upload berkas</a></li>
                  <li class=""><a href="{{url('pangkat/admin/verif_berkas')."/".$pns->id}}" aria-expanded="false">Cek berkas</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active">

                    <div class="box box-success">
                      <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>

                      <!-- form start -->
                        <div class="box-body">
                          <table class="table table-condensed">
                              <tbody>
                              <tr>
                                <th style="width: 200px">NIP</th>
                                <td style="width: 300px">{{$pns->nip_baru}}</td>
                                <th style="width: 200px">Jabatan Struktural</th>
                                <td style="width: 300px">{{$pns->nm_jabstruk}}</td>
                              </tr>
                              <tr>
                                <th>Nama</th>
                                <td>{{nama($pns->glr_dpn,$pns->nama,$pns->glr_blk)}}</td>
                                <th>Jabatan fungsional Tertentu</th>
                                <td>{{$pns->nm_jft}}</td>
                              </tr>
                              <tr>
                                <th>Tempat, tgl lahir</th>
                                <td>{{$pns->tempat_lahir.", ".tgl_indo($pns->tgl_lahir)}}</td>
                                <th>Jabatan fungisonal Umum</th>
                                <td>{{$pns->nm_jfu}}</td>
                              </tr>
                              <tr>
                                <th>Pendidikan</th>
                                <td>{{$pns->pendidikan." / ".date("Y",strtotime($pns->lulus))}}</td>
                                <th>Unit Kerja</th>
                                <td>{{$pns->unit_kerja}}<br>{{$pns->unit_kerja_induk}}</td>

                              </tr>
                              <tr>
                                <th>Gol / TMT</th>
                                <td>{{$pns->gol_akhir." -- ".tgl_indo($pns->tmt_gol)}}</td>
                                <th>Masa kerja</th>
                                <td>{{$pns->maker_th." tahun ".$pns->maker_bl." bulan"}}</td>
                              </tr>

                            </tbody></table>

                        </div><!-- /.box-body -->

                    </div>

                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
              @if(count($errors))
                <div class="alert alert-danger">
                  <strong>Whoops!</strong> Anda Salah memasukkan input.
                  <br/>
                  <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif

              @if(Session::has('alert-success'))
                              <div class="alert alert-success">
                                  <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                              </div>
              @endif
              @if(Session::has('alert-failed'))
                              <div class="alert alert-danger">
                                  <strong>{{ \Illuminate\Support\Facades\Session::get('alert-failed') }}</strong>
                              </div>
              @endif


            </div>
            <div class="col-md-12">
                        <div class="box box-danger">
                          <div class="box-body">
                            <table class="table table-bordered">
                                <tr>
                                <td><b>Catatan OPD : </><br>
                                {{$pns->catatan}}</td>
                                <td>
                                  <form role="form" action="{{url('pangkat/admin/verif_catat')}}" method="post" enctype="multipart/form-data">
                                  Isi Catatan Bila Ditolak (Verifikator BKPSDM)<br>
                                  <textarea name="catat_ver" style="width:400px;height:70px;"></textarea>
                                  <input type="hidden" name="id" value="{{$pns->id}}" />
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                </td>
                                <td style="width: 100px">Aksi :<br>
                                  <button type="submit" class="btn btn-warning"><i class="fa fa-close"></i> Ditolak</button>
                                </form>
                                  <a href="{{url('pangkat/admin/verif_ok')."/".$pns->id}}" class="btn btn-primary"><i class="fa fa-thumbs-o-up"></i> Disetujui</a>
                                </td>

                              </tr>
                            </table>
                              </div>
                            </div>
                          </div>
              <div class="col-md-12">
                          <div class="box box-warning">
                            <div class="box-body">
                              <table class="table table-bordered">
                                <tbody><tr>
                                  <th style="width: 10px">#</th>
                                  <th>Jenis Berkas</th>
                                  <th>nama file</th>
                                  <th style="width: 100px">status</th>
                                  <th style="width: 100px">Catatan</th>
                                  <th style="width: 40px">upload</th>
                                  <th style="width: 40px" colspan="2">Verifikasi</th>
                                  <th style="width: 40px" colspan="2">Verifikasi</th>

                                </tr>
                                <tr>
                                  @php $i=1 @endphp
                                  <td>{{$i}}</td>
                                  <td>SK CPNS</td>
                                  <td>
                                    @foreach($berkas_cpns as $b_cpns)
                                    <a href="{{asset($b_cpns->lokasi)}}">{{$b_cpns->filename}}</a>
                                    @endforeach
                                  </td>
                                  <td>@if (count($berkas_cpns)==0) {{"Tidak ada"}} @else {{"Ada"}} @endif</td>
                                  <td>
                                    @foreach($berkas_cpns as $b_cpns)
                                    {{$b_cpns->catat_ver}}
                                    @endforeach
                                  </td>
                                  @if (count($berkas_cpns)==0)
                                  <td><a href="{{url('pangkat/berkas_cpns')."/add/".$pns->id}}" class="btn btn-warning"><i class="fa fa-upload"></i> </a></td>
                                  @else
                                  <td><a href="{{url('pangkat/berkas_cpns')."/edit/".$berkas_cpns[0]->id}}" class="btn btn-success"><i class="fa fa-edit"></i> </a></td>
                                  @endif
                                  @foreach($berkas_cpns as $b_cpns)
                                  <td><a href="{{url('pangkat/admin/berkas/ok')."/z_pangkat_b_cpns/".$b_cpns->id}}" class="btn btn-primary"><i class="fa fa-check"></i> </a></td>
                                  <td><a href="#berkasModal" data-id="{{$b_cpns->id}}" data-berkas="z_pangkat_b_cpns" data-toggle='modal' class="btn btn-warning"><i class="fa fa-close"></i> </a></td>
                                  @if($b_cpns->stat_ver == "")
                                  @elseif($b_cpns->stat_ver == "OK")
                                  <td><span class='badge bg-blue'><i class="fa fa-thumbs-up"></i></span></td>
                                  @else
                                  <td><span class='badge bg-red'><i class="fa fa-close"></i></span></td>
                                  @endif
                                  @endforeach
                                </tr>
                                <tr>
                                  @php $i++ @endphp
                                  <td>{{$i}}</td>
                                  <td>SK PNS</td>
                                  <td>
                                    @foreach($berkas_pns as $b_pns)
                                    <a href="{{asset($b_pns->lokasi)}}">{{$b_pns->filename}}</a>
                                    @endforeach
                                  </td>
                                  <td>@if (count($berkas_pns)==0) {{"Tidak ada"}} @else {{"Ada"}} @endif</td>
                                  <td>
                                    @foreach($berkas_pns as $b_pns)
                                    {{$b_pns->catat_ver}}
                                    @endforeach
                                  </td>
                                  @if (count($berkas_pns)==0)
                                  <td><a href="{{url('pangkat/berkas_pns')."/add/".$pns->id}}" class="btn btn-warning"><i class="fa fa-upload"></i> </a></td>
                                  @else
                                  <td><a href="{{url('pangkat/berkas_pns')."/edit/".$berkas_pns[0]->id}}" class="btn btn-success"><i class="fa fa-edit"></i> </a></td>
                                  @endif
                                  @foreach($berkas_pns as $b_pns)
                                  <td><a href="{{url('pangkat/admin/berkas/ok')."/z_pangkat_b_pns/".$b_pns->id}}" class="btn btn-primary"><i class="fa fa-check"></i> </a></td>
                                  <td><a href="#berkasModal" data-id="{{$b_pns->id}}" data-berkas="z_pangkat_b_pns" data-toggle='modal' class="btn btn-warning"><i class="fa fa-close"></i> </a></td>
                                  @if($b_pns->stat_ver == "")
                                  @elseif($b_pns->stat_ver == "OK")
                                  <td><span class='badge bg-blue'><i class="fa fa-thumbs-up"></i></span></td>
                                  @else
                                  <td><span class='badge bg-red'><i class="fa fa-close"></i></span></td>
                                  @endif
                                  @endforeach
                                </tr>
                                @php $i++ @endphp
                                @foreach($berkas_pangkat as $b_pangkat)
                                <tr>
                                  <td>{{$i}}</td>
                                  <td>SK Pangkat</td>
                                  <td>
                                    <a href="{{asset($b_pangkat->lokasi)}}">{{$b_pangkat->filename}}</a><br>
                                  </td>
                                  <td>@if (count($berkas_pangkat)==0) {{"Tidak ada"}} @else {{"Ada"}} @endif</td>
                                  <td>
                                    {{$b_pangkat->catat_ver}}
                                  </td>
                                @if (count($berkas_pangkat)==0)
                                  <td><a href="{{url('pangkat/list_kp')."/".$pns->id}}" class="btn btn-warning"><i class="fa fa-upload"></i> </a></td>
                                  @else
                                  <td><a href="{{url('pangkat/list_kp')."/".$pns->id}}" class="btn btn-success"><i class="fa fa-edit"></i> </a></td>
                                  @endif
                                  <td><a href="{{url('pangkat/admin/berkas/ok')."/z_pangkat_b_pangkat/".$b_pangkat->id}}" class="btn btn-primary"><i class="fa fa-check"></i> </a></td>
                                  <td><a href="#berkasModal" data-id="{{$b_pangkat->id}}" data-berkas="z_pangkat_b_pangkat" data-toggle='modal' class="btn btn-warning"><i class="fa fa-close"></i> </a></td>
                                  @if($b_pangkat->stat_ver == "")
                                  @elseif($b_pangkat->stat_ver == "OK")
                                  <td><span class='badge bg-blue'><i class="fa fa-thumbs-up"></i></span></td>
                                  @else
                                  <td><span class='badge bg-red'><i class="fa fa-close"></i></span></td>
                                  @endif
                                </tr>
                                @endforeach
                                @php $i++ @endphp
                                @foreach($berkas_ijazah as $b_ijazah)
                                <tr>
                                  <td>{{$i}}</td>
                                  <td>Ijazah</td>
                                  <td>
                                    <a href="{{asset($b_ijazah->lokasi)}}">{{$b_ijazah->filename}}</a><br>
                                  </td>
                                  <td>@if (count($berkas_ijazah)==0) {{"Tidak ada"}} @else {{"Ada"}} @endif</td>
                                  <td>
                                    {{$b_ijazah->catat_ver}}
                                  </td>
                                  @if (count($berkas_ijazah)==0)
                                  <td><a href="{{url('pangkat/list_ijazah')."/".$pns->id}}" class="btn btn-warning"><i class="fa fa-upload"></i> </a></td>
                                  @else
                                  <td><a href="{{url('pangkat/list_ijazah')."/".$pns->id}}" class="btn btn-success"><i class="fa fa-edit"></i> </a></td>
                                  @endif
                                  <td><a href="{{url('pangkat/admin/berkas/ok')."/z_pangkat_b_ijazah/".$b_ijazah->id}}" class="btn btn-primary"><i class="fa fa-check"></i> </a></td>
                                  <td><a href="#berkasModal" data-id="{{$b_ijazah->id}}" data-berkas="z_pangkat_b_ijazah" data-toggle='modal' class="btn btn-warning"><i class="fa fa-close"></i> </a></td>
                                  @if($b_ijazah->stat_ver == "")
                                  @elseif($b_ijazah->stat_ver == "OK")
                                  <td><span class='badge bg-blue'><i class="fa fa-thumbs-up"></i></span></td>
                                  @else
                                  <td><span class='badge bg-red'><i class="fa fa-close"></i></span></td>
                                  @endif
                                </tr>
                                @endforeach
                                @php $i++ @endphp
                                @foreach($berkas_transkrip as $b_transkrip)
                                <tr>
                                  <td>{{$i}}</td>
                                <td>Transkrip</td>
                                <td>
                                  <a href="{{asset($b_transkrip->lokasi)}}">{{$b_transkrip->filename}}</a><br>
                                </td>
                                <td>@if (count($berkas_transkrip)==0) {{"Tidak ada"}} @else {{"Ada"}} @endif</td>
                                <td>
                                  {{$b_transkrip->catat_ver}}
                                </td>
                                @if (count($berkas_transkrip)==0)
                                <td><a href="{{url('pangkat/list_transkrip')."/".$pns->id}}" class="btn btn-warning"><i class="fa fa-upload"></i> </a></td>
                                @else
                                <td><a href="{{url('pangkat/list_transkrip')."/".$pns->id}}" class="btn btn-success"><i class="fa fa-edit"></i> </a></td>
                                @endif
                                <td><a href="{{url('pangkat/admin/berkas/ok')."/z_pangkat_b_transkrip/".$b_transkrip->id}}" class="btn btn-primary"><i class="fa fa-check"></i> </a></td>
                                <td><a href="#berkasModal" data-id="{{$b_transkrip->id}}" data-berkas="z_pangkat_b_transkrip" data-toggle='modal' class="btn btn-warning"><i class="fa fa-close"></i> </a></td>
                                @if($b_transkrip->stat_ver == "")
                                @elseif($b_transkrip->stat_ver == "OK")
                                <td><span class='badge bg-blue'><i class="fa fa-thumbs-up"></i></span></td>
                                @else
                                <td><span class='badge bg-red'><i class="fa fa-close"></i></span></td>
                                @endif
                              </tr>
                              @endforeach

                              @if($pns->jenis_kp=="2" || $pns->jenis_kp=="5")
                              <tr>
                                @php $i++ @endphp
                                <td>{{$i}}</td>
                                <td>SK Jabatan Fungsional<sup style="color:red;">(*boleh dikosongi dan dilampirkan sesuai ketentuan)</sup></td>
                                <td>

                                  @foreach($berkas_jabfung as $b_jabfung)
                                  <a href="{{asset($b_jabfung->lokasi)}}">{{$b_jabfung->filename}}</a>
                                  @endforeach
                                </td>
                                <td>@if (count($berkas_jabfung)==0) {{"Tidak ada"}} @else {{"Ada"}} @endif</td>
                                <td>
                                  @foreach($berkas_jabfung as $b_jabfung)
                                  {{$b_jabfung->catat_ver}}
                                  @endforeach
                                </td>
                                @if (count($berkas_jabfung)==0)
                                <td><a href="#tambahJabfung" class="btn btn-warning" data-toggle='modal'><i class="fa fa-upload"></i> </a></td>
                                @else
                                <td><a href="#editJabfung" data-id="{{$b_jabfung->id}}" class="btn btn-success" data-toggle='modal'><i class="fa fa-edit"></i> </a></td>
                                @endif
                                @foreach($berkas_jabfung as $b_jabfung)
                                <td><a href="{{url('pangkat/admin/berkas/ok')."/z_pangkat_b_lain/".$b_jabfung->id}}" class="btn btn-primary"><i class="fa fa-check"></i> </a></td>
                                <td><a href="#berkasModal" data-id="{{$b_jabfung->id}}" data-berkas="z_pangkat_b_lain" data-toggle='modal' class="btn btn-warning"><i class="fa fa-close"></i> </a></td>
                                @if($b_jabfung->stat_ver == "")
                                @elseif($b_jabfung->stat_ver == "OK")
                                <td><span class='badge bg-blue'><i class="fa fa-thumbs-up"></i></span></td>
                                @else
                                <td><span class='badge bg-red'><i class="fa fa-close"></i></span></td>
                                @endif
                                @endforeach

                              </tr>

                              @php $i++ @endphp
                              @foreach($berkas_pak as $b_pak)
                              <tr>
                                <td>{{$i}}</td>
                              <td>PAK</td>
                              <td>
                                <a href="{{asset($b_pak->lokasi)}}">{{$b_pak->filename}}</a><br>
                              </td>
                              <td>@if (count($berkas_pak)==0) {{"Tidak ada"}} @else {{"Ada"}} @endif</td>
                              <td>
                                {{$b_pak->catat_ver}}
                              </td>
                              @if (count($berkas_pak)==0)
                              <td><a href="{{url('pangkat/list_pak')."/".$pns->id}}" class="btn btn-warning"><i class="fa fa-upload"></i> </a></td>
                              @else
                              <td><a href="{{url('pangkat/list_pak')."/".$pns->id}}" class="btn btn-success"><i class="fa fa-edit"></i> </a></td>
                              @endif
                              <td><a href="{{url('pangkat/admin/berkas/ok')."/z_pangkat_b_pak/".$b_pak->id}}" class="btn btn-primary"><i class="fa fa-check"></i> </a></td>
                              <td><a href="#berkasModal" data-id="{{$b_pak->id}}" data-berkas="z_pangkat_b_pak" data-toggle='modal' class="btn btn-warning"><i class="fa fa-close"></i> </a></td>
                              @if($b_pak->stat_ver == "")
                              @elseif($b_pak->stat_ver == "OK")
                              <td><span class='badge bg-blue'><i class="fa fa-thumbs-up"></i></span></td>
                              @else
                              <td><span class='badge bg-red'><i class="fa fa-close"></i></span></td>
                              @endif

                            </tr>
                            @endforeach
                            @endif
                            @if($pns->jenis_kp=="3")
                            <tr>
                              @php $i++ @endphp
                              <td>{{$i}}</td>
                              <td>SK Jabatan Struktural</td>
                              <td>

                                @foreach($berkas_jabstruk as $b_jabstruk)
                                <a href="{{asset($b_jabstruk->lokasi)}}">{{$b_jabstruk->filename}}</a>
                                @endforeach
                              </td>
                              <td>@if (count($berkas_jabstruk)==0) {{"Tidak ada"}} @else {{"Ada"}} @endif</td>
                              <td>
                                @foreach($berkas_jabstruk as $b_jabstruk)
                                {{$b_jabstruk->catat_ver}}
                                @endforeach
                              </td>
                              @if (count($berkas_jabstruk)==0)
                              <td><a href="#tambahJabstruk" class="btn btn-warning" data-toggle='modal'><i class="fa fa-upload"></i> </a></td>
                              @else
                              <td><a href="#editJabstruk" data-id="{{$b_jabstruk->id}}" class="btn btn-success" data-toggle='modal'><i class="fa fa-edit"></i> </a></td>
                              @endif
                              @foreach($berkas_jabstruk as $b_jabstruk)
                              <td><a href="{{url('pangkat/admin/berkas/ok')."/z_pangkat_b_lain/".$b_jabstruk->id}}" class="btn btn-primary"><i class="fa fa-check"></i> </a></td>
                              <td><a href="#berkasModal" data-id="{{$b_jabstruk->id}}" data-berkas="z_pangkat_b_lain" data-toggle='modal' class="btn btn-warning"><i class="fa fa-close"></i> </a></td>
                              @if($b_jabstruk->stat_ver == "")
                              @elseif($b_jabstruk->stat_ver == "OK")
                              <td><span class='badge bg-blue'><i class="fa fa-thumbs-up"></i></span></td>
                              @else
                              <td><span class='badge bg-red'><i class="fa fa-close"></i></span></td>
                              @endif
                              @endforeach

                            </tr>
                            <tr>
                              @php $i++ @endphp
                              <td>{{$i}}</td>
                              <td>Daftar Riwayat Jabatan</td>
                              <td>

                                @foreach($berkas_drj as $b_drj)
                                <a href="{{asset($b_drj->lokasi)}}">{{$b_drj->filename}}</a>
                                @endforeach
                              </td>
                              <td>@if (count($berkas_drj)==0) {{"Tidak ada"}} @else {{"Ada"}} @endif</td>
                              <td>
                                @foreach($berkas_drj as $b_drj)
                                {{$b_drj->catat_ver}}
                                @endforeach
                              </td>
                              @if (count($berkas_drj)==0)
                              <td><a href="#tambahDrj" class="btn btn-warning" data-toggle='modal'><i class="fa fa-upload"></i> </a></td>
                              @else
                              <td><a href="#editDrj" data-id="{{$b_drj->id}}" class="btn btn-success" data-toggle='modal'><i class="fa fa-edit"></i> </a></td>
                              @endif
                              @foreach($berkas_drj as $b_drj)
                              <td><a href="{{url('pangkat/admin/berkas/ok')."/z_pangkat_b_lain/".$b_drj->id}}" class="btn btn-primary"><i class="fa fa-check"></i> </a></td>
                              <td><a href="#berkasModal" data-id="{{$b_drj->id}}" data-berkas="z_pangkat_b_lain" data-toggle='modal' class="btn btn-warning"><i class="fa fa-close"></i> </a></td>
                              @if($b_drj->stat_ver == "")
                              @elseif($b_drj->stat_ver == "OK")
                              <td><span class='badge bg-blue'><i class="fa fa-thumbs-up"></i></span></td>
                              @else
                              <td><span class='badge bg-red'><i class="fa fa-close"></i></span></td>
                              @endif
                              @endforeach

                            </tr>

                          @endif
                          @if($pns->jenis_kp=="4" || $pns->jenis_kp=="5")
                          <tr>
                            @php $i++ @endphp
                            <td>{{$i}}</td>
                            <td>Uraian Tugas</td>
                            <td>

                              @foreach($berkas_uraian as $b_uraian)
                              <a href="{{asset($b_uraian->lokasi)}}">{{$b_uraian->filename}}</a>
                              @endforeach
                            </td>
                            <td>@if (count($berkas_uraian)==0) {{"Tidak ada"}} @else {{"Ada"}} @endif</td>
                            <td>
                              @foreach($berkas_uraian as $b_uraian)
                              {{$b_uraian->catat_ver}}
                              @endforeach
                            </td>
                            @if (count($berkas_uraian)==0)
                            <td><a href="#tambahUraian" class="btn btn-warning" data-toggle='modal'><i class="fa fa-upload"></i> </a></td>
                            @else
                            <td><a href="#editUraian" data-id="{{$b_uraian->id}}" class="btn btn-success" data-toggle='modal'><i class="fa fa-edit"></i> </a></td>
                            @endif
                            @foreach($berkas_uraian as $b_uraian)
                            <td><a href="{{url('pangkat/admin/berkas/ok')."/z_pangkat_b_lain/".$b_uraian->id}}" class="btn btn-primary"><i class="fa fa-check"></i> </a></td>
                            <td><a href="#berkasModal" data-id="{{$b_uraian->id}}" data-berkas="z_pangkat_b_lain" data-toggle='modal' class="btn btn-warning"><i class="fa fa-close"></i> </a></td>
                            @if($b_uraian->stat_ver == "")
                            @elseif($b_uraian->stat_ver == "OK")
                            <td><span class='badge bg-blue'><i class="fa fa-thumbs-up"></i></span></td>
                            @else
                            <td><span class='badge bg-red'><i class="fa fa-close"></i></span></td>
                            @endif
                            @endforeach

                          </tr>

                        @endif

                              @php $i++ @endphp
                              <td>{{$i}}</td>
                              <td>SKP {{session()->get('thn')-2}}</td>
                              <td>
                                @foreach($berkas_skp1 as $b_skp1)
                                <a href="{{asset($b_skp1->lokasi)}}">{{$b_skp1->filename}}</a>
                                @endforeach
                              </td>
                              <td>@if (count($berkas_skp1)==0) {{"Tidak ada"}} @else {{"Ada"}} @endif</td>
                              <td>
                                @foreach($berkas_skp1 as $b_skp1)
                                {{$b_skp1->catat_ver}}
                                @endforeach
                              </td>
                              @if (count($berkas_skp1)==0)
                              <td><a href="{{url('pangkat/berkas_skp1')."/add/".$pns->id}}" class="btn btn-warning"><i class="fa fa-upload"></i> </a></td>
                              @else
                              <td><a href="{{url('pangkat/berkas_skp1')."/edit/".$berkas_skp1[0]->id}}" class="btn btn-success"><i class="fa fa-edit"></i> </a></td>
                              @endif
                              @foreach($berkas_skp1 as $b_skp1)
                              <td><a href="{{url('pangkat/admin/berkas/ok')."/z_pangkat_b_skp/".$b_skp1->id}}" class="btn btn-primary"><i class="fa fa-check"></i> </a></td>
                              <td><a href="#berkasModal" data-id="{{$b_skp1->id}}" data-berkas="z_pangkat_b_skp" data-toggle='modal' class="btn btn-warning"><i class="fa fa-close"></i> </a></td>
                              @if($b_skp1->stat_ver == "")
                              @elseif($b_skp1->stat_ver == "OK")
                              <td><span class='badge bg-blue'><i class="fa fa-thumbs-up"></i></span></td>
                              @else
                              <td><span class='badge bg-red'><i class="fa fa-close"></i></span></td>
                              @endif
                              @endforeach
                            </tr>
                            <tr>
                              @php $i++ @endphp
                              <td>{{$i}}</td>
                            <td>SKP {{session()->get('thn')-1}}</td>
                            <td>
                              @foreach($berkas_skp2 as $b_skp2)
                              <a href="{{asset($b_skp2->lokasi)}}">{{$b_skp2->filename}}</a>
                              @endforeach
                            </td>
                            <td>@if (count($berkas_skp2)==0) {{"Tidak ada"}} @else {{"Ada"}} @endif</td>
                            <td>
                              @foreach($berkas_skp2 as $b_skp2)
                              {{$b_skp2->catat_ver}}
                              @endforeach
                            </td>
                            @if (count($berkas_skp2)==0)
                            <td><a href="{{url('pangkat/berkas_skp2')."/add/".$pns->id}}" class="btn btn-warning"><i class="fa fa-upload"></i> </a></td>
                            @else
                            <td><a href="{{url('pangkat/berkas_skp2')."/edit/".$berkas_skp2[0]->id}}" class="btn btn-success"><i class="fa fa-edit"></i> </a></td>
                            @endif
                            @foreach($berkas_skp2 as $b_skp2)
                            <td><a href="{{url('pangkat/admin/berkas/ok')."/z_pangkat_b_skp/".$b_skp2->id}}" class="btn btn-primary"><i class="fa fa-check"></i> </a></td>
                            <td><a href="#berkasModal" data-id="{{$b_skp2->id}}" data-berkas="z_pangkat_b_skp" data-toggle='modal' class="btn btn-warning"><i class="fa fa-close"></i> </a></td>
                            @if($b_skp2->stat_ver == "")
                            @elseif($b_skp2->stat_ver == "OK")
                            <td><span class='badge bg-blue'><i class="fa fa-thumbs-up"></i></span></td>
                            @else
                            <td><span class='badge bg-red'><i class="fa fa-close"></i></span></td>
                            @endif
                            @endforeach
                          </tr>
                          @php $i++ @endphp

                          @php $x = 0 @endphp

                          @foreach($berkas_lain as $b_lain)
                          <tr>
                            <td>{{$i}}</td>
                          <td>
                            {{$b_lain->nm_dok}}</td>
                          <td>
                            <a href="{{asset($b_lain->lokasi)}}">{{$b_lain->filename}}</a>
                          </td>
                          <td><a href="{{url('pangkat/uploadreg/del_dok_lain').'/'.$b_lain->id}}" class='btn btn-danger'><i class="fa fa-trash"></i></a></td>
                          <td>
                            {{$b_lain->catat_ver}}
                          </td>
                          <td><a href="#editModal" class='btn btn-success' data-id="{{$b_lain->id}}"  data-toggle='modal'><i class="fa fa-edit"></i></a>
                          </td>
                          <td><a href="{{url('pangkat/admin/berkas/ok')."/z_pangkat_b_lain/".$b_lain->id}}" class="btn btn-primary"><i class="fa fa-check"></i> </a></td>
                          <td><a href="#berkasModal" data-id="{{$b_lain->id}}" data-berkas="z_pangkat_b_lain" data-toggle='modal' class="btn btn-warning"><i class="fa fa-close"></i> </a></td>
                          @if($b_lain->stat_ver == "")
                          @elseif($b_lain->stat_ver == "OK")
                          <td><span class='badge bg-blue'><i class="fa fa-thumbs-up"></i></span></td>
                          @else
                          <td><span class='badge bg-red'><i class="fa fa-close"></i></span></td>
                          @endif
                        </tr>
                        @php $i++; @endphp
                        @endforeach

                          <tr>
                            <td>{{$i}}</td>
                          <td>Dokumen Pendukung lainnya <sup style="color:red;">(*Sesuai ketentuan jika diperlukan)</sup></td>
                          <td>
                          </td>
                          <td>@if (count($berkas_lain)==0) {{"Tidak ada"}} @else {{"Ada"}} @endif</td>
                          <td><a href="#tambahModal" class='btn btn-success' data-toggle='modal'><i class="fa fa-plus"></i></a>
                          </td>
                        </tr>

                              </tbody></table>
                            </div><!-- /.box-body -->

                          </div><!-- /.box -->

                        </div>

          </div>

          <div class="modal fade" id="tambahModal" role="dialog">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Tambah Dokumen Pendukung Lainnya</h4>
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

              <div class="modal fade" id="editModal" role="dialog">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Ubah Dokumen Pendukung Lainnya</h4>
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
                  <div class="modal fade" id="berkasModal" role="dialog">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Masukkan catatan alasan ditolak</h4>
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
                      <div class="modal fade" id="tambahJabfung" role="dialog">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Tambah Dokumen Jabatan Fungsional</h4>
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

                          <div class="modal fade" id="editJabfung" role="dialog">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Ubah Dokumen Jabatan Fungsional</h4>
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
                              <div class="modal fade" id="tambahJabstruk" role="dialog">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title">Tambah Dokumen Jabatan Struktural</h4>
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

                                  <div class="modal fade" id="editJabstruk" role="dialog">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                      <h4 class="modal-title">Ubah Dokumen Jabatan Struktural</h4>
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
                                      <div class="modal fade" id="tambahDrj" role="dialog">
                                              <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Tambah Dokumen Jabatan Fungsional</h4>
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

                                          <div class="modal fade" id="editDrj" role="dialog">
                                                  <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                              <h4 class="modal-title">Ubah Dokumen Jabatan Fungsional</h4>
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
                                              <div class="modal fade" id="tambahUraian" role="dialog">
                                                      <div class="modal-dialog" role="document">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                  <h4 class="modal-title">Tambah Dokumen Jabatan Fungsional</h4>
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

                                                  <div class="modal fade" id="editUraian" role="dialog">
                                                          <div class="modal-dialog" role="document">
                                                              <div class="modal-content">
                                                                  <div class="modal-header">
                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                      <h4 class="modal-title">Ubah Dokumen Jabatan Fungsional</h4>
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
              $('#tambahModal').on('show.bs.modal', function (e) {
                  $.ajax({
                      type : 'get',
                      url : '{{url('pangkat/uploadreg/add_dok_lain')}}/{{$pns->id}}',
                      success : function(data){
                      $('.fetched-data').html(data);//menampilkan data ke dalam modal
                      }
                  });
               });

            $('a.show').click (function() {
                $("[data-widget='collapse']").click();
             });

          });
          $(document).ready(function(){
              $('#editModal').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                  $.ajax({
                      type : 'get',
                      url : '{{url('pangkat/uploadreg/edit_dok_lain')}}/'+ rowid,
                      success : function(data){
                      $('.fetched-data').html(data);//menampilkan data ke dalam modal
                      }
                  });
               });

            $('a.show').click (function() {
                $("[data-widget='collapse']").click();
             });

          });

          $(document).ready(function(){
              $('#berkasModal').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                var rowberkas = $(e.relatedTarget).data('berkas');
                  $.ajax({
                      type : 'get',
                      url : '{{url('pangkat/admin/berkas/no')}}/'+ rowberkas +'/'+ rowid,
                      success : function(data){
                      $('.fetched-data').html(data);//menampilkan data ke dalam modal
                      }
                  });
               });

            $('a.show').click (function() {
                $("[data-widget='collapse']").click();
             });

          });

          $(document).ready(function(){
              $('#tambahJabfung').on('show.bs.modal', function (e) {
                  $.ajax({
                      type : 'get',
                      url : '{{url('pangkat/uploadreg/add_jabfung')}}/{{$pns->id}}',
                      success : function(data){
                      $('.fetched-data').html(data);//menampilkan data ke dalam modal
                      }
                  });
               });

            $('a.show').click (function() {
                $("[data-widget='collapse']").click();
             });

          });
          $(document).ready(function(){
              $('#editJabfung').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                  $.ajax({
                      type : 'get',
                      url : '{{url('pangkat/uploadreg/edit_jabfung')}}/'+ rowid,
                      success : function(data){
                      $('.fetched-data').html(data);//menampilkan data ke dalam modal
                      }
                  });
               });

            $('a.show').click (function() {
                $("[data-widget='collapse']").click();
             });

          });
          $(document).ready(function(){
              $('#tambahJabstruk').on('show.bs.modal', function (e) {
                  $.ajax({
                      type : 'get',
                      url : '{{url('pangkat/uploadreg/add_jabstruk')}}/{{$pns->id}}',
                      success : function(data){
                      $('.fetched-data').html(data);//menampilkan data ke dalam modal
                      }
                  });
               });

            $('a.show').click (function() {
                $("[data-widget='collapse']").click();
             });

          });
          $(document).ready(function(){
              $('#editJabstruk').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                  $.ajax({
                      type : 'get',
                      url : '{{url('pangkat/uploadreg/edit_jabstruk')}}/'+ rowid,
                      success : function(data){
                      $('.fetched-data').html(data);//menampilkan data ke dalam modal
                      }
                  });
               });

            $('a.show').click (function() {
                $("[data-widget='collapse']").click();
             });

          });
          $(document).ready(function(){
              $('#tambahDrj').on('show.bs.modal', function (e) {
                  $.ajax({
                      type : 'get',
                      url : '{{url('pangkat/uploadreg/add_drj')}}/{{$pns->id}}',
                      success : function(data){
                      $('.fetched-data').html(data);//menampilkan data ke dalam modal
                      }
                  });
               });

            $('a.show').click (function() {
                $("[data-widget='collapse']").click();
             });

          });
          $(document).ready(function(){
              $('#editDrj').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                  $.ajax({
                      type : 'get',
                      url : '{{url('pangkat/uploadreg/edit_drj')}}/'+ rowid,
                      success : function(data){
                      $('.fetched-data').html(data);//menampilkan data ke dalam modal
                      }
                  });
               });

            $('a.show').click (function() {
                $("[data-widget='collapse']").click();
             });

          });
          $(document).ready(function(){
              $('#tambahUraian').on('show.bs.modal', function (e) {
                  $.ajax({
                      type : 'get',
                      url : '{{url('pangkat/uploadreg/add_uraian')}}/{{$pns->id}}',
                      success : function(data){
                      $('.fetched-data').html(data);//menampilkan data ke dalam modal
                      }
                  });
               });

            $('a.show').click (function() {
                $("[data-widget='collapse']").click();
             });

          });
          $(document).ready(function(){
              $('#editUraian').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                  $.ajax({
                      type : 'get',
                      url : '{{url('pangkat/uploadreg/edit_uraian')}}/'+ rowid,
                      success : function(data){
                      $('.fetched-data').html(data);//menampilkan data ke dalam modal
                      }
                  });
               });

            $('a.show').click (function() {
                $("[data-widget='collapse']").click();
             });

          });

          $(document).on('click', '.btn-danger', function (e) {
             e.preventDefault();
            var link = $(this);
             swal({
                     title: "Hapus Konfirmasi",
                     text: "Apakah anda yakin menghapus data ini?",
                     type: "warning",
                     showCancelButton: true,
                     confirmButtonColor: "#DD6B55",
                     confirmButtonText: "Ya, Hapus!",
                     closeOnConfirm: true
                 },
                 function(isConfirm) {
                    if(isConfirm){
                         window.location = link.attr('href');
                      }
                      else{
                         swal("cancelled","Category deletion Cancelled", "error");
                      }

             });
          });

          </script>


@stop
