
@extends('components/layouts/app')
@section('content')
<div class="container mt-2 p-4  w-75">
    <h1 class="border-bottom border-warning p-2">Struktur Organisasi</h1>
</div>
    <div class="container  w-75">
        <div class="org-chart">
            <!-- Level 1 -->
            <div class="org-level">
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">LURAH</h5>
                    </div>
                </div>
            </div>
            <!-- Connectors -->
            <div class="connector"></div>
            <div class="org-level">
                <div class="horizontal-connector">
                    <div class="connector"></div>
                    <div class="connector"></div>
                </div>
            </div>
            <!-- Level 2 -->
            <div class="org-level">
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">JABATAN FUNGSIONAL</h5>
                    </div>
                </div>
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">SEKRETARIS</h5>
                    </div>
                </div>
            </div>
            <!-- Connectors -->
            <div class="connector"></div>
            <div class="org-level">
                <div class="horizontal-connector">
                    <div class="connector"></div>
                    <div class="connector"></div>
                </div>
            </div>
            <!-- Level 3 -->
            <div class="org-level">
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">KASI PEMBERDAYAAN MASYARAKAT DAN KESEJAHTERAAN SOSIAL</h5>
                    </div>
                </div>
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">KASI PEMERINTAH DAN PELAYANAN UMUM</h5>
                    </div>
                </div>
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">KASI KEAMANAN DAN KETERTIBAN</h5>
                    </div>
                </div>
            </div>
            <!-- Connectors -->
            <div class="connector"></div>
            <div class="org-level">
                <div class="horizontal-connector">
                    <div class="connector"></div>
                    <div class="connector"></div>
                    <div class="connector"></div>
                </div>
            </div>
            <!-- Level 4 -->
            <div class="org-level">
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">STAF</h5>
                    </div>
                </div>
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">STAF</h5>
                    </div>
                </div>
                <div class="card org-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">STAF</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection