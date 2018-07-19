@extends('pangkat.layoutLTE.app')
@section('isi')
<section class="content-header">
         <h1>
           USULAN {{$jenis_kp->nm_jenis_kp}}
           <small>{{$pns->nip_baru}} / {{$pns->nama}}</small>
         </h1>
</section>
<br>
           <div class="row">
            <div class="col-md-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class=""><a href="{{url('pangkat/admin/verifpns')."/".$pns->id}}" aria-expanded="false">Upload berkas</a></li>
                  <li class="active"><a href="{{url('pangkat/admin/verif_berkas')."/".$pns->id}}" aria-expanded="true">Cek berkas</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active">

                    <div class="box box-success">
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


            </div>

            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">SK CPNS</a></li>
                  <li><a href="#tab_2" data-toggle="tab">SK PNS</a></li>
                  <li><a href="#tab_3" data-toggle="tab">SK Pangkat</a></li>
                  <li><a href="#tab_4" data-toggle="tab">Ijazah</a></li>
                  <li><a href="#tab_5" data-toggle="tab">Transkrip</a></li>
                  <li><a href="#tab_6" data-toggle="tab">SKP {{session()->get('thn')-2}}</a></li>
                  <li><a href="#tab_7" data-toggle="tab">SKP {{session()->get('thn')-1}}</a></li>

                  @php $i=8 @endphp
                  @foreach($berkas_lain as $b_lain)
                  <li><a href="#tab_{{$i}}" data-toggle="tab">{{$b_lain->nm_dok}}</a></li>
                  @php $i++ @endphp
                  @endforeach
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    @foreach($berkas_cpns as $b_cpns)
                    {{$b_cpns->filename}}
                    <div id="cpns"></div>
                    <script>PDFObject.embed("{{asset($berkas_cpns[0]->lokasi)}}", "#cpns");</script>
                    @endforeach
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    @foreach($berkas_pns as $b_pns)
                    {{$b_pns->filename}}
                    <div id="pns"></div>
                    <script>PDFObject.embed("{{asset($berkas_pns[0]->lokasi)}}", "#pns");</script>
                    @endforeach
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    @foreach($berkas_pangkat as $b_pangkat)
                    {{$b_pangkat->filename}}
                    <div id="pangkat{{$b_pangkat->golongan}}"></div>
                    <script>PDFObject.embed("{{asset($b_pangkat->lokasi)}}", "#pangkat{{$b_pangkat->golongan}}");</script>
                    @endforeach
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_4">
                    @foreach($berkas_ijazah as $b_ijazah)
                    {{$b_ijazah->filename}}
                    <div id="ijazah{{$b_ijazah->nm_ijazah}}"></div>
                    <script>PDFObject.embed("{{asset($b_ijazah->lokasi)}}", "#ijazah{{$b_ijazah->nm_ijazah}}");</script>
                    @endforeach
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_5">
                    @foreach($berkas_transkrip as $b_transkrip)
                    {{$b_transkrip->filename}}
                    <div id="transkrip{{$b_transkrip->nm_ijazah}}"></div>
                    <script>PDFObject.embed("{{asset($b_transkrip->lokasi)}}", "#transkrip{{$b_transkrip->nm_ijazah}}");</script>
                    @endforeach
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_6">
                    @foreach($berkas_skp1 as $b_skp1)
                    {{$b_skp1->filename}}
                    <div id="skp{{$b_skp1->tahun}}"></div>
                    <script>PDFObject.embed("{{asset($b_skp1->lokasi)}}", "#skp{{$b_skp1->tahun}}");</script>
                    @endforeach
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_7">
                    @foreach($berkas_skp2 as $b_skp2)
                    {{$b_skp2->filename}}
                    <div id="skp{{$b_skp2->tahun}}"></div>
                    <script>PDFObject.embed("{{asset($b_skp2->lokasi)}}", "#skp{{$b_skp2->tahun}}");</script>
                    @endforeach
                  </div><!-- /.tab-pane -->
                  @php $i = 8 @endphp
                  @foreach($berkas_lain as $b_lain)
                  <div class="tab-pane" id="tab_{{$i}}">
                    {{$b_lain->filename}}
                    <div id="{{$b_lain->kd_dok}}"></div>
                    <script>PDFObject.embed("{{asset($b_lain->lokasi)}}", "#{{$b_lain->kd_dok}}");</script>
                  </div><!-- /.tab-pane -->
                  @php $i++ @endphp
                  @endforeach

                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div>
          </div>

@stop
