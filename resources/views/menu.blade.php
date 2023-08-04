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
          <li class="{{ request()->is('lokasi', 'jnsAlat','jnsAlat_tambah','fixedAsset', 'aktivitasAlat','sts_pemakaian','supplier','warehouse','merkBrg') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
            <a href="#" class="{{ request()->is('lokasi', 'jnsAlat','jnsAlat_tambah','fixedAsset', 'aktivitasAlat','sts_pemakaian','supplier','warehouse','merkBrg') ? 'nav-link active' : 'nav-link' }}">
              <i class="nav-icon fas fa-cogs"></i>
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
          
        
          <li class="{{ request()->is('trHeaderPb','trHeaderPindahGudang','trDetailPindahGudang/*','trHeaderPemakaianSpBbm','trDetailPemSpBbm/*','trHeaderPemakaianBbm','trDetailPemBbm/*','stInvent','trHistory','periodeOperasional','users') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
            <a href="#" class="{{ request()->is('trHeaderPb','trHeaderPindahGudang','trDetailPindahGudang/*','trHeaderPemakaianSpBbm','trDetailPemSpBbm/*','trHeaderPemakaianBbm','trDetailPemBbm/*','stInvent','trHistory','periodeOperasional','users') ? 'nav-link active' : 'nav-link' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Inputan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('trHeaderPb') }}" class="{{ request()->is('trHeaderPb') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input PB</p>
                </a>
              </li>
              <li class="{{ request()->is('trHeaderPindahGudang','trDetailPindahGudang/*','trHeaderTpnLmOut','trDetailTpnLmOut/*') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penerimaan<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('trHeaderPindahGudang') }}" class="{{ request()->is('trHeaderPindahGudang','trDetailPindahGudang/*') ? 'nav-link active' : 'nav-link' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pindah Gudang </p>
                    </a>
                  </li>                  
                </ul>
              </li>
              <li class="{{ request()->is('trHeaderPemakaianSpBbm','trDetailPemSpBbm/*') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengeluaran SP<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('trHeaderPemakaianSpBbm') }}" class="{{ request()->is('trHeaderPemakaianSpBbm','trDetailPemSpBbm/*') ? 'nav-link active' : 'nav-link' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pemakaian </p>
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
                      <p>Pemakaian </p>
                    </a>
                  </li>                  
                </ul>
              </li>
              
              <hr>
              <li class="nav-item">
                <a href="{{ route('stInvent') }}" class="{{ request()->is('stInvent') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Invent</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('processQty') }}" class="{{ request()->is('processQty') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Process Qty</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('trHistory') }}" class="{{ request()->is('trHistory') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>History</p>
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
              <li class="nav-item">
                <a href="admin/index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
              @endif
              @endauth
            </ul>
          </li>
          <li class="{{ request()->is('rptStokKayu','rptChainTrack','rptLoglistLoc','rptStokLoc','rptRekapHauling','rptRekapTkg','rptStokAkhGab') ? 'nav-item has-treeview menu-open' : 'nav-item' }}">
            <a href="#" class="{{ request()->is('rptStokKayu','rptChainTrack','rptLoglistLoc','rptStokLoc','rptRekapHauling','rptRekapTkg','rptStokAkhGab') ? 'nav-link active' : 'nav-link' }}">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('rptStokKayu') }}" class="{{ request()->is('rptStokKayu') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Kayu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rptChainTrack') }}" class="{{ request()->is('rptChainTrack') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cs - Traktor - Kupas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rptLoglistLoc') }}" class="{{ request()->is('rptLoglistLoc') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loglist</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rptStokLoc') }}" class="{{ request()->is('rptStokLoc') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Lokasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rptRekapHauling') }}" class="{{ request()->is('rptRekapHauling') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekap Hauling</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rptRekapTkg') }}" class="{{ request()->is('rptRekapTkg') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekap Tongkang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rptStokAkhGab') }}" class="{{ request()->is('rptStokAkhGab') ? 'nav-link active' : 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Akhir Gabungan</p>
                </a>
              </li>
            </ul>
          </li>          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>