<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">PPID Klaten</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">PPID</a>
    </div>
    <ul class="sidebar-menu">
      @auth
        @if (auth()->user()->level == 'admin')    
          <li class="menu-header">Dashboard</li>
          <li class="nav-item {{ ($active === 'dashboard')? 'active' : '' }}">
            <a href="/">
              <i class="fas fa-chalkboard"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="nav-item {{ ($active === 'admin')? 'active' : '' }}">
            <a href="/user">
              <i class="fas fa-user"></i>
              <span>Admin</span>
            </a>
          </li>
          <li class="menu-header">Pengajuan Informasi</li>
          <li class="nav-item {{ ($active === 'permohonan_informasi')? 'active' : '' }}">
            <a href="/permohonan-informasi" class="nav-link">
              <i class="fas fa-file-medical"></i>
              <span>Permohoanan Informasi</span>
            </a>
          </li>
          <li class="nav-item {{ ($active === 'keberatan_informasi')? 'active' : '' }}">
            <a href="/keberatan-informasi" class="nav-link">
              <i class="fas fa-file-excel"></i>
              <span>Keberatan Informasi</span>
            </a>
          </li>
          <li class="menu-header">Informasi Publik</li>
          <li class="nav-item {{ ($active === 'berkala')? 'active' : '' }}">
            <a href="/berkala" class="nav-link">
              <i class="fas fa-sync"></i>
              <span>Berkala</span>
            </a>
          </li>
          <li class="nav-item {{ ($active === 'serta_merta')? 'active' : '' }}">
            <a href="/serta-merta" class="nav-link">
              <i class="fas fa-stopwatch"></i>
              <span>Serta Merta</span>
            </a>
          </li>
          <li class="nav-item {{ ($active === 'setiap_saat')? 'active' : '' }}">
            <a href="setiap-saat" class="nav-link">
              <i class="fas fa-clock"></i>
              <span>Setiap Saat</span>
            </a>
          </li>
          <li class="menu-header">Menu</li>
          <li class="nav-item {{ ($active === 'carousel' || $active === 'teks_beranda' )? 'active' : '' }} dropdown">
            <a href="#" class="nav-link has-dropdown">
              <i class="fas fa-home"></i>
              <span>Beranda</span>
            </a>
            <ul class="dropdown-menu">
              <li class="{{ ($active === 'carousel' )? 'active' : '' }}">
                <a href="/carousel" class="nav-link">
                  <span>Carousel</span>
                </a>
              </li>
              <li class="{{ ($active === 'teks_beranda' )? 'active' : '' }}">
                <a href="/teks-beranda" class="nav-link">
                  <span>Teks Beranda</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item  {{ ($active === 'visi_misi' || $active === 'tugas_wewenang' || $active === 'struktur' || $active === 'maklumat')? 'active' : '' }} dropdown">
            <a href="#" class="nav-link has-dropdown">
              <i class="fas fa-id-card"></i>
              <span>Profil</span>
            </a>
            <ul class="dropdown-menu">
              <li class="{{ ($active === 'visi_misi')? 'active' : '' }}">
                <a href="/visi-misi" class="nav-link">
                  <span>Visi Misi</span>
                </a>
              </li>
              <li class="{{ ($active === 'tugas_wewenang')? 'active' : '' }}">
                <a href="/tugas-wewenang" class="nav-link">
                  <span>Tugas & Wewenang</span>
                </a>
              </li>
              <li class="{{ ($active === 'struktur')? 'active' : '' }}">
                <a href="/struktur" class="nav-link">
                  <span>Struktur</span>
                </a>
              </li>
              <li class="{{ ($active === 'maklumat')? 'active' : '' }}">
                <a href="/maklumat" class="nav-link">
                  <span>Maklumat</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ ($active === 'dokumen')? 'active' : '' }}">
            <a href="/dokumen" class="nav-link">
              <i class="fas fa-file-alt"></i>
              <span>Dokumen</span>
            </a>
          </li>
          <li class="nav-item {{ ($active === 'ppid_pembantu')? 'active' : '' }}">
            <a href="/ppid-pembantu" class="nav-link">
              <i class="fas fa-building"></i>
              <span>PPID Pembantu</span>
            </a>
          </li>
        @endif
        @if (auth()->user()->level == 'opd')
          <li class="menu-header">Dashboard</li>
          <li class="nav-item {{ ($active === 'dashboard')? 'active' : '' }}">
            <a href="/">
              <i class="fas fa-chalkboard"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="menu-header">Pengajuan Informasi</li>
          <li class="nav-item {{ ($active === 'permohonan_informasi')? 'active' : '' }}">
            <a href="/permohonan-informasi" class="nav-link">
              <i class="fas fa-file-medical"></i>
              <span>Permohoanan Informasi</span>
            </a>
          </li>
          <li class="nav-item {{ ($active === 'keberatan_informasi')? 'active' : '' }}">
            <a href="/keberatan-informasi" class="nav-link">
              <i class="fas fa-file-excel"></i>
              <span>Keberatan Informasi</span>
            </a>
          </li>
          <li class="menu-header">Menu</li>
          <li class="nav-item  {{ ($active === 'visi_misi' || $active === 'tugas_wewenang' || $active === 'struktur' || $active === 'maklumat')? 'active' : '' }} dropdown">
            <a href="#" class="nav-link has-dropdown">
              <i class="fas fa-id-card"></i>
              <span>Profil</span>
            </a>
            <ul class="dropdown-menu">
              <li class="{{ ($active === 'visi_misi')? 'active' : '' }}">
                <a href="/visi-misi" class="nav-link">
                  <span>Visi Misi</span>
                </a>
              </li>
              <li class="{{ ($active === 'tugas_wewenang')? 'active' : '' }}">
                <a href="/tugas-wewenang" class="nav-link">
                  <span>Tugas & Wewenang</span>
                </a>
              </li>
              <li class="{{ ($active === 'struktur')? 'active' : '' }}">
                <a href="/struktur" class="nav-link">
                  <span>Struktur</span>
                </a>
              </li>
              <li class="{{ ($active === 'maklumat')? 'active' : '' }}">
                <a href="/maklumat" class="nav-link">
                  <span>Maklumat</span>
                </a>
              </li>
            </ul>
          </li>
        @endif
      @else
        <li class="menu-header">Pengajuan Informasi</li>
        <li class="nav-item {{ ($active === 'permohonan_informasi')? 'active' : '' }}">
          <a href="/permohonan-informasi" class="nav-link">
            <i class="fas fa-file-medical"></i>
            <span>Permohoanan Informasi</span>
          </a>
        </li>
        <li class="nav-item {{ ($active === 'keberatan_informasi')? 'active' : '' }}">
          <a href="/keberatan-informasi" class="nav-link">
            <i class="fas fa-file-excel"></i>
            <span>Keberatan Informasi</span>
          </a>
        </li>
      @endauth
    </ul>
  </aside>
</div>