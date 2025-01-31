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
        <h3 class="card-title">Detail Permintaan Barang</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form class="form-horizontal" action="{{ route('trDetailPb.add') }}" method="POST">
         @csrf        
        <input type="hidden" name="id_header_pb" id="id_header_pb" value="{{ $getHeaderPb->id }}">
        <input type="hidden" name="no_pb" id="no_pb" value="{{ $getHeaderPb->no_pb }}">
        <input type="hidden" name="tgl_pb" id="tgl_pb" value="{{ $getHeaderPb->tgl_pb }}">
        <input type="hidden" name="kode_periode" id="kode_periode" value="{{ $getHeaderPb->kode_periode }}">

        <div class="card-body">
          <fieldset class="form-group border p-3">
            <legend class="w-auto px-2"><h6>Header</h6></legend>          
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label>No Pb :</label><br/>
                    {{ $getHeaderPb->no_pb }}
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label>Tgl Saldo Awal :</label><br/>                
                    {{ $getHeaderPb->tgl_pb }}
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Kd Area :</label><br/>                
                    {{ $getHeaderPb->kd_area }}
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <a href="{{ url('printPb') }}/{{ $getHeaderPb->id }}" class="btn btn-primary" title="Cetak">Cetak</a>
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Kd Unit :</label><br/>
                    {{ $getHeaderPb->kd_unit }}
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label>Status :</label><br/>                
                    <span style="color:red;">{{ $getHeaderPb->status_pb }}</span>
                </div>
              </div>            
            </div>
          </fieldset>
          @auth
          @if(Auth::user()->level != "logisticUser")
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label>Kode Brg</label>
                  <input type="text" data-toggle="modal" data-target="#modInv" class="form-control" id="kd_brg" name="kd_brg" placeholder="Klik here.." readonly>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Ukuran</label>                
                  <input type="text" class="form-control" id="ukuran" name="ukuran" readonly>           
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Nama Brg</label>
                  <input type="text" class="form-control" id="part_numb" name="part_numb" readonly>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Merk</label>
                  <input type="text" class="form-control" id="merk" name="merk" readonly>
              </div>
            </div>         
          </div>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Stock Akhir</label>
                  <input type="number" class="form-control" id="last_stock" name="last_stock" readonly>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Order</label>
                  <input type="number" class="form-control" id="qty" name="qty">
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label>Satuan</label>
                  <input type="text" class="form-control" id="uom" name="uom" readonly>
              </div>
            </div>
            
          </div>
          @endif
          @endauth
        <!-- /.card-body -->
        </div>
        @auth
        @if(Auth::user()->level != "logisticUser")
        <div class="card-footer">
          <button class="btn btn-success">Simpan</button>          
        </div>
        @endif
        @endauth
        <!-- /.card-footer -->
      </form>              
    </div>
      <!-- /.card -->
    
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <table id="trDetailPb" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No.</th>
            <th>Kd Brg</th>              
            <th>Nama Brg</th>
            <th>Ukuran/PartNo</th>
            <th>Merk</th>
            <th>Order</th>            
            <th>Uom</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($getDetailPb as $key => $gds)
            <tr>              
                <td>{{ $key + 1}}</td>
                <td>{{ $gds->kdbrg }}</td>                
                <td>{{ $gds->part_numb }}</td>
                <td>{{ $gds->ukuran }}</td>
                <td>{{ $gds->merk }}</td>
                <td>{{ $gds->qty }}</td>
                <td>{{ $gds->uom }}</td>                
                <td>
                @auth
                @if(Auth::user()->level != "logisticUser")                
                  <a href="#" data-toggle="modal"
                  data-target="#modalEdit"
                  data-id="{{ $gds->id }}"
                  data-id_head_pb="{{ $gds->id_head_pb }}"
                  data-kdbrg="{{ $gds->kdbrg }}" 
                  data-part_numb="{{ $gds->part_numb }}" 
                  data-uk="{{ $gds->ukuran }}"
                  data-qty="{{ $gds->qty }}" 
                  data-uom="{{ $gds->uom }}" 
                  data-merk="{{ $gds->merk }}"
                  data-jumQty="{{ $gds->jumQty }}"                  
                  class="edit btn btn-primary btn-sm editDetPb" title="Edit"><i class="far fa-edit"></i></a>
                  <a href="#" data-toggle="modal" data-target="#modal-delete" data-id="{{ $gds->id }}" data-kode="{{ $key + 1 }}" class="btn btn-danger btn-sm delDetPb" title="Delete"><i class="fa fa-trash"></i></a>
                @endif
                @endauth
                </td>                
            </tr>
            @endforeach                     
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Modal Invent Stock Show -->
    <div class="modal fade" id="modInv" tabindex="-1" aria-labelledby="modInv" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;overflow-y: auto;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="stInvPb" class="table table-bordered table-striped responsive">
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
                    <form class="form-horizontal" action="{{ route('trDetailPb.edit') }}" method="POST">
                      @csrf        
                      <input type="hidden" name="id" id="idx">
                      <input type="hidden" name="id_head_pb" id="id_head_pbx" value="{{ $getHeaderPb->id }}">
                      <input type="hidden" name="no_pb" id="no_pb" value="{{ $getHeaderPb->no_pb }}">
                      <input type="hidden" name="tgl_pb" id="tgl_pb" value="{{ $getHeaderPb->tgl_pb }}">
                      <input type="hidden" name="kode_periode" id="kode_periode" value="{{ $getHeaderPb->kode_periode }}">

                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label>Kode Brg</label>
                                <input type="text" class="form-control" id="kd_brgx" name="kd_brg"  readonly>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Ukuran</label>                
                                <input type="text" class="form-control" id="ukuranx" name="ukuran" readonly>           
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label>Nama Brg</label>
                                <input type="text" class="form-control" id="part_numbx" name="part_numb" readonly>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label>Merk</label>
                                <input type="text" class="form-control" id="merkx" name="merk" readonly>
                            </div>
                          </div>         
                        </div>
                        <div class="row">
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Stock Akhir</label>
                                <input type="number" class="form-control" id="jumQtyx" name="jumQty" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="form-group">
                              <label>Order</label>
                                <input type="number" class="form-control" id="qtyx" name="qty">
                            </div>
                          </div>
                          <div class="col-sm-1">
                            <div class="form-group">
                              <label>Satuan</label>
                                <input type="text" class="form-control" id="uomx" name="uom" readonly>
                            </div>
                          </div>
                          
                        </div>
                      <!-- /.card-body -->
                      </div>

                      <div class="card-footer">
                        <button class="btn btn-success">Ubah</button>          
                      </div>
                      <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal EDiTShow -->

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
                <form action="{{ route('trDetailPb.del') }}" method="post">
                  {{ csrf_field() }}
                  <div class="modal-body">
                      Apakah Anda yakin akan menghapus data nomor 
                      <span id="id-destroy2"></span> ini ?
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

