<div class="card">
  <!-- /.card-header -->
  <div class="card-body">
    @php
      $pieces = explode("-", $tgl_laporan);
      $startDt = $pieces[0];
      $endDt = $pieces[1];
      $strDt = date("d-m-Y", strtotime($startDt));
      $eDt = date("d-m-Y", strtotime($endDt));
      $tglPeriode = $strDt.' - '.$eDt;

    @endphp
    <h4 style="text-align:center;">PRODUKSI BORONGAN OPERATOR DI PT.{{ $hph }}</h4>
    <h4 style="text-align:center;">PERIDOE {{ $tglPeriode }}</h4>
    <h5>A. PRODUKSI KAYU</h5>
    <br>
    <table id="tb1" class="table table-bordered">
      <thead>
        <tr style="border: 1px solid #000000;">
          <th rowspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">Jns Kayu</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">TIMBUL</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">TENGGELAM</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">TOTAL</th>              
        </tr>
        <tr>
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
          $decimals = 2;
          $expo = pow(10,$decimals);

          $sum_timbulQty = 0;
          $sum_timbulVol = 0;
          $sum_tenggelamQty = 0;
          $sum_tenggelamVol = 0;
          $sum_totalQty = 0;
          $sum_totalVol = 0;
        @endphp

        @foreach ($getSelDt as $jsnx)

          @php          
            $tiv = intval($jsnx['timbulVol']*$expo)/$expo;
            $tev = intval($jsnx['tenggelamVol']*$expo)/$expo;
            $tov = intval($jsnx['totalVol']*$expo)/$expo;         
          @endphp
        <tr>              
            <td style="border: 1px solid #000000;">{{ $jsnx['namakayu'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['timbulQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['timbulVol'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['tenggelamQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['tenggelamVol'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['totalQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx['totalVol'] }}</td>
        </tr>
        @php
          $sum_timbulQty += $jsnx['timbulQty'];
          $sum_timbulVol += $jsnx['timbulVol'];
          $sum_tenggelamQty += $jsnx['tenggelamQty'];
          $sum_tenggelamVol += $jsnx['tenggelamVol'];
          $sum_totalQty += $jsnx['totalQty'];
          $sum_totalVol += $jsnx['totalVol'];
        @endphp
        @endforeach                     
      </tbody>
      <tfoot>
        <tr>
          <th style="background-color: #F3d458;border: 1px solid #000000;">TOTAL</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_timbulQty }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_timbulVol }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_tenggelamQty }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_tenggelamVol }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_totalQty }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_totalVol }}</th>
        </tr>
      </tfoot>          
    </table>
    <br>

    <h5>B. OPERATOR TRAKTOR</h5>
    <table id="tb2" class="table table-bordered">
      <thead>
        <tr style="border: 1px solid #000000;">
          <th rowspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">NAMA</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">TIMBUL</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">TENGGELAM</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">TOTAL</th>
        </tr>
        <tr>
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
          $getSelDt2 = $arr2;  
          $decimals2 = 2;
          $expo2 = pow(10,$decimals2);

          $sum_timbulQty2 = 0;
          $sum_timbulVol2 = 0;
          $sum_tenggelamQty2 = 0;
          $sum_tenggelamVol2 = 0;
          $sum_totalQty2 = 0;
          $sum_totalVol2 = 0;
        @endphp
        @foreach ($getSelDt2 as $jsnx2)

        @php
          
          $tiv2 = intval($jsnx2['timbulVol']*$expo2)/$expo2;
          $tev2 = intval($jsnx2['tenggelamVol']*$expo2)/$expo2;
          $tov2 = intval($jsnx2['totalVol']*$expo2)/$expo2;
         
        @endphp
        <tr>              
            <td style="border: 1px solid #000000;">{{ $jsnx2['namadriver'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx2['timbulQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx2['timbulVol'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx2['tenggelamQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx2['tenggelamVol'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx2['totalQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx2['totalVol'] }}</td>
        </tr>
        @php
          $sum_timbulQty2 += $jsnx2['timbulQty'];
          $sum_timbulVol2 += $jsnx2['timbulVol'];
          $sum_tenggelamQty2 += $jsnx2['tenggelamQty'];
          $sum_tenggelamVol2 += $jsnx2['tenggelamVol'];
          $sum_totalQty2 += $jsnx2['totalQty'];
          $sum_totalVol2 += $jsnx2['totalVol'];
        @endphp
        @endforeach                     
      </tbody>
      <tfoot>
        <tr>
          <th style="background-color: #F3d458;border: 1px solid #000000;">TOTAL</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_timbulQty2 }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_timbulVol2 }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_tenggelamQty2 }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_tenggelamVol2 }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_totalQty2 }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_totalVol2 }}</th>
        </tr>
      </tfoot>          
    </table>
    <br>

    <h5>C. OPERATOR CHAINSAW</h5>
    <table id="tb3" class="table table-bordered">
      <thead>
        <tr style="border: 1px solid #000000;">
          <th rowspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">NAMA</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">TIMBUL</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">TENGGELAM</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">TOTAL</th>
        </tr>
        <tr style="border: 1px solid #000000;">
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
          $getSelDt3 = $arr3; 
          $decimals3 = 2;
          $expo3 = pow(10,$decimals3);

          $sum_timbulQty3 = 0;
          $sum_timbulVol3 = 0;
          $sum_tenggelamQty3 = 0;
          $sum_tenggelamVol3 = 0;
          $sum_totalQty3 = 0;
          $sum_totalVol3 = 0;
        @endphp
        @foreach ($getSelDt3 as $jsnx3)

        @php
          
          $tiv3 = intval($jsnx3['timbulVol']*$expo3)/$expo3;
          $tev3 = intval($jsnx3['tenggelamVol']*$expo3)/$expo3;
          $tov3 = intval($jsnx3['totalVol']*$expo3)/$expo3;
         
        @endphp
        <tr>              
            <td style="border: 1px solid #000000;">{{ $jsnx3['namachainsaw'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx3['timbulQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx3['timbulVol'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx3['tenggelamQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx3['tenggelamVol'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx3['totalQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx3['totalVol'] }}</td>
        </tr>
        @php
          $sum_timbulQty3 += $jsnx3['timbulQty'];
          $sum_timbulVol3 += $jsnx3['timbulVol'];
          $sum_tenggelamQty3 += $jsnx3['tenggelamQty'];
          $sum_tenggelamVol3 += $jsnx3['tenggelamVol'];
          $sum_totalQty3 += $jsnx3['totalQty'];
          $sum_totalVol3 += $jsnx3['totalVol'];
        @endphp
        @endforeach                     
      </tbody>
      <tfoot>
        <tr>
          <th style="background-color: #F3d458;border: 1px solid #000000;">TOTAL</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_timbulQty3 }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_timbulVol3 }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_tenggelamQty3 }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_tenggelamVol3 }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_totalQty3 }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_totalVol3 }}</th>
        </tr>
      </tfoot>          
    </table>
    <br>

    <h5>D. OPERATOR KUPAS</h5>
    <table id="tb4" class="table table-bordered">
      <thead>
        <tr style="border: 1px solid #000000;">
          <th rowspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">NAMA</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">TIMBUL</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">TENGGELAM</th>
          <th colspan="2" style="text-align:center;vertical-align: middle;background-color:#C0c1c0; border: 1px solid #000000;">TOTAL</th>
        </tr>
        <tr style="border: 1px solid #000000;">
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
          $getSelDt4 = $arr4; 
          $decimals4 = 2;
          $expo4 = pow(10,$decimals4);

          $sum_timbulQty4 = 0;
          $sum_timbulVol4 = 0;
          $sum_tenggelamQty4 = 0;
          $sum_tenggelamVol4 = 0;
          $sum_totalQty4 = 0;
          $sum_totalVol4 = 0;
        @endphp
        @foreach ($getSelDt4 as $jsnx4)

        @php
          
          $tiv4 = intval($jsnx4['timbulVol']*$expo4)/$expo4;
          $tev4 = intval($jsnx4['tenggelamVol']*$expo4)/$expo4;
          $tov4 = intval($jsnx4['totalVol']*$expo4)/$expo4;
         
        @endphp
        <tr>              
            <td style="border: 1px solid #000000;">{{ $jsnx4['namakupas'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx4['timbulQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx4['timbulVol'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx4['tenggelamQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx4['tenggelamVol'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx4['totalQty'] }}</td>
            <td style="border: 1px solid #000000;">{{ $jsnx4['totalVol'] }}</td>
        </tr>
        @php
          $sum_timbulQty4 += $jsnx4['timbulQty'];
          $sum_timbulVol4 += $jsnx4['timbulVol'];
          $sum_tenggelamQty4 += $jsnx4['tenggelamQty'];
          $sum_tenggelamVol4 += $jsnx4['tenggelamVol'];
          $sum_totalQty4 += $jsnx4['totalQty'];
          $sum_totalVol4 += $jsnx4['totalVol'];
        @endphp
        @endforeach                     
      </tbody>
      <tfoot>
        <tr>
          <th style="background-color: #F3d458;border: 1px solid #000000;">TOTAL</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_timbulQty4 }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_timbulVol4 }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_tenggelamQty4 }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_tenggelamVol4 }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_totalQty4 }}</th>
          <th style="background-color: #F3d458;border: 1px solid #000000;">{{ $sum_totalVol4 }}</th>
        </tr>
      </tfoot>          
    </table>
  </div>
  <!-- /.card-body -->
</div>