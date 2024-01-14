<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function profile()
    {
        return view('profile.info', ['target' => Auth::user()]);
    }

    public function profileUpdate(ProfileUpdateRequest $request)
    {
        try
        {
            $data = $request->only(['name','email']);
            $user = Auth::user();
            $user->fill($data);
            $user->update();

            session()->flash('SUCCESS', 'Perfil atualizado com sucesso.');

            return $this->redirect();

        }
        catch (\Exception $e)
        {
            logger($e->getMessage());
            session()->flash('ERROR','Ocorreu um erro ao atualizar o perfil.');
            return $this->redirect();
        }
    }

    public function password()
    {
        return view('profile.password', ['target' => Auth::user()]);
    }

    public function changePassword(PasswordUpdateRequest $request)
    {
        try
        {
            $user = Auth::user();
            $actualPassword = $request->get('password');

            if (!Hash::check($actualPassword, $user->getAuthPassword())) {
                throw new \InvalidArgumentException("Senha atual está incorreta.");
            }

            $newPassword = $request->get('new_password');
            $user->password = Hash::make($newPassword);
            $user->update();

            Auth::logoutOtherDevices($newPassword);

            session()->flash('SUCCESS', 'Senha alterada com sucesso.');
            return $this->redirect();
        }
        catch (\InvalidArgumentException $e)
        {
            logger($e->getMessage());
            session()->flash('ERROR', $e->getMessage());
            return redirect()->route('password_view');
        }
        catch (\Exception $e)
        {
            logger($e->getMessage());
            session()->flash('ERROR','Ocorreu um erro ao atualizar a senha.');
            return $this->redirect();
        }
    }

    private function redirect()
    {
        if (Auth::user()->isAdministratorUser()) {
            return redirect()->route('env_adm');
        } else {
            return redirect()->route('env_ctm');
        }
    }
}
