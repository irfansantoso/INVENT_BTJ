@extends('template')
@section('content')
<!-- Content Header (Page header) -->

    <!-- Default box -->
    <br>
    @if(session('success'))
      <p class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button>{{ session('success') }}</p>
    @endif

    @if(session('error'))
      <p class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>{{ session('error') }}</p>
    @endif

    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        <p class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>{{ $error }}</p>
      @endforeach
    @endif
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Detail Koreksi - 29</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form class="form-horizontal" action="{{ route('trDetailKoreksiSpBbm.add') }}" method="POST">
         @csrf        
        <input type="hidden" name="id_head_k_spbbm" id="id_head_k_spbbm" value="{{ $getHeaderKoreksisb->id }}">
        <input type="hidden" name="no_ref" id="no_ref" value="{{ $getHeaderKoreksisb->no_ref }}">
        <input type="hidden" name="tgl_det_k_spbbm" id="tgl_det_k_spbbm" value="{{ $getHeaderKoreksisb->tgl_k_sp_bbm }}">
        <input type="hidden" name="no_koreksi" id="no_koreksi" value="{{ $getHeaderKoreksisb->no_koreksi }}">
        <input type="hidden" name="supplier" id="supplier" value="{{ $getHeaderKoreksisb->supplier }}">
        <input type="hidden" name="kode_periode" id="kode_periode" value="{{ $getHeaderKoreksisb->kode_periode }}">
        <input type="hidden" name="kd_area" id="kd_area" value="{{ $getHeaderKoreksisb->kd_area }}">

        <div class="card-body">          
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>No Ref :</label><br/>
                  {{ $getHeaderKoreksisb->no_ref }}
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>No. Koreksi :</label><br/>                
                  {{ $getHeaderKoreksisb->no_koreksi }}
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tgl :</label><br/>                
                  {{ $getHeaderKoreksisb->tgl_k_sp_bbm }}
              </div>
            </div>         
          </div>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Area :</label><br/>
                  {{ $getHeaderKoreksisb->kd_area }} {{ $getHeaderKoreksisb->nmarea }}
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Keterangan :</label><br/>                
                  {{ $getHeaderKoreksisb->keterangan }}
              </div>
            </div>         
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kode Brg</label>
                  <input type="text" data-toggle="modal" data-target="#modInv" class="form-control" id="kd_brg" name="kd_brg" placeholder="klik disini.." readonly>
                  
              </div>
            </div>            
            <div class="col-sm-3">
              <div class="form-group">
                <label>Nama Brg</label>
                  <input type="text" class="form-control" id="part_numb" name="part_numb" readonly>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Ukuran</label>                
                  <input type="text" class="form-control" id="ukuran" name="ukuran" readonly>          
              </div>
            </div> 
            <div class="col-sm-2">
              <div class="form-group">
                <label>Merk</label>                
                  <input type="text" class="form-control" id="merk" name="merk" readonly>          
              </div>
            </div>           
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Jenis Alat/Unit</label>
                  <input type="text" class="form-control" id="ket" name="ket" readonly>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Jumlah</label>
                  <input type="number" class="form-control" id="qty" name="qty">
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label>Satuan</label>
                  <input type="text" class="form-control" id="uom" name="uom" readonly>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Harga Beli</label>
                  <input type="text" class="form-control" id="hrg_beli" name="hrg_beli" readonly>
              </div>
            </div>                      
          </div>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kode F/A</label>
                  <input type="text" data-toggle="modal" data-target="#modFa" class="form-control" id="kode_fa" name="kode_fa" placeholder="klik disini.." readonly>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>F/A Name</label>
                  <input type="text" class="form-control" id="nama_fa" name="nama_fa" readonly>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Status Pemakaian</label>
                  <input type="text" data-toggle="modal" data-target="#modSp" class="form-control" id="nama_sp" name="sts_pakai" placeholder="klik disini.." readonly>
                  <input type="hidden" class="form-control" id="kode_sp" name="kode_sp">
              </div>
            </div>            
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Keterangan</label>
                  <input type="text" class="form-control" id="keterangan" name="keterangan">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tanggal</label>
                  <input type="text" class="form-control" id="tgl" name="tgl" value="{{ $getHeaderKoreksisb->tgl_k_sp_bbm }}" readonly>
              </div>
            </div>
          </div>
        <!-- /.card-body -->
        </div>

        <div class="card-footer">
          <button class="btn btn-success">Simpan</button>
        </div>
        <!-- /.card-footer -->
      </form>              
    </div>
      <!-- /.card -->
    
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <table id="trDetailKoreksiSpBbm" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Kd Brg</th>
            <th>Nama Brg</th> 
            <th>Ukuran/PartNo</th>            
            <th>Merk</th>
            <th>Jns Alat/Unit</th>
            <th>Jumlah</th>           
            <th>Satuan</th>
            <th>Hrg Beli</th>
            <th>FixedAsset</th>
            <th>Status Pemakaian</th>            
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($getDetailKoreksiSb as $gds)
            <tr>              
                <td>{{ $gds->kdbrg }}</td>
                <td>{{ $gds->partnumb }}</td>
                <td>{{ $gds->ukuran }}</td> 
                <td>{{ $gds->merk }}</td>
                <td>{{ $gds->ketjnsalat }}</td>
                <td>{{ $gds->qty }}</td>
                <td>{{ $gds->uom }}</td>
                <td>{{ number_format($gds->hrg_beli,2,",",".") }}</td>
                <td>{{ $gds->nmfa }}</td>
                <td>{{ $gds->stspakai }}</td>
                <td>{{ $gds->tgl_det_k_spbbm }}</td>
                <td>{{ $gds->keterangan }}</td>
                <td>                
                  <a href="#" data-toggle="modal" 
                  data-target="#modalEdit" 
                  data-id="{{ $gds->id }}"
                  data-id_head_k_spbbm="{{ $gds->id_head_k_spbbm }}"
                  data-kdbrg="{{ $gds->kdbrg }}" 
                  data-partnumb="{{ $gds->partnumb }}" 
                  data-uk="{{ $gds->ukuran }}" 
                  data-merk="{{ $gds->merk }}" 
                  data-ket="{{ $gds->ketjnsalat }}" 
                  data-qty="{{ $gds->qty }}" 
                  data-uom="{{ $gds->uom }}" 
                  data-hrg_bel="{{ $gds->hrg_beli }}" 
                  data-kdfa="{{ $gds->kd_fa }}" 
                  data-nmfa="{{ $gds->nmfa }}" 
                  data-kdsts="{{ $gds->kd_sts }}"
                  data-stspakai="{{ $gds->stspakai }}" 
                  data-keterangan="{{ $gds->keterangan }}" 
                  data-tgl_k_sp_bbm="{{ $getHeaderKoreksisb->tgl_k_sp_bbm }}" class="edit btn btn-primary btn-sm editDetPgSpBbm" title="Edit"><i class="far fa-edit"></i></a>
                  <a href="#" data-toggle="modal" data-target="#modal-delete" data-id="{{ $gds->id }}" class="btn btn-danger btn-sm delDetKoreksiSpBbm" title="Delete"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach                     
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Modal EDiT Show -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80%;">
            <div class="modal-content">
                <div class="modal-header">Edit Form
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="editForm"></div>           
                    <form class="form-horizontal" action="{{ route('trDetailKoreksiSpBbm.edit') }}" method="POST">
                       @csrf
                      <input type="hidden" class="form-control" id="idx" name="id">
                      <input type="hidden" name="id_head_k_spbbmx" id="id_head_k_spbbm">
                      <div class="card-body">          
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Kode Brg</label>
                                <input type="text" data-toggle="modal" data-target="#modInvx" class="form-control" id="kd_brgx" name="kd_brg" placeholder="klik disini..">
                                
                            </div>
                          </div>            
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label>Nama Brg</label>
                                <input type="text" class="form-control" id="part_numbx" name="part_numb" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Ukuran</label>                
                                <input type="text" class="form-control" id="ukuranx" name="ukuran" readonly>          
                            </div>
                          </div> 
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Merk</label>                
                                <input type="text" class="form-control" id="merkx" name="merk" readonly>          
                            </div>
                          </div>           
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label>Jenis Alat/Unit</label>
                                <input type="text" class="form-control" id="ketx" name="ket" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Jumlah</label>
                                <input type="number" class="form-control" id="qtyx" name="qty">
                            </div>
                          </div>
                          <div class="col-sm-1">
                            <div class="form-group">
                              <label>Satuan</label>
                                <input type="text" class="form-control" id="uomx" name="uom" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Harga Beli</label>
                                <input type="text" class="form-control" id="hrg_belix" name="hrg_beli" readonly>
                            </div>
                          </div>                      
                        </div>
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Kode F/A</label>
                                <input type="text" data-toggle="modal" data-target="#modFax" class="form-control" id="kode_fax" name="kode_fa" placeholder="klik disini.." >
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label>F/A Name</label>
                                <input type="text" class="form-control" id="nama_fax" name="nama_fa" readonly>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label>Status Pemakaian</label>
                                <input type="text" data-toggle="modal" data-target="#modSpx" class="form-control" id="nama_spx" name="sts_pakai" placeholder="klik disini..">
                                <input type="hidden" class="form-control" id="kode_spx" name="kode_sp">
                            </div>
                          </div>            
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label>Keterangan</label>
                                <input type="text" class="form-control" id="keteranganx" name="keterangan">
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Tanggal</label>
                                <input type="text" class="form-control" id="tglx" name="tgl" readonly>
                            </div>
                          </div>
                        </div>
                      <!-- /.card-body -->
                      </div>

                      <div class="card-footer">
                        <button class="btn btn-success">Simpan</button>
                      </div>
                      <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal EDiTShow -->

    <!-- Modal Invent Stock Show -->
    <div class="modal fade" id="modInv" tabindex="-1" aria-labelledby="modInv" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;overflow-y: auto;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="stInvKoreksiSpBbm" class="table table-bordered table-striped responsive">
                          <thead>
                          <tr>
                            <th>Kd_Brg</th>
                            <th>Kel_Brg</th>
                            <th>Stock Akhir</th>
                            <th>Nama Brg</th>
                            <th>Ukuran</th>
                            <th>UOM</th>
                            <th>Merk</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Invent Stock Show -->

    <!-- Modal Invent Stock Show -->
    <div class="modal fade" id="modInvx" tabindex="-1" aria-labelledby="modInvx" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;overflow-y: auto;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="stInvKoreksiSpBbm_x" class="table table-bordered table-striped responsive">
                          <thead>
                          <tr>
                            <th>Kd_Brg</th>
                            <th>Kel_Brg</th>
                            <th>Stock Akhir</th>
                            <th>Nama Brg</th>
                            <th>Ukuran</th>
                            <th>UOM</th>
                            <th>Merk</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Invent Stock Show -->

    <!-- Modal FixedAsset Show -->
    <div class="modal fade" id="modFa" tabindex="-1" aria-labelledby="modFa" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;overflow-y: auto;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="dtStatic" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>Kode </th>
                            <th>Nama Fixed Asset</th>
                            <th>#</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach ($fixedAsset as $fa)
                            <tr>              
                                <td>{{ $fa->kode_fa }}</td>
                                <td>{{ $fa->nama_fa }}</td>
                                <td><a href="#" data-kode_fa="{{ $fa->kode_fa }}" 
                                        data-nama_fa="{{ $fa->nama_fa }}" 
                                        class="btn btn-primary btn-sm clickFa" title="pilih">PILIH</a></td>
                            </tr>
                            @endforeach                     
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal FixedAsset Show -->

    <!-- Modal FixedAsset Show -->
    <div class="modal fade" id="modFax" tabindex="-1" aria-labelledby="modFax" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;overflow-y: auto;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="dtStatic" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>Kode </th>
                            <th>Nama Fixed Asset</th>
                            <th>#</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach ($fixedAsset as $fa)
                            <tr>              
                                <td>{{ $fa->kode_fa }}</td>
                                <td>{{ $fa->nama_fa }}</td>
                                <td><a href="#" data-kode_fa="{{ $fa->kode_fa }}" 
                                        data-nama_fa="{{ $fa->nama_fa }}" 
                                        class="btn btn-primary btn-sm clickFax" title="pilih">PILIH</a></td>
                            </tr>
                            @endforeach                     
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal FixedAsset Show -->

    <!-- Modal StsPemakaian Show -->
    <div class="modal fade" id="modSp" tabindex="-1" aria-labelledby="modSp" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;overflow-y: auto;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="dtStatic" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>Kode</th>
                            <th>Keterangan</th>
                            <th>#</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach ($stsPemakaian as $etr)
                            <tr>              
                                <td>{{ $etr->kode }}</td>
                                <td>{{ $etr->keterangan }}</td>
                                <td><a href="#" data-kode_sp="{{ $etr->kode }}" 
                                        data-nama_sp="{{ $etr->keterangan }}" 
                                        class="btn btn-primary btn-sm clickSp" title="pilih">PILIH</a></td>
                            </tr>
                            @endforeach                     
                          </tbody>                          
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal FixedAsset Show -->   

    <!-- Modal StsPemakaian Show -->
    <div class="modal fade" id="modSpx" tabindex="-1" aria-labelledby="modSpx" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;overflow-y: auto;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="dtStatic" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>Kode</th>
                            <th>Keterangan</th>
                            <th>#</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach ($stsPemakaian as $etr)
                            <tr>              
                                <td>{{ $etr->kode }}</td>
                                <td>{{ $etr->keterangan }}</td>
                                <td><a href="#" data-kode_sp="{{ $etr->kode }}" 
                                        data-nama_sp="{{ $etr->keterangan }}" 
                                        class="btn btn-primary btn-sm clickSpx" title="pilih">PILIH</a></td>
                            </tr>
                            @endforeach                     
                          </tbody>                          
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal FixedAsset Show --> 

    <!-- Modal -->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Warning !!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('trDetailKoreksiSpBbm.del') }}" method="post">
                  {{ csrf_field() }}
                  <div class="modal-body">
                      Apakah Anda yakin akan menghapus ID 
                      <span id="id-destroy2"></span> ?
                      <input type='hidden' name='del_id' id='id-destroy'>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                      <button type="submit" class="btn btn-danger">Ya</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('custom-js')
