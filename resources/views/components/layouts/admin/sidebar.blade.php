<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item ">
            <a href="/admin/dashboard" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>


        </li>

        <li class="sidebar-item  has-sub  {{ Request::is('admin/berita*') || Request::is('admin/kegiatan*')  ? 'active' : ''}} ">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Kelola Informasi</span>
            </a>

            <ul class="submenu ">

                <li class="submenu-item ">
                    <a href="/admin/berita" class="submenu-link">Berita</a>

                </li>

                <li class="submenu-item  ">
                    <a href="/admin/kegiatan" class="submenu-link">Kegiatan</a>

                </li>

                

            </ul>


        </li>

        <li class="sidebar-item  has-sub {{ Request::is('admin/surat*') ? 'active' : ''}}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-collection-fill"></i>
                <span>Kelola Surat</span>
            </a>

            <ul class="submenu ">

                <li class="submenu-item  ">
                    <a  href="/admin/surat" class="submenu-link">Daftar Surat</a>

                </li>

                <li class="submenu-item  ">
                    <a href="/admin/surat/diterima" class="submenu-link">Surat Diterima</a>

                </li>
                <li class="submenu-item  ">
                    <a href="/admin/surat/ditolak" class="submenu-link">Surat Ditolak</a>

                </li>
                
                
            </ul>


        </li>

        <li class="sidebar-item  has-sub {{ Request::is('admin/aduan*')  ? 'active' : ''}}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Kelola Aduan</span>
            </a>

            <ul class="submenu ">

                <li class="submenu-item  ">
                    <a href="/admin/aduan" class="submenu-link">Daftar Aduan</a>

                </li>

                
            </ul>


        </li>

        <li class="sidebar-title"> Data Master</li>
        <li class="sidebar-title" > 
            <a href="/admin/logout">Logout</a>
        </li>











        {{-- <li class="sidebar-title">Extra UI</li> --}}
    </ul>
</div>
