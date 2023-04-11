<div class="card">
  <!-- /.card-header -->
  <div class="card-body">
    @php
      
      $eDt = date("d-m-Y", strtotime($tgl_laporan));

    @endphp
    <h4 style="text-align:center;">STOK AKHIR GABUNGAN</h4>
    <h5 style="text-align:center;">PERIODE {{ $eDt }}</h5>
    <br>
    <table id="" class="table table-bordered">
      <thead>
        <tr style="border-color: #000000;">
          <th rowspan="3" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">LOKASI</th>
          <th rowspan="3" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">JENIS KAYU</th>
          <th colspan="6" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">KELAS DIAMETER</th>          
          <th rowspan="2" colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">TOTAL</th>              
        </tr>
        <tr>
          <th rowspan="1" colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">( 40 - 49 )</th>
          <th rowspan="1" colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">( 50 - 59 )</th>
          <th rowspan="1" colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">( 60 Up )</th>
        </tr>
        <tr>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">BTG</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">VOL</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">BTG</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">VOL</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">BTG</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">VOL</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">BTG</th>
          <th style="background-color:#C0c1c0;border: 1px solid #000000;">VOL</th>
        </tr>
      </thead>
      <tbody>
        @php 
          $getSelDt = $arr1; 

          $sum_lowQty = 0;
          $sum_lowVol = 0;
          $sum_middleQty = 0;
          $sum_middleVol = 0;
          $sum_highQty = 0;
          $sum_highVol = 0;
          $sum_totalQty = 0;
          $sum_totalVol = 0;
        @endphp

        @php ($current_tr = null) @endphp
        
        @foreach ($getSelDt as $jsnx)
          
          @if ($loop->index > 0 && $current_tr != $jsnx['kodelok'])

            <tr>
              <td colspan="2" style="background-color: #eeeee4;border: 1px solid #000000;">TOTAL</td>
              <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::rptStokAkhGab_subTot($current_tr,$tgl_laporan,'lowQty') }}</td>
              <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::rptStokAkhGab_subTot($current_tr,$tgl_laporan,'lowVol') }}</td>
              <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::rptStokAkhGab_subTot($current_tr,$tgl_laporan,'middleQty') }}</td>
              <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::rptStokAkhGab_subTot($current_tr,$tgl_laporan,'middleVol') }}</td>
              <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::rptStokAkhGab_subTot($current_tr,$tgl_laporan,'highQty') }}</td>
              <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::rptStokAkhGab_subTot($current_tr,$tgl_laporan,'highVol') }}</td>
              <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::rptStokAkhGab_subTot($current_tr,$tgl_laporan,'totalQty') }}</td>
              <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::rptStokAkhGab_subTot($current_tr,$tgl_laporan,'totalVol') }}</td>
            </tr>
            <tr>
              <td colspan="10"></td>
            </tr>
  
          @endif

        <tr>      
          @if ($current_tr == $jsnx['kodelok'])
            <td colspan="1" style="border: 1px solid #000000;"></td>
          @else
            @php ($current_tr = $jsnx['kodelok']) @endphp
            <td style="border: 1px solid #000000;">{{ $jsnx['nama_lokasi'] }}</td>
          @endif        
            <td style="border: 1px solid #000000;">{{ $jsnx['namakayu'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['lowQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['lowVol'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['middleQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['middleVol'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['highQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['highVol'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['totalQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['totalVol'] }}</td>
        </tr>
        @if ($loop->last)
          <tr>
            <td colspan="2" style="background-color: #eeeee4;border: 1px solid #000000;">TOTAL</td>
            <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::rptStokAkhGab_subTot($current_tr,$tgl_laporan,'lowQty') }}</td>
            <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::rptStokAkhGab_subTot($current_tr,$tgl_laporan,'lowVol') }}</td>
            <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::rptStokAkhGab_subTot($current_tr,$tgl_laporan,'middleQty') }}</td>
            <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::rptStokAkhGab_subTot($current_tr,$tgl_laporan,'middleVol') }}</td>
            <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::rptStokAkhGab_subTot($current_tr,$tgl_laporan,'highQty') }}</td>
            <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::rptStokAkhGab_subTot($current_tr,$tgl_laporan,'highVol') }}</td>
            <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::rptStokAkhGab_subTot($current_tr,$tgl_laporan,'totalQty') }}</td>
            <td style="background-color: #eeeee4;border: 1px solid #000000;">{{ App\Http\Controllers\UserController::rptStokAkhGab_subTot($current_tr,$tgl_laporan,'totalVol') }}</td>
          </tr>
          <tr>
            <td colspan="10"></td>
          </tr>
        @endif

        @php
          $sum_lowQty += $jsnx['lowQty'];
          $sum_lowVol += $jsnx['lowVol'];
          $sum_middleQty += $jsnx['middleQty'];
          $sum_middleVol += $jsnx['middleVol'];
          $sum_highQty += $jsnx['highQty'];
          $sum_highVol += $jsnx['highVol'];
          $sum_totalQty += $jsnx['totalQty'];
          $sum_totalVol += $jsnx['totalVol'];
        @endphp
        @endforeach                     
      </tbody>
      <tfoot>
        <tr>
          <th style="background-color: #F3d458;border: 1px solid #000000;" colspan="2">TOTAL</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_lowQty }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_lowVol }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_middleQty }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_middleVol }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_highQty }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_highVol }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_totalQty }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_totalVol }}</th>
        </tr>
      </tfoot>          
    </table>
    <br>
  </div>
  <!-- /.card-body -->
</div>