<script type="text/javascript">
//$('.select2-basic').select2();

var hrg_beli = document.getElementById("hrg_beli");
hrg_beli.addEventListener("keyup", function(e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  hrg_beli.value = formatRupiah(this.value, "");
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    hrg_beli = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    hrg_beli += separator + ribuan.join(".");
  }

  hrg_beli = split[1] != undefined ? hrg_beli + "," + split[1] : hrg_beli;
  return prefix == undefined ? hrg_beli : hrg_beli ? "" + hrg_beli : "";
}

$("#dtStatic").DataTable({
  "responsive": true, 
  "lengthChange": false, 
  "autoWidth": false,
  "order": [],
  "buttons": false
}).buttons().container().appendTo('#dtStatic_wrapper .col-md-6:eq(0)');

$(document).on('click', '.clickInv', function() {
    var id = $(this).attr('data-id');
    var kdbrg = $(this).attr('data-kdbrg');
    var kelbrg = $(this).attr('data-kelbrg');
    var partnumb = $(this).attr('data-partnumb');
    var uk = $(this).attr('data-uk');
    var uom = $(this).attr('data-uom');
    var merk = $(this).attr('data-merk');
    var ket = $(this).attr('data-ket');
    // var hrg_sat = $(this).attr('data-hrg_sat');
    var qty_temp = $(this).attr('data-qty');
    var nilai = $(this).attr('data-nilai');
    var hrg_beli = nilai/qty_temp;
    var hrg_beli_x = parseFloat(hrg_beli.toFixed(4));
    
    $('#id').val(id);
    $('#kd_brg').val(kdbrg);
    $('#kel_brg').val(kelbrg);
    $('#part_numb').val(partnumb);
    $('#ukuran').val(uk);
    $('#uom').val(uom);
    $('#merk').val(merk);
    $('#ket').val(ket);
    $('#hrg_beli').val(hrg_beli_x);
    $('#modInv').modal('hide');
});

