<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Login extends Component
{

    public $email, $password;

    public function render()
    {
        return view('livewire.login');
    }

    public function login()
    {

        try {

            $user = User::where("email", $this->email)->first();
            
            if(!$user)
            {
                session()->flash('message', 'Email incorrecto');
                return;
            }
        
            if(Crypt::decryptString($user->password) != $this->password)
            {
                session()->flash('message', 'Contraseña incorrecta');
                return;
            }
        
            return redirect()->to('/properties');

        } catch (\Exception $th) {
            
            session()->flash('message', $th->getMessage());
        }
    }
}
