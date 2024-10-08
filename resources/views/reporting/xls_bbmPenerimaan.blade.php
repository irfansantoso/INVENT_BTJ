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
            <td align="left" valign="bottom" style="font-size: 8;">DAFTAR PENERIMAAN BBM dan PELUMAS</td>            
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
          </tr>
          <tr>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom" style="font-size: 8;">PERIODE : {{$bln}}/{{$thn}}</td>            
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
          </tr>
          <tr>
            <td align="center" valign="bottom" style="font-size: 8;">0139 :</td>
            <td align="left" valign="bottom" style="font-size: 8;">BASE CAMP BTJ</td>
            <td align="center" valign="bottom"></td>
            <td align="left" valign="bottom" style="font-size: 8;">Jenis Transaksi : 13 Pindah Gudang</td>
            <td align="center" valign="bottom"></td>
            <td align="center" valign="bottom"></td>
          </tr>
          <tr>
            <td colspan="14"></td>
          </tr>         
          <tr>
            <td align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Tanggal</td>
            <td width="12" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Nomor Document</td>
            <td width="10" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Kode Barang</td>
            <td width="30" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Nama Barang</td>
            <td align="center" valign="bottom" style="font-size: 6;border-bottom: 1px solid #000000;">Ukuran / Part No.</td>
            <td align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Jumlah</td>
            <td align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Satuan</td>
            <td align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Harga</td>
            <td width="15" align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Nilai</td>
            <td align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Potongan</td>
            <td align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">PPn</td>
            <td width="15" align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Nilai Bersih</td>
            <td align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;" colspan="2">Keterangan</td>
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
            <td width="5" align="center" valign="middle">&nbsp;</td>
            <td width="20" align="center" valign="middle">&nbsp;</td>
          </tr>
        </thead>
        <tbody>
        @php
          $subtotalNilai = 0;
          $subtotalNilaiBersih = 0;
          $totalNilai = 0;
          $totalNilaiBersih = 0;
        @endphp

        @php ($current_tr = null) @endphp

        @foreach ($getSumNilai as $gsn) 

          @if ($loop->index > 0 && $current_tr != $gsn['no_sppb'])
          <tr>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>            
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;">SUB TOTAL</td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($subtotalNilai, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">0</td>
            <td align="right" valign="bottom" style="font-size: 8;">0</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($subtotalNilaiBersih, 2, ',', '.')}}</td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
          </tr>
          <tr>
            <td colspan="14"></td>
          </tr>
          @php 
            $subtotalNilai = 0;
            $subtotalNilaiBersih = 0;
          @endphp

          @endif

          <tr>
            <td align="left" valign="bottom" style="font-size: 8;">{{ date("d/m/Y", strtotime($gsn['tgl_det_sa'])); }}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['no_sppb']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['kd_brg']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['part_numb']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['ukuran']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['qty'], 2, ',', '.') }}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['uom']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['harga_satuan'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['total'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">0</td>
            <td align="right" valign="bottom" style="font-size: 8;">0</td>              
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['total'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['supplier']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['nama_supp']}}</td>
          </tr>

          <tr>
            <td colspan="14"></td>
          </tr>  
          @php 
            $subtotalNilai += $gsn['total'];
            $subtotalNilaiBersih += $gsn['total'];
          @endphp

          @if ($loop->last) 
          <tr>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>            
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;">SUB TOTAL</td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($subtotalNilai, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">0</td>
            <td align="right" valign="bottom" style="font-size: 8;">0</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($subtotalNilaiBersih, 2, ',', '.') }}</td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
          </tr>
          <tr>
            <td colspan="14"></td>
          </tr>
          @endif

          @php
            $totalNilai += $gsn['total'];
            $totalNilaiBersih += $gsn['total'];
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
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;">TOTAL</td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalNilai, 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">0</td>
            <td align="right" valign="bottom" style="font-size: 8;">0</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($totalNilaiBersih, 2, ',', '.') }}</td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
          </tr>
        </tfoot>            
    </table>
  </body>
</html>