$(document).on('click', '.clickInv_x', function() {
    var id = $(this).attr('data-id');
    var kdbrg = $(this).attr('data-kdbrg');
    var kelbrg = $(this).attr('data-kelbrg');
    var partnumb = $(this).attr('data-partnumb');
    var uk = $(this).attr('data-uk');
    var uom = $(this).attr('data-uom');
    var merk = $(this).attr('data-merk');
    var ket = $(this).attr('data-ket');
    var hrg_sat = $(this).attr('data-hrg_sat');
    
    $('#id').val(id);
    $('#kd_brgx').val(kdbrg);
    $('#kel_brgx').val(kelbrg);
    $('#part_numbx').val(partnumb);
    $('#ukuranx').val(uk);
    $('#uomx').val(uom);
    $('#merkx').val(merk);
    $('#ketx').val(ket);
    $('#hrg_belix').val(hrg_sat);
    $('#modInvx').modal('hide');
});

$(document).on('click', '.clickFa', function() {
    var kode_fa = $(this).attr('data-kode_fa');
    var nama_fa = $(this).attr('data-nama_fa');    
    
    $('#kode_fa').val(kode_fa);
    $('#nama_fa').val(nama_fa);    
    $('#modFa').modal('hide');
});

$(document).on('click', '.clickFax', function() {
    var kode_fa = $(this).attr('data-kode_fa');
    var nama_fa = $(this).attr('data-nama_fa');    
    
    $('#kode_fax').val(kode_fa);
    $('#nama_fax').val(nama_fa);
    $('#modFax').modal('hide');
});

