          <form role="form" action="isi" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="nip_baru">NIP 18 digit</label>
                <p class="pesan" style="display:none"><span class ="badge bg-red"><i class="fa fa-user-times"></i> NIP tidak ada dalam database</span></p>
                <input type="text" onkeyup="isi_otomatis()" id="nip" class="form-control" name ="nip_baru" placeholder="NIP Baru" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="jab_br">Jabatan yang akan diisi</label>
                <textarea id="jab_br" class="form-control"  disabled="disabled">{{$unor->NM_JAB}}</textarea>

              </div>

              <table class="table table-bordered">
               <tbody>
                <tr>
                <td>NAMA</td>
                <td><div id="nama"></div></td>
                </tr>
                <tr>
                <td>GOLONGAN / TMT</td>
                <td><div id="gol"></div><div id="tmt_gol"></div></td>
                </tr>
                <tr>
                <td>ESELON / TMT</td>
                <td><div id="eselon"></div><div id="tmt_eselon"></div></td>
                </tr>
                <tr>
                <td>JABATAN / TMT</td>
                <td><div id="jabatan"></div><div id="tmt_jabatan"></div></td>
                </tr>
                <tr>
                <td>DIKLAT PIM / TMT</td>
                <td><div id="diklat"></div><div id="tmt_diklat"></div></td>
                </tr>
                </tbody>
              </table>

            </div><!-- /.box-body -->

            <div class="box-footer">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <input type="hidden" name="id" value="{{$unor->id}}" />
              <input type="hidden" name="unor_br" value="{{$unor->KD_UNOR}}" />
              <input type="hidden" name="eselon_br" value="{{$unor->eselon}}" />
              <input type="hidden" name="jab_br" value="{{$unor->NM_JAB}}" />
              <button type="submit" class="btn btn-primary">Pilih</button>
            </div>
          </form>

           <script type="text/javascript">
 /*           function isi_otomatis(){
                var nip = $("#nip").val();
 //               var data="nip="+nip;
//window.alert(data);
                 $.get('isiajax/' + nip, function (data)  {
                    console.log(data);
                    $('#nama').val(data.nama);
                  //
                });
            } */

           function isi_otomatis(){
                var nip = $("#nip").val();
 //               var data="nip="+nip;
//window.alert(data);
                 $.ajax({
                  type : "get",
                  url:'isiajax/' + nip,
                  success:function (data)  {
                    console.log(data);
                      $('#nama').html(data.nama);
                      $('#gol').html(data.gol);
                      $('#tmt_gol').html(data.tmt_gol);
                      $('#eselon').html(data.eselon);
                      $('#tmt_eselon').html(data.tmt_eselon);
                      $('#jabatan').html(data.jabatan);
                      $('#tmt_jabatan').html(data.tmt_jabatan);
                      $('#diklat').html(data.diklat);
                      $('#tmt_diklat').html(data.tmt_diklat);
                    $(document).ready(function(){

                      $('p.pesan').hide("fast");
                      });
                  //
                },
                error:function (data) {
                  var error="";
                  $('#nama').html(error);
                  $('#gol').html(error);
                  $('#tmt_gol').html(error);
                  $('#eselon').html(error);
                  $('#tmt_eselon').html(error);
                  $('#jabatan').html(error);
                  $('#tmt_jabatan').html(error);
                  $('#diklat').html(error);
                  $('#tmt_diklat').html(error);
                  $(document).ready(function(){
                    $('p.pesan').show("fast");
                    });

                }
              });
            }


        </script>
