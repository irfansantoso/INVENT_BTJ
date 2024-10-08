<html>
  <head>

  </head>
  <body>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <thead>
          <tr>
            <td align="center" valign="bottom" style="font-size: 8;">PT. BTJ</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom" style="font-size: 8;">DAFTAR MUTASI PERSEDIAAN BARANG SPAREPART</td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
          </tr>
          <tr>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom" style="font-size: 8;">BULAN : {{$bln}}/{{$thn}}</td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
          </tr>
          <tr>
            <td align="center" valign="bottom" style="font-size: 8;">0139 :</td>
            <td align="left" valign="bottom" style="font-size: 8;">BASE CAMP BTJ</td>
            <td align="center" valign="bottom"></td>
            <td align="center" valign="bottom"></td>
            <td align="center" valign="bottom"></td>
            <td align="center" valign="bottom"></td>
          </tr>
          <tr>
            <td align="center" valign="middle" rowspan="2" style="font-size: 8;font-weight: bold;">Kode</td>
            <td width="30" align="center" valign="middle" rowspan="2" style="font-size: 8;font-weight: bold;">Unit/Alat</td>
            <td width="20" align="center" valign="middle" rowspan="2" style="font-size: 8;font-weight: bold;">Ukuran/Part No.</td>
            <td align="center" valign="middle" rowspan="2" style="font-size: 8;font-weight: bold;">Satuan</td>
            <td align="center" valign="bottom" colspan="2" style="font-size: 8;font-weight: bold;">Saldo Awal</td>
            <td align="center" valign="bottom" colspan="2" style="font-size: 8;font-weight: bold;">Penerimaan</td>
            <td align="center" valign="bottom" colspan="2" style="font-size: 8;font-weight: bold;">Pengeluaran</td>
            <td align="center" valign="bottom" colspan="2" style="font-size: 8;font-weight: bold;">Saldo Akhir</td>
          </tr>
          <tr>
            <td align="center" valign="middle" style="font-size: 8;font-weight: bold;">Jumlah</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;font-weight: bold;">Nilai</td>
            <td align="center" valign="middle" style="font-size: 8;font-weight: bold;">Jumlah</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;font-weight: bold;">Nilai</td>
            <td align="center" valign="middle" style="font-size: 8;font-weight: bold;">Jumlah</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;font-weight: bold;">Nilai</td>
            <td align="center" valign="middle" style="font-size: 8;font-weight: bold;">Jumlah</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;font-weight: bold;">Nilai</td>
          </tr>
          <tr>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
          </tr>
        </thead>
        <tbody>
          @php
            $subtotalSaldoAwal = 0;
            $subtotalPenerimaan = 0;
            $subtotalPengeluaran = 0;
            $subtotalSaldoAkhir = 0;
            $totalSaldoAwal = 0;
            $totalPenerimaan = 0;
            $totalPengeluaran = 0;
            $totalSaldoAkhir = 0;
          @endphp

          @php ($current_tr = null) @endphp

          @foreach ($getSumNilai as $gsn)

            @if ($loop->index > 0 && $current_tr != $gsn['kel_brg'])
            
            <tr>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="left" valign="bottom" style="font-size: 8;font-weight: bold;">SUB TOTAL  :</td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>            
              <td align="right" valign="bottom" style="font-size: 8;font-weight: bold;">{{ number_format($subtotalSaldoAwal, 2, ',', '.') }}</td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="right" valign="bottom" style="font-size: 8;font-weight: bold;">{{ number_format($subtotalPenerimaan, 2, ',', '.') }}</td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="right" valign="bottom" style="font-size: 8;font-weight: bold;">{{ number_format($subtotalPengeluaran, 2, ',', '.') }}</td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="right" valign="bottom" style="font-size: 8;font-weight: bold;">{{ number_format($subtotalSaldoAkhir, 2, ',', '.') }}</td>
            </tr>
            <tr>
              <td colspan="12"></td>
            </tr>
            @php 
              $subtotalSaldoAwal = 0;
              $subtotalPenerimaan = 0;
              $subtotalPengeluaran = 0;
              $subtotalSaldoAkhir = 0; 
            @endphp

            @endif
              @if ($current_tr == $gsn['kel_brg'])
                  
                @else
                <tr>              
                    @php ($current_tr = $gsn['kel_brg']) @endphp
                    <td align="left" valign="bottom" style="font-size: 8;font-weight: bold;">{{ $gsn['kel_brg'] }}</td>
                </tr>
              @endif
            <tr>
              <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['kd_brg']; }}</td>
              <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['nmbrg']; }}</td>
              <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['ukuran']; }}</td>
              <td align="left" valign="bottom" style="font-size: 8;">{{ $gsn['satuan']; }}</td>
              <td align="right" valign="bottom" style="font-size: 8;">{{ $gsn['saQty']; }}</td>
              <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['saldoAwal'], 2, ',', '.') }}</td>
              <td align="right" valign="bottom" style="font-size: 8;">{{ $gsn['penerimaanQty']; }}</td>
              <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['penerimaan'], 2, ',', '.') }}</td>
              <td align="right" valign="bottom" style="font-size: 8;">{{ $gsn['pengeluaranQty']; }}</td>
              <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['pengeluaran'], 2, ',', '.') }}</td>
              <td align="right" valign="bottom" style="font-size: 8;">{{ $gsn['saldoAkhirQty']; }}</td>
              @php
              if($gsn['saldoAkhir'] >= '70000000'){
              @endphp
              <td align="right" valign="bottom" style="font-size: 10;font-weight: bold;">{{ number_format($gsn['saldoAkhir'], 2, ',', '.') }}</td>
              @php
              }else{
              @endphp
              <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['saldoAkhir'], 2, ',', '.') }}</td>
              @php
              }
              @endphp
            </tr>
            @php 
              $subtotalSaldoAwal += $gsn['saldoAwal'];
              $subtotalPenerimaan += $gsn['penerimaan'];
              $subtotalPengeluaran += $gsn['pengeluaran'];
              $subtotalSaldoAkhir += $gsn['saldoAkhir'];
            @endphp

            @if ($loop->last)           
            <tr>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="left" valign="bottom" style="font-size: 8;font-weight: bold;">SUB TOTAL  :</td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>            
              <td align="right" valign="bottom" style="font-size: 8;font-weight: bold;">{{ number_format($subtotalSaldoAwal, 2, ',', '.') }}</td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="right" valign="bottom" style="font-size: 8;font-weight: bold;">{{ number_format($subtotalPenerimaan, 2, ',', '.') }}</td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="right" valign="bottom" style="font-size: 8;font-weight: bold;">{{ number_format($subtotalPengeluaran, 2, ',', '.') }}</td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="right" valign="bottom" style="font-size: 8;font-weight: bold;">{{ number_format($subtotalSaldoAkhir, 2, ',', '.') }}</td>
            </tr>
            <tr>
              <td colspan="12"></td>
            </tr>
            @endif

            @php
              $totalSaldoAwal += $gsn['saldoAwal'];
              $totalPenerimaan += $gsn['penerimaan'];
              $totalPengeluaran += $gsn['pengeluaran'];
              $totalSaldoAkhir += $gsn['saldoAkhir'];
            @endphp
          @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="left" valign="bottom" style="font-size: 8;font-weight: bold;">GRAND TOTAL :</td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>            
              <td align="right" valign="bottom" style="font-size: 8;font-weight: bold;">{{ number_format($totalSaldoAwal, 2, ',', '.') }}</td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="right" valign="bottom" style="font-size: 8;font-weight: bold;">{{ number_format($totalPenerimaan, 2, ',', '.') }}</td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="right" valign="bottom" style="font-size: 8;font-weight: bold;">{{ number_format($totalPengeluaran, 2, ',', '.') }}</td>
              <td align="left" valign="bottom" style="font-size: 8;"></td>
              <td align="right" valign="bottom" style="font-size: 8;font-weight: bold;">{{ number_format($totalSaldoAkhir, 2, ',', '.') }}</td>
            </tr>
          </tfoot>            
    </table>
  </body>
</html>