$(document).on('click', '.clickSp', function() {
    var kode_sp = $(this).attr('data-kode_sp');
    var nama_sp = $(this).attr('data-nama_sp');
    
    $('#kode_sp').val(kode_sp);
    $('#nama_sp').val(nama_sp);
    $('#modSp').modal('hide');
});

$(document).on('click', '.clickSpx', function() {
    var kode_sp = $(this).attr('data-kode_sp');
    var nama_sp = $(this).attr('data-nama_sp');
    
    $('#kode_spx').val(kode_sp);
    $('#nama_spx').val(nama_sp);
    $('#modSpx').modal('hide');
});

$('#kel_brg').on('change', function (e) { 
    var kel_brg = $('#kel_brg').find(':selected').data('gjam');
    // var kel_brg = document.getElementById('kel_brg');
    $('#kd_brg').val(kel_brg);
});

$("#trDetailKoreksiSpBbm").DataTable({
  "responsive": true, 
  "lengthChange": false, 
  "autoWidth": false,
  "order": [],
  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#trDetailKoreksiSpBbm_wrapper .col-md-6:eq(0)');

$(function () {
  $("#qty , #hrg_beli").keyup(function () {
    var qty = parseInt($("#qty").val() || 0);
    var h_s = parseInt($("#hrg_beli").val() || 0);
    var total = parseInt(qty * h_s);
    
    $("#total").val(total);
  });
});

$("body").on('keyup', "#qty-m , #hrg_beli-m", function() {  
    var qty = parseInt($("#qty-m").val() || 0);
    var h_s = parseInt($("#hrg_beli-m").val() || 0);
    var total = parseInt(qty * h_s);
    //alert(qty);
    
    $("#total-m").val(total);
});

// $(document).on('click', '.xmodInv', function() {

//     $.ajax({
//         type: 'GET',
//         url: "{{URL::to('trDetailKoreksiSpBbm/showinv')}}"
//     }).done( function( response ) {
//         $('#showForm').html(response.html);
//     });
// });

$('#stInvKoreksiSpBbm').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: '{!! route('stInvKoreksiSpBbm.data') !!}', // memanggil route yang menampilkan data json
  columns: 
  [
    { // mengambil & menampilkan kolom sesuai tabel database
        data: 'kd_brg',
        name: 'kd_brg'
    },
    {
        data: 'kel_brg',
        name: 'kel_brg'
    },
    {
        data: 'qty',
        name: 'qty'
    },
    {
        data: 'part_numb',
        name: 'part_numb'
    },
    {
        data: 'ukuran',
        name: 'ukuran'
    },
    {
        data: 'uom',
        name: 'uom'
    },
    {
        data: 'merk',
        name: 'merk'
    },
    {
        data: 'action',
        name: 'action',
        orderable: false, 
        searchable: false
    }
  ],
});

