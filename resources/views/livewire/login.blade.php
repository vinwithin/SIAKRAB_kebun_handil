<div id="auth">
   
    <div class="row h-100">
        @if (session()->has('loginFailed'))
        <div class="alert alert-danger" role="alert">
            {{ session('loginFailed') }}
        </div>
    @endif
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="index.html" class="fs-2">SIAKRAB</a>
                </div>
                <h1 class="auth-title">Log in.</h1>
                <p class="auth-subtitle mb-5">Log in ke sistem SIAKRAB.</p>

                <form  wire:submit='save'>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" class="form-control form-control-xl" placeholder="Email" wire:model='email' required>
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>@error('email') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" placeholder="Password" wire:model='password' required>
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <div>@error('password') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-check form-check-lg d-flex align-items-end">
                        <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label text-gray-600" for="flexCheckDefault">
                            Keep me logged in
                        </label>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                </form>
                
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

</div>