$(document).on('click', '.clickInv', function() {
    var kdbrg = $(this).attr('data-kdbrg');
    var uk = $(this).attr('data-uk');
    var pn = $(this).attr('data-partnumb');
    var lstock = $(this).attr('data-laststock');
    var mrk = $(this).attr('data-merk');
    var uom = $(this).attr('data-uom');
    
    $('#kd_brg').val(kdbrg);
    $('#uom').val(uom);
    $('#part_numb').val(pn);
    $('#merk').val(mrk);
    $('#last_stock').val(lstock);
    $('#ukuran').val(uk);
    $('#modInv').modal('hide');
});

$("#trDetailPb").DataTable({
  "responsive": true, 
  "lengthChange": false, 
  "autoWidth": false,
  "order": [],
  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#trDetailPb_wrapper .col-md-6:eq(0)');

$(document).on('click', '.editDetPb', function() {
    let id = $(this).attr('data-id');
    let id_head_pb = $(this).attr('data-id_head_pb');
    let kdbrg = $(this).attr('data-kdbrg');
    let part_numb = $(this).attr('data-part_numb');
    let uk = $(this).attr('data-uk');
    let uom = $(this).attr('data-uom');
    let qty = $(this).attr('data-qty');
    let merk = $(this).attr('data-merk');
    let jumQty = $(this).attr('data-jumQty');
    // alert(tgl_retur);
    
    $('#idx').val(id);
    $('#id_head_pbx').val(id_head_pb);
    $('#kd_brgx').val(kdbrg);
    $('#part_numbx').val(part_numb);
    $('#ukuranx').val(uk);
    $('#uomx').val(uom);
    $('#qtyx').val(qty);
    $('#merkx').val(merk);
    $('#jumQtyx').val(jumQty);
    // $("#jns_kayu_m").val(ky).trigger('change');
});

$(document).on('click', '.delDetPb', function() {
    let id = $(this).attr('data-id');
    let kode = $(this).attr('data-kode');
    $('#id-destroy').val(id);
    $('#id-destroy2').html(kode);
});


$('#stInvPb').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: '{!! route('stInvPb.data') !!}', // memanggil route yang menampilkan data json
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
</script> 
@stop