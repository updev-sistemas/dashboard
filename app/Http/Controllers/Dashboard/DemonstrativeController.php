<?php

namespace App\Http\Controllers\Dashboard;

use App\Demostrative;
use App\Enterprise;
use App\Handlers\PayloadHandler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DemonstrativeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function showDashboardView($id, Request $request)
    {
        $enterprise = Enterprise::query()->where([['id', '=', $id], ['user_id', '=', Auth::id()]])->first();
        if ($enterprise == null) {
            session()->flash('WARN',"Empresa {$id} não foi localizado.");
            return redirect()->route("env_ctm");
        }

        $demonstrative = Demostrative::query()->where('enterprise_id', '=', $enterprise->id)->first();
        if ($demonstrative == null) {
            $demonstrative = new Demostrative();
            $demonstrative->payload = json_encode("{}");
            $demonstrative->enterprise_id = $id;
            $demonstrative->save();
        }

        $sanitize = $demonstrative->sanitize();

        return view('dashboard.demonstrative.dashboard_page')
            ->with('demonstrative', $demonstrative)
            ->with('show', true)
            ->with('payload', $sanitize)
            ->with('enterprise', $enterprise);
    }

    public function showContasPagarView($id, Request $request)
    {
        $enterprise = Enterprise::query()->where([['id', '=', $id], ['user_id', '=', Auth::id()]])->first();

        if ($enterprise == null) {
            session()->flash('WARN',"Empresa {$id} não foi localizado.");
            return redirect()->route("env_ctm");
        }

        $demonstrative = Demostrative::query()->where('enterprise_id', '=', $enterprise->id)->first();
        if ($demonstrative == null) {
            $demonstrative = new Demostrative();
            $demonstrative->payload = json_encode("{}");
            $demonstrative->enterprise_id = $id;
            $demonstrative->save();
        }

        $sanitize = $demonstrative->sanitize();

        return view('dashboard.demonstrative.contas_a_pagar_page')
            ->with('show', true)
            ->with('demonstrative', $demonstrative)
            ->with('enterprise', $enterprise)
            ->with('payload', $sanitize);
    }

    public function showContasReceberView($id, Request $request)
    {
        $enterprise = Enterprise::query()->where([['id', '=', $id], ['user_id', '=', Auth::id()]])->first();

        if ($enterprise == null) {
            session()->flash('WARN',"Empresa {$id} não foi localizado.");
            return redirect()->route("env_ctm");
        }

        $demonstrative = Demostrative::query()->where('enterprise_id', '=', $enterprise->id)->first();
        if ($demonstrative == null) {
            session()->flash('WARN',"Demonstrativos da Empresa {$id} não foi localizado.");
            return redirect()->route("env_ctm");
        }

        $sanitize = $demonstrative->sanitize();

        return view('dashboard.demonstrative.contas_a_receber_page')
            ->with('show', true)
            ->with('enterprise', $demonstrative->enterprise)
            ->with('demonstrative', $demonstrative)
            ->with('payload', $sanitize);
    }

    public function showCaixasAbertosView($id, Request $request)
    {
        $enterprise = Enterprise::query()->where([['id', '=', $id], ['user_id', '=', Auth::id()]])->first();

        if ($enterprise == null) {
            session()->flash('WARN',"Empresa {$id} não foi localizado.");
            return redirect()->route("env_ctm");
        }

        $demonstrative = Demostrative::query()->where('enterprise_id', '=', $enterprise->id)->first();
        if ($demonstrative == null) {
            session()->flash('WARN',"Demonstrativos da Empresa {$id} não foi localizado.");
            return redirect()->route("env_ctm");
        }

        $sanitize = $demonstrative->sanitize();

        return view('dashboard.demonstrative.caixas_abertos_page')
            ->with('show', true)
            ->with('enterprise', $demonstrative->enterprise)
            ->with('demonstrative', $demonstrative)
            ->with('payload', $sanitize);
    }

    public function showMinhasVendasView($id, Request $request)
    {
        $enterprise = Enterprise::query()->where([['id', '=', $id], ['user_id', '=', Auth::id()]])->first();

        if ($enterprise == null) {
            session()->flash('WARN',"Empresa {$id} não foi localizado.");
            return redirect()->route("env_ctm");
        }

        $demonstrative = Demostrative::query()->where('enterprise_id', '=', $enterprise->id)->first();
        if ($demonstrative == null) {
            session()->flash('WARN',"Demonstrativos da Empresa {$id} não foi localizado.");
            return redirect()->route("env_ctm");
        }

        $sanitize = $demonstrative->sanitize();

        return view('dashboard.demonstrative.minhas_vendas_page')
            ->with('show', true)
            ->with('demonstrative', $demonstrative)
            ->with('enterprise', $enterprise)
            ->with('payload', $sanitize);
    }

    public function showVendedoresView($id, Request $request)
    {
        $enterprise = Enterprise::query()->where([['id', '=', $id], ['user_id', '=', Auth::id()]])->first();

        if ($enterprise == null) {
            session()->flash('WARN',"Empresa {$id} não foi localizado.");
            return redirect()->route("env_ctm");
        }

        $demonstrative = Demostrative::query()->where('enterprise_id', '=', $enterprise->id)->first();
        if ($demonstrative == null) {
            session()->flash('WARN',"Demonstrativos da Empresa {$id} não foi localizado.");
            return redirect()->route("env_ctm");
        }

        $sanitize = $demonstrative->sanitize();

        return view('dashboard.demonstrative.vendedores_page')
            ->with('show', true)
            ->with('enterprise', $demonstrative->enterprise)
            ->with('demonstrative', $demonstrative)
            ->with('payload', $sanitize);
    }
}
