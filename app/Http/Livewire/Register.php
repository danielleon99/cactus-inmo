<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Register extends Component
{

    public $name, $email, $password, $repassw, $terms = false;

    public function render()
    {
        return view('livewire.register');
    }

    public function register()
    {

        try {
        
        if($this->password != $this->repassw)
        {
            session()->flash('message', 'Las contraseñas no coinciden');
            $this->password = '';
            $this->repassw = '';
            return;
        }

        if(trim($this->email) == "" || trim($this->repassw) == "" 
        || trim($this->name) == "" || trim($this->password) == "" || !$this->terms)
        {
            session()->flash('message', 'Debe llenar todos los campos y acepater los términos');
            return;
        }

        $values["name"] = $this->name;
        $values["email"] = $this->email;
        $values["password"] = Crypt::encryptString($this->password);

        $new = new User($values);
        $new->save();

        return redirect()->to('/login');

        } catch (\Exception $th) {
            
            session()->flash('message', $th->getMessage());
        }
    }
}
