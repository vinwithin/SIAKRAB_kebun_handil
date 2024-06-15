<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    #[Layout('components.layouts.admin.auth')] 

    public function render()
    {
        return view('livewire.login');
    }
    
    public function save(Request $request){

        $validateData = $this->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:32',
        ]);
            if (Auth::attempt($validateData)) {
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard')->with("success", "Login Berhasil");
            } else {
                return back()->with('loginFailed', 'Email dan Password salah!');
            }
        }

        public function logout(Request $request){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
    
}
