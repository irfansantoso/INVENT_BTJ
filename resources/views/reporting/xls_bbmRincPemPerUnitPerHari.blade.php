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
            <td align="left" valign="bottom" style="font-size: 8;">DAFTAR RINCIAN PENGELUARAN (BBM DAN PELUMAS)tes</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
            <td align="left" valign="bottom">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>            
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom" style="font-size: 8;">PERIODE : {{$awDt}} sampai {{$akDt}}</td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
          </tr>
          <tr>
            <td align="center" valign="bottom" style="font-size: 8;">0139 :</td>
            <td align="left" valign="bottom" style="font-size: 8;">BASE CAMP BTJ</td>
            <td align="center" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
            <td align="left" valign="bottom"></td>
          </tr>         
          <tr>
            <td align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Tanggal</td>
            <td width="15" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Nomor Document</td>
            <td width="10" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Kode Barang</td>
            <td width="20" align="center" valign="middle" style="font-size: 8;border-bottom: 1px solid #000000;">Nama Barang</td>
            <td align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Ukuran / Part No.</td>
            <td align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Jumlah</td>
            <td align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Satuan</td>
            <td width="15" align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Nilai</td>
            <td width="5" align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Status</td>
            <td width="15" align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Pemakaian</td>
            <td width="10" align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">HM/KM Awal</td>
            <td width="10" align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">HM/KM Akhir</td>
            <td width="10" align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Jam Kerja</td>
            <td width="10" align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Rata-Rata</td>
            <td width="10" align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Kode</td>
            <td width="15" align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Lokasi Aktivitas</td>
            <td width="10" align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Kode</td>
            <td width="25" align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Aktivitas Alat</td>
            <td width="25" align="center" valign="bottom" style="font-size: 8;border-bottom: 1px solid #000000;">Keterangan Detail</td>
          </tr> 
          <tr>
            <td colspan="19"></td>
          </tr>         
        </thead>
        <tbody>
        @php
          $subtotalNilai = 0;
          $totalNilai = 0;
        @endphp

        @php ($current_tr = null) @endphp

        @foreach ($getSumNilai as $gsn) 

          @if ($loop->index > 0 && $current_tr != $gsn['nodoc'])
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
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
            <td align="left" valign="bottom" style="font-size: 8;"></td>
          </tr>
          @php 
            $subtotalNilai = 0;
          @endphp

          @endif

          @if ($current_tr == $gsn['nodoc'])
                  
            @else
            <tr>              
                @php ($current_tr = $gsn['nodoc']) @endphp
                <td align="left" valign="bottom" style="font-size: 8;font-weight: bold;">{{ $gsn['nodoc'] }}</td>
                <td align="left" valign="bottom" style="font-size: 8;font-weight: bold;">{{ $gsn['nmfa'] }}</td>
            </tr>
          @endif

          <tr>
            <td align="left" valign="bottom" style="font-size: 8;">{{ date("d/m/Y", strtotime($gsn['tgl'])); }}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['nodoc']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['kdbrg']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['nmbrg']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['ukur']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['quantity']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['satuan']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{ number_format($gsn['nilai'], 2, ',', '.') }}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['sts']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['pemakaian']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['hkawal']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['hkakhir']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['jamkrj']}}</td>
            <td align="right" valign="bottom" style="font-size: 8;">{{$gsn['rata2']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['kdlok']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['nmlok']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['kdactiv']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['activalat']}}</td>
            <td align="left" valign="bottom" style="font-size: 8;">{{$gsn['ket']}}</td>
          </tr>
           
          @php 
            $subtotalSum = round($gsn['nilai'], 2);
            $subtotalNilai += $subtotalSum;
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
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
          </tr>

          @endif

          @php
            $totalSum = round($gsn['nilai'], 2);
            $totalNilai += $totalSum;
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
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
            <td align="right" valign="bottom" style="font-size: 8;"></td>
          </tr>
        </tfoot>            
    </table>
  </body>
</html>
