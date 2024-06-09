<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class=" d-flex justify-content-between m-2">
    <h3>Profile Statistics</h3>
    <div class="d-flex align-items-center m-0">
        <div class="avatar avatar-xl">
            <img src="/image/1.jpg" alt="Face 1">
        </div>
        <div class="ms-3 name">
            <h5 class="font-bold">{{ auth()->user()->name }}</h5>
            <h6 class="text-muted mb-0">{{ auth()->user()->email }}</h6>
        </div>
    </div>
</div>
