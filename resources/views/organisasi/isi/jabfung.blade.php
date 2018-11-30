@extends('organisasi.layoutLTE.app')
@section('isi')
        <section class="content">
          <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Bagian Organisasi Sekretariat Daerah Kabupaten Situbondo</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                  <section class="content">
                            <div class='row'>
                              <div class='col-xs-12'>
                                <div class="nav-tabs-custom">
                                  <ul class="nav nav-tabs">
                                    <li class="active"><a href="#fa-icons" data-toggle="tab">Informasi Jabatan</a></li>
                                    <li><a href="#glyphicons" data-toggle="tab">Glyphicons</a></li>
                                  </ul>
                                  <div class="tab-content">
                                    <!-- Font Awesome icons -->
                                    <div class="tab-pane active" id="fa-icons" >
                                      <section id="new">
                                        <h4 class="page-header">Informasi Jabatan</h4>
                                        <table>
                                          <tr>
                                            <td width="20px">1.</td>
                                            <td width="200px">Nama Jabatan</td>
                                            <td width="300px">{{$jabfung->nama_fungsional}}</td>
                                          </tr>
                                          <tr>
                                            <td>2.</td>
                                            <td>Kode Jabatan</td>
                                            <td>...</td>
                                          </tr>
                                          <tr>
                                            <td>3.</td>
                                            <td>Unit Kerja</td>
                                            <td></td>
                                          </tr>
                                          <tr>
                                            <td></td>
                                            <td>JPT Madya</td>
                                            <td>-</td>
                                          </tr>
                                          <tr>
                                            <td></td>
                                            <td>JPT Pratama</td>
                                            <td>-</td>
                                          </tr>
                                          <tr>
                                            <td></td>
                                            <td>Administrator</td>
                                            <td>-</td>
                                          </tr>
                                          <tr>
                                            <td></td>
                                            <td>Pengawas</td>
                                            <td>-</td>
                                          </tr>
                                          <tr>
                                            <td></td>
                                            <td>Jabatan</td>
                                            <td>-</td>
                                          </tr>

                                        </table>
                                      </section>


                                    </div><!-- /#fa-icons -->
                                    <!-- glyphicons-->
                                    <div class="tab-pane" id="glyphicons">


                                    </div><!-- /#ion-icons -->

                                  </div><!-- /.tab-content -->
                                </div><!-- /.nav-tabs-custom -->
                              </div><!-- /.col -->
                            </div><!-- /.row -->
                          </section><!-- /.content -->
                          </div><!-- /.box-body -->


              </div>

</section>
@stop
