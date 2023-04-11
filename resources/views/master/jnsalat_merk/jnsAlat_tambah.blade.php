@extends('template')
@section('content')

    <!-- Default box -->
    <br>
    @if(session('success'))
    <p class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button>{{ session('success') }}</p>
    @endif

    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        <p class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>{{ $error }}</p>
      @endforeach
    @endif
    <div class="card card">
      <div class="card-header">
        <h3 class="card-title">Add Form</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      
      <form class="form-horizontal" action="{{ route('jnsAlat.add') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="account" class="col-sm-2 col-form-label">Jenis Input</label>
            <div class="col-sm-3">
              <select class="form-control m-input" id="jenisInput" name="jenisInput" required="true">
                <option value="">
                    -- Pilih Jenis Input --
                </option>
                <option value="jnsalat">
                    Jenis Alat
                </option>
                <option value="merk">
                    Merk
                </option>
                <option value="gab_jnsalat_merk">
                    Gab.Jenis Alat & Merk
                </option>
              </select>
            </div>
          </div>
          <div class="form-group row" id="kode_jnsAlat_show" style="display:none;">
            <label for="" class="col-sm-2 col-form-label">Kode JenisAlat</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="kode_jnsAlat" name="kode_jnsAlat" placeholder="Kode" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group row" id="nama_jnsAlat_show" style="display:none;">
            <label for="" class="col-sm-2 col-form-label">Nama Jenis Alat</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="nama_jnsAlat" name="nama_jnsAlat" placeholder="Nama Jenis Alat">
            </div>
          </div>
          <div class="form-group row" id="kode_merk_show" style="display:none;">
            <label for="" class="col-sm-2 col-form-label">Kode Merk</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="kode_merk" name="kode_merk" placeholder="Kode" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group row" id="nama_merk_show" style="display:none;">
            <label for="" class="col-sm-2 col-form-label">Nama Merk</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="nama_merk" name="nama_merk" placeholder="Nama Merk">
            </div>
          </div>
          <div class="form-group row" id="list_jnsAlat_show" style="display:none;">
            <label for="account" class="col-sm-2 col-form-label">Jenis Alat</label>
            <div class="col-sm-3">
              <select class="form-control m-input" id="kodeJnsAlat" name="kodeJnsAlat" required="true">
                <option value="">
                    -- Pilih Jenis Alat --
                </option>
                @foreach ($jnsAlat as $ja)
                  <option value="{{ $ja->kode_jnsAlat }}" data-ja="{{ $ja->nama_jnsAlat }}">{{ $ja->kode_jnsAlat }} | {{ $ja->nama_jnsAlat }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row" id="list_merk_show" style="display:none;">
            <label for="account" class="col-sm-2 col-form-label">Merk</label>
            <div class="col-sm-3">
              <select class="form-control m-input" id="kodeMerk" name="kodeMerk" required="true">
                <option value="" data-m=" ">
                    -- Pilih Merk --
                </option>
                @foreach ($merk as $mk)
                  <option value="{{ $mk->kode_merk }}" data-m="{{ $mk->nama_merk }}">{{ $mk->kode_merk }} | {{ $mk->nama_merk }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row" id="kode_jnsAlatMerk_show" style="display:none;">
            <label for="" class="col-sm-2 col-form-label">Kode Gab</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="kode_jnsAlatMerk" name="kode_jnsAlatMerk" placeholder="Kode" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group row" id="keterangan_show" style="display:none;">
            <label for="" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-6">
              
              <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button class="btn btn-success">Simpan</button>
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
      <!-- /.card -->
@stop

@section('custom-js')
<script type="text/javascript">
    $(document).ready(function() {
      $('.select2-basic').select2();

      $('#jenisInput').on('change', function (e) { 
          var kode_jnsAlat_show = document.getElementById('kode_jnsAlat_show');
          var nama_jnsAlat_show = document.getElementById('nama_jnsAlat_show');
          var kode_merk_show = document.getElementById('kode_merk_show');
          var nama_merk_show = document.getElementById('nama_merk_show');
          var list_jnsAlat_show = document.getElementById('list_jnsAlat_show');
          var list_merk_show = document.getElementById('list_merk_show');
          var kode_jnsAlatMerk_show = document.getElementById('kode_jnsAlatMerk_show');
          var nama_jnsAlatMerk_show = document.getElementById('nama_jnsAlatMerk_show');
           
          var optionSelected = $("option:selected", this);
          var valueSelected = this.value; 
          // var str =valueSelected;
          // str = str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
          //     return letter.toUpperCase();
          // });
          // $('#namaProp').text('Nama '+str); 

          if(valueSelected=='jnsalat'){
              kode_jnsAlat_show.style.display = '';
              nama_jnsAlat_show.style.display = ''; 
              kode_merk_show.style.display = 'none';
              nama_merk_show.style.display = 'none';
              list_jnsAlat_show.style.display = 'none';
              list_merk_show.style.display = 'none';
              kode_jnsAlatMerk_show.style.display = 'none';
              keterangan_show.style.display = 'none';
          }else if(valueSelected=='merk'){ 
              kode_jnsAlat_show.style.display = 'none';
              nama_jnsAlat_show.style.display = 'none';
              kode_merk_show.style.display = '';
              nama_merk_show.style.display = '';
              list_jnsAlat_show.style.display = 'none';
              list_merk_show.style.display = 'none';
              kode_jnsAlatMerk_show.style.display = 'none';
              keterangan_show.style.display = 'none';
          }else{
              kode_jnsAlat_show.style.display = 'none';
              nama_jnsAlat_show.style.display = 'none';
              kode_merk_show.style.display = 'none';
              nama_merk_show.style.display = 'none';
              list_jnsAlat_show.style.display = '';
              list_merk_show.style.display = '';
              kode_jnsAlatMerk_show.style.display = '';
              keterangan_show.style.display = '';
          }
      });    
      $('#kodeJnsAlat').on('change', function (e) { 
        
          changeThird();
          
      });
      $('#kodeMerk').on('change', function (e) { 
                   
          changeThird();
          
      });
      function changeThird() {
          var jnsalat_x = $('#kodeJnsAlat').find(':selected').data('ja');
          var merk_x = $('#kodeMerk').find(':selected').data('m');
          $('#kode_jnsAlatMerk').val($('#kodeJnsAlat').val() + $('#kodeMerk').val());
          $('#keterangan').val(jnsalat_x +' '+ merk_x);
      }
    });
</script>
@endsection