$('#stInvKoreksiSpBbm_x').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: '{!! route('stInvKoreksiSpBbmx.data') !!}', // memanggil route yang menampilkan data json
  columns: 
  [
    { // mengambil & menampilkan kolom sesuai tabel database
        data: 'kd_brg',
        name: 'kd_brg'
    },
    {
        data: 'kel_brg',
        name: 'kel_brg'
    },
    {
        data: 'qty',
        name: 'qty'
    },
    {
        data: 'part_numb',
        name: 'part_numb'
    },
    {
        data: 'ukuran',
        name: 'ukuran'
    },
    {
        data: 'uom',
        name: 'uom'
    },
    {
        data: 'merk',
        name: 'merk'
    },
    {
        data: 'action',
        name: 'action',
        orderable: false, 
        searchable: false
    }
  ],
});

$(document).on('click', '.editDetPgSpBbm', function() {
    let id = $(this).attr('data-id');
    let id_head_k_spbbm = $(this).attr('data-id_head_k_spbbm');
    let kdbrg = $(this).attr('data-kdbrg');
    var kelbrg = $(this).attr('data-kelbrg');
    let partnumb = $(this).attr('data-partnumb');
    let uk = $(this).attr('data-uk');
    let uom = $(this).attr('data-uom');
    let merk = $(this).attr('data-merk');
    let qty = $(this).attr('data-qty');
    let ket = $(this).attr('data-ket');        
    let hrg_bel = $(this).attr('data-hrg_bel');
    let kdfa = $(this).attr('data-kdfa');
    let nmfa = $(this).attr('data-nmfa');
    let kdsts = $(this).attr('data-kdsts');
    let stspakai = $(this).attr('data-stspakai');
    let keterangan = $(this).attr('data-keterangan');
    let tgl_k_sp_bbm = $(this).attr('data-tgl_k_sp_bbm');
    // alert(tgl_k_sp_bbm);
    
    $('#idx').val(id);
    $('#id_head_k_spbbmx').val(id_head_k_spbbm);
    $('#kd_brgx').val(kdbrg);
    $('#kel_brgx').val(kelbrg);
    $('#part_numbx').val(partnumb);
    $('#ukuranx').val(uk);
    $('#uomx').val(uom);
    $('#merkx').val(merk);
    $('#qtyx').val(qty);
    $('#ketx').val(ket);
    $('#nama_fax').val(nmfa);
    $('#kode_fax').val(kdfa);
    $('#hrg_belix').val(hrg_bel);
    $('#nama_fax').val(nmfa);
    $('#kode_fax').val(kdfa);
    $('#kode_spx').val(kdsts);
    $('#nama_spx').val(stspakai);
    $('#keteranganx').val(keterangan);
    $('#tglx').val(tgl_k_sp_bbm);
    // $("#jns_kayu_m").val(ky).trigger('change');
            
});

$(document).on('click', '.delDetKoreksiSpBbm', function() {
    let id = $(this).attr('data-id');
    $('#id-destroy').val(id);
    $('#id-destroy2').html(id);
});

// $(document).on('click', '.editDetPgSpBbm', function() {
//     let id = $(this).attr('data-id');

//     $.ajax({
//         type: 'GET',
//         url: "{{ URL::to('trDetailKoreksiSpBbm/showedit')}}"+"/"+id
//     }).done( function( response ) {
//         $('#editForm').html(response.html);
//     });
// });

</script> 
@stop