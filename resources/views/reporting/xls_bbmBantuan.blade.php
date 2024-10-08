<html>
  <head>

  </head>
  <body>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <thead>
          <tr>
            <td align="center" valign="bottom" style="font-size: 8;">PT. BTJ</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom" style="font-size: 8;">DAFTAR PENGELUARAN BARANG (BANTUAN)</td>
            <td align="left" valign="bottom"></td>
          </tr>
          <tr>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom" style="font-size: 8;">PERIODE : {{$bln}}/{{$thn}}</td>
            <td align="left" valign="bottom"></td>
          </tr>
          <tr>
            <td align="center" valign="bottom" style="font-size: 8;">0139 :</td>
            <td align="left" valign="bottom" style="font-size: 8;">BASE CAMP BTJ</td>
            <td align="center" valign="bottom"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="center" valign="bottom"></td>
            <td align="center" valign="bottom"></td>
          </tr>
          <tr>
            <td colspan="13"></td>
          </tr>         
          <tr>
            <td align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Tanggal</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Nomor Document</td>
            <td width="10" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Kode</td>
            <td width="20" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Nama Barang</td>
            <td align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Ukuran / Part No.</td>
            <td align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Jumlah</td>
            <td align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Satuan</td>
            <td align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Nilai</td>
            <td align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Aktiva Tetap</td>
            <td align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Nama Aktiva Tetap</td>
            <td colspan="2" align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Status Pemakaian</td>
            <td width="20" align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Keterangan</td>
          </tr>          
        </thead>
        <tbody>
        @php
          $subtotalNilai = 0;
          $totalNilai = 0;
        @endphp

        @php ($current_tr = null) @endphp

        @foreach ($getSumNilai as $gsn) 

          @if ($loop->index > 0 && $current_tr != $gsn['no_bpm'])
          <tr>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>            
            <td align="right" valign="bottom" style="font-size: 8;">SUB TOTAL</td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($subtotalNilai, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
          </tr>
          <tr>
            <td colspan="14"></td>
          </tr>
          @php 
            $subtotalNilai = 0;
          @endphp

          @endif

          @if ($current_tr == $gsn['no_bpm'])
                  
            @else
            <tr>              
                @php ($current_tr = $gsn['no_bpm']) @endphp
                <td align="left" valign="bottom" style="font-size: 8;font-weight: bold;"></td>
            </tr>
          @endif

          <tr>
            <td align="left" valign="bottom" style="font-size: 8;">{{ date("d/m/Y", strtotime($gsn['tgl_det_p_spbbm'])); }}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['no_bpm']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['kd_brg']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['part_numb']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['ukuran']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['qty']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['uom']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['totHrg'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['kd_fa']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['nama_fa']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['kd_sts']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['ket']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['keterangan']}}</td>
          </tr>

           
          @php 
            $subtotalNilai += $gsn['totHrg'];
          @endphp

          @if ($loop->last) 
          <tr>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>            
            <td align="right" valign="bottom" style="font-size: 8;">SUB TOTAL</td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($subtotalNilai, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
          </tr>
          <tr>
            <td colspan="13"></td>
          </tr>
          @endif

          @php
            $totalNilai += $gsn['totHrg'];
          @endphp
        @endforeach        
        </tbody>
        <tfoot>
          <tr>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>            
            <td align="right" valign="bottom" style="font-size: 8;">TOTAL</td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalNilai, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
          </tr>
        </tfoot>            
    </table>
  </body>
</html>
