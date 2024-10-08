<!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <a href="{{ route('profile') }}">
          <div class="image">
            @auth
              @if(Auth::user()->photo_img != "")
                <img src="@auth{{asset('photos/'.Auth::user()->photo_img)}}@endauth" class="img-circle elevation-2" alt="User Image">
              @else
                <img src="{{asset('admin/dist/img/person.png')}}" class="img-circle elevation-2" alt="User Image">
              @endif
              @endauth
          </div>
          @auth
            {{ Auth::user()->name }}
          @endauth
        </a>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar text-sm nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @auth
          @if(Auth::user()->level != "logisticUser")
          <li class="{{ request()->is('lokasi', 'jnsAlat','jnsAlat_tambah','fixedAsset', 'aktivitasAlat','sts_pemakaian','supplier','warehouse','merkBrg') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
            <a href="#" class="{{ request()->is('lokasi', 'jnsAlat','jnsAlat_tambah','fixedAsset', 'aktivitasAlat','sts_pemakaian','supplier','warehouse','merkBrg') ? 'nav-link active' : 'nav-link' }} zoominout">
              <i class="nav-icon fas fa-cogs zoominout_act"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('lokasi') }}" class="{{ request()->is('lokasi') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lokasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('jnsAlat') }}" class="{{ request()->is('jnsAlat','jnsAlat_tambah') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Alat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('fixedAsset') }}" class="{{ request()->is('fixedAsset') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Asset</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('aktivitasAlat') }}" class="{{ request()->is('aktivitasAlat') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aktivitas Alat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sts_pemakaian') }}" class="{{ request()->is('sts_pemakaian') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status Pemakaian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('supplier') }}" class="{{ request()->is('supplier') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('warehouse') }}" class="{{ request()->is('warehouse') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Warehouse</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('merkBrg') }}" class="{{ request()->is('merkBrg') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Merk Barang</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @endauth
        
          <li class="{{ request()->is('trHeaderPb','trDetailPb/*','trHeaderPindahGudang','trDetailPindahGudang/*','trHeaderReturPemakaian','trDetailReturPemakaian/*','trHeaderKoreksiSo','trDetailKoreksiSo/*','trHeaderPemakaianSpBbm','trDetailPemSpBbm/*','trHeaderPinGudSpBbm','trDetailPinGudSpBbm/*','trHeaderRetPemSpBbm','trDetailRetPemSpBbm/*','trHeaderKoreksiSpBbm','trDetailKoreksiSpBbm/*','trHeaderPemakaianBbm','trDetailPemBbm/*','histPemakaian','stInvent','periodeOperasional','users') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
            <a href="#" class="{{ request()->is('trHeaderPb','trDetailPb/*','trHeaderPindahGudang','trDetailPindahGudang/*','trHeaderReturPemakaian','trDetailReturPemakaian/*','trHeaderKoreksiSo','trDetailKoreksiSo/*','trHeaderPemakaianSpBbm','trDetailPemSpBbm/*','trHeaderPinGudSpBbm','trDetailPinGudSpBbm/*','trHeaderRetPemSpBbm','trDetailRetPemSpBbm/*','trHeaderKoreksiSpBbm','trDetailKoreksiSpBbm/*','trHeaderPemakaianBbm','trDetailPemBbm/*','histPemakaian','stInvent','periodeOperasional','users') ? 'nav-link active' : 'nav-link' }} zoominout">
              <i class="nav-icon fas fa-book zoominout_act"></i>
              <p>
                Inputan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('trHeaderPb') }}" class="{{ request()->is('trHeaderPb','trDetailPb/*') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input PB</p>
                </a>
              </li>
              @auth
              @if(Auth::user()->level != "logisticUser")
              <li class="{{ request()->is('trHeaderPindahGudang','trDetailPindahGudang/*','trHeaderReturPemakaian','trDetailReturPemakaian/*','trHeaderKoreksiSo','trDetailKoreksiSo/*') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penerimaan<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('trHeaderPindahGudang') }}" class="{{ request()->is('trHeaderPindahGudang','trDetailPindahGudang/*') ? 'nav-link active' : 'nav-link' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>13 - Pindah Gudang </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('trHeaderReturPemakaian') }}" class="{{ request()->is('trHeaderReturPemakaian','trDetailReturPemakaian/*') ? 'nav-link active' : 'nav-link' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>14 - Retur Pemakaian </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('trHeaderKoreksiSo') }}" class="{{ request()->is('trHeaderKoreksiSo','trDetailKoreksiSo/*') ? 'nav-link active' : 'nav-link' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>19 - Koreksi SO </p>
                    </a>
                  </li>                
                </ul>
              </li>              

              <li class="{{ request()->is('trHeaderPemakaianSpBbm','trDetailPemSpBbm/*','trHeaderPinGudSpBbm','trDetailPinGudSpBbm/*','trHeaderRetPemSpBbm','trDetailRetPemSpBbm/*','trHeaderKoreksiSpBbm','trDetailKoreksiSpBbm/*') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengeluaran SP<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('trHeaderPemakaianSpBbm') }}" class="{{ request()->is('trHeaderPemakaianSpBbm','trDetailPemSpBbm/*') ? 'nav-link active' : 'nav-link' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>21 - Pemakaian </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('trHeaderPinGudSpBbm') }}" class="{{ request()->is('trHeaderPinGudSpBbm','trDetailPinGudSpBbm/*') ? 'nav-link active' : 'nav-link' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>23 - Pindah Gudang </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('trHeaderRetPemSpBbm') }}" class="{{ request()->is('trHeaderRetPemSpBbm','trDetailRetPemSpBbm/*') ? 'nav-link active' : 'nav-link' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>24 - Retur Pembelian </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('trHeaderKoreksiSpBbm') }}" class="{{ request()->is('trHeaderKoreksiSpBbm','trDetailKoreksiSpBbm/*') ? 'nav-link active' : 'nav-link' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>29 - Koreksi SO </p>
                    </a>
                  </li>           
                </ul>
              </li>
              <li class="{{ request()->is('trHeaderPemakaianBbm','trDetailPemBbm/*') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengeluaran BBM<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('trHeaderPemakaianBbm') }}" class="{{ request()->is('trHeaderPemakaianBbm','trDetailPemBbm/*') ? 'nav-link active' : 'nav-link' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>21 - Pemakaian </p>
                    </a>
                  </li>                  
                </ul>
              </li>
              @endif
              @endauth
              <hr>
              <li class="nav-item">
                <a href="{{ route('histPemakaian') }}" class="{{ request()->is('histPemakaian') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>History Pemakaian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('stInvent') }}" class="{{ request()->is('stInvent') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inventory List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('processQty') }}" class="{{ request()->is('processQty') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Process Qty</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('processGlobal') }}" class="{{ request()->is('processGlobal') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Process Global</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="{{ route('periodeOperasional') }}" class="{{ request()->is('periodeOperasional') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Periode Operasional</p>
                </a>
              </li>
              

              @auth
              @if(Auth::user()->level == "administrator")
              <li class="nav-item">
                <a href="{{ route('users') }}" class="{{ request()->is('users') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>              
              @endif
              @endauth
            </ul>
          </li>
          <li class="{{ request()->is('spRekMuStok','spRincMuStok','spPenerimaan','spRekPemPerUnit','spRincPemPerUnit','spInventaris','spChainsawman','spMoving') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
            <a href="#" class="{{ request()->is('spRekMuStok','spRincMuStok','spPenerimaan','spRekPemPerUnit','spRincPemPerUnit','spInventaris','spChainsawman','spMoving') ? 'nav-link active' : 'nav-link' }} zoominout">
              <i class="nav-icon fas fa-tools zoominout_act"></i>
              <p>
                Laporan SparePart
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('spRekMuStok') }}" class="{{ request()->is('spRekMuStok') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SP Rekap Mutasi Stok</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('spRincMuStok') }}" class="{{ request()->is('spRincMuStok') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SP Rincian Mutasi Stok</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('spPenerimaan') }}" class="{{ request()->is('spPenerimaan') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SP Penerimaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('spRekPemPerUnit') }}" class="{{ request()->is('spRekPemPerUnit') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SP Rekap Pemakaian Perunit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('spRincPemPerUnit') }}" class="{{ request()->is('spRincPemPerUnit') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SP Rincian Pemakaian Per Unit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('spInventaris') }}" class="{{ request()->is('spInventaris') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SP Inventaris</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('spChainsawman') }}" class="{{ request()->is('spChainsawman') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SP Chainsawman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('spMoving') }}" class="{{ request()->is('spMoving') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SP Moving Status</p>
                </a>
              </li>              
            </ul>
          </li>

          <li class="{{ request()->is('bbmRekMuStok','bbmPenerimaan','bbmRekPemPerUnit','bbmBantuan','bbmRincPemPerUnit','bbmRincPemPerUnitPerHari') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
            <a href="#" class="{{ request()->is('bbmRekMuStok','bbmPenerimaan','bbmRekPemPerUnit','bbmBantuan','bbmRincPemPerUnit','bbmRincPemPerUnitPerHari') ? 'nav-link active' : 'nav-link' }} zoominout">
              <i class="nav-icon fas fa-gas-pump zoominout_act"></i>
              <p>
                Laporan BBM
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="{{ route('bbmRekMuStok') }}" class="{{ request()->is('bbmRekMuStok') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BBM Rekap Mutasi Stok</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('bbmPenerimaan') }}" class="{{ request()->is('bbmPenerimaan') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BBM Penerimaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('bbmRekPemPerUnit') }}" class="{{ request()->is('bbmRekPemPerUnit') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BBM Rekap Pemakaian Perunit</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="{{ route('bbmRincPemPerUnit') }}" class="{{ request()->is('bbmRincPemPerUnit') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BBM Rincian Pemakaian Per Unit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('bbmRincPemPerUnitPerHari') }}" class="{{ request()->is('bbmRincPemPerUnitPerHari') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BBM Rincian Pemakaian Per Unit Per Hari</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('bbmBantuan') }}" class="{{ request()->is('bbmBantuan') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BBM Bantuan</p>
                </a>
              </li>
            </ul>
          </li>          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>