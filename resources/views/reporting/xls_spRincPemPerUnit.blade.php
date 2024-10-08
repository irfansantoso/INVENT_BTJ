<html>
  <head>

  </head>
  <body>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
          <tr>
            <td align="left" valign="bottom" style="font-size: 8;">PT. BTJ</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom" style="font-size: 8;">DAFTAR PENGELUARAN BARANG by FIXED ASSET (SPARE PART)</td>            
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
          </tr>
          <tr>
            <td align="left" valign="bottom" style="font-size: 8;">0139 :</td>
            <td align="left" valign="bottom" style="font-size: 8;">BASE CAMP BTJ</td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom" style="font-size: 8;">PERIODE : {{$sDt}} S/D {{$eDt}}</td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
          </tr>          
          <tr>
            <td colspan="14"></td>
          </tr>
          <tr>
            <td align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Tanggal</td>
            <td width="30" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Nomor Document/Kode</td>
            <td width="25" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Nama Barang</td>
            <td width="20" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Ukuran/Part No.</td>
            <td width="10" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Jumlah</td>
            <td width="10" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Satuan</td>
            <td width="20" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Nilai</td>
            <td width="5" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Status</td>            
            <td width="30" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Pemakaian</td>
            <td width="30" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Keterangan</td>
          </tr>
          <tr>
            <td></td>
          </tr>
          @php
            $subHrgBeli = 0;
            $totalHrgBeli = 0;
          @endphp
          
          @php ($current_tr = null) @endphp

          @foreach ($getSumNilai as $gsn)

            @if ($loop->index > 0 && $current_tr != $gsn['kdfa'])
            
            <tr>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="right" valign="bottom" style="font-size: 8;"></td>
              <td align="right" valign="bottom" style="font-size: 8;"></td>
              <td align="left" valign="bottom" style="font-size: 8;">SUB TOTAL</td>            
              <td align="left" valign="bottom" style="font-size: 8;">:</td>
              <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($subHrgBeli, 2, ',', '.') }}</td>
              <td align="right" valign="bottom" style="font-size: 8;"></td>
              <td align="right" valign="bottom" style="font-size: 8;"></td>
              <td align="right" valign="bottom" style="font-size: 8;"></td>
            </tr>
            @php 
              $subHrgBeli = 0;
            @endphp

            @endif
              @if ($current_tr == $gsn['kdfa'])
                  
                @else
                <tr>              
                  @php ($current_tr = $gsn['kdfa']) @endphp
                  <td align="left" valign="bottom" style="font-size: 8;font-weight: bold;">{{ $gsn['kdfa'] }}</td>
                  <td align="left" valign="bottom" style="font-size: 8;font-weight: bold;">{{ $gsn['nmfa'] }}</td>
                </tr>
                <tr>
                  <td></td>
                </tr>
              @endif
          <tr>
            <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['tgl_d_p_spbbm']; }}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['nobpm']; }} --- {{ $gsn['kdbrg']; }}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['partnumb']; }}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['ukur']; }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ $gsn['qty']; }}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['uom']; }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['h_beli'], 2, ',', '.') }}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['kdsts']; }}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['ket_sts']; }}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['ket']; }}</td>
          </tr>
          
            @php 
              $subHrgBeli += $gsn['h_beli'];
            @endphp
            @if ($loop->last)
              <tr>
                <td></td>
              </tr>           
              <tr>
                <td align="left" valign="bottom" style="font-size: 8;"></td>
                <td align="left" valign="bottom" style="font-size: 8;"></td>
                <td align="right" valign="bottom" style="font-size: 8;"></td>
                <td align="right" valign="bottom" style="font-size: 8;"></td>
                <td align="left" valign="bottom" style="font-size: 8;">SUB TOTAL</td>            
                <td align="left" valign="bottom" style="font-size: 8;">:</td>
                <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($subHrgBeli, 2, ',', '.') }}</td>
                <td align="right" valign="bottom" style="font-size: 8;"></td>
                <td align="right" valign="bottom" style="font-size: 8;"></td>
                <td align="right" valign="bottom" style="font-size: 8;"></td>
              </tr>
            @endif

            @php 
              $totalHrgBeli += $gsn['h_beli'];
            @endphp

          @endforeach          
          
        <tbody>
        <tfoot>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;">TOTAL</td>             
            <td align="left" valign="bottom" style="font-size: 8;">:</td>
            <td align="right" valign="bottom" style="font-size: 8;font-weight: bold;">{{ number_format($totalHrgBeli, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
          </tr>
        </tfoot>    
    </table>
  </body>
</html>
