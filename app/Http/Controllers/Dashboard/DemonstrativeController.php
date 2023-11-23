<?php

namespace App\Http\Controllers\Dashboard;

use App\Demostrative;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $demonstrative = Demostrative::query()->where('enterprise_id', '=', $id)->orderByDesc('updated_at')->first();

        if ($demonstrative == null) {
            session()->flash('WARN',"Demonstrativos da Empresa {$id} não foi localizado.");
            return redirect()->route("env_ctm");
        }

        $sanitize = json_decode($demonstrative->sanitize());

        return view('dashboard.demonstrative.dashboard_page')
            ->with('show', true)
            ->with('enterprise', $demonstrative->enterprise)
            ->with('demonstrative', $demonstrative)
            ->with('payload', $sanitize);
    }

    public function showContasPagarView($id, Request $request)
    {
        $demonstrative = Demostrative::query()->where('enterprise_id', '=', $id)->orderByDesc('updated_at')->first();

        if ($demonstrative == null) {
            session()->flash('WARN',"Demonstrativos da Empresa {$id} não foi localizado.");
            return redirect()->route("env_ctm");
        }

        $sanitize = json_decode($demonstrative->sanitize());

        return view('dashboard.demonstrative.contas_a_pagar_page')
            ->with('show', true)
            ->with('enterprise', $demonstrative->enterprise)
            ->with('demonstrative', $demonstrative)
            ->with('payload', $sanitize);
    }

    public function showContasReceberView($id, Request $request)
    {
        $demonstrative = Demostrative::query()->where('enterprise_id', '=', $id)->orderByDesc('updated_at')->first();
        if ($demonstrative == null) {
            session()->flash('WARN',"Demonstrativos da Empresa {$id} não foi localizado.");
            return redirect()->route("env_ctm");
        }

        $sanitize = json_decode($demonstrative->sanitize());

        return view('dashboard.demonstrative.contas_a_receber_page')
            ->with('show', true)
            ->with('enterprise', $demonstrative->enterprise)
            ->with('demonstrative', $demonstrative)
            ->with('payload', $sanitize);
    }

    public function showCaixasAbertosView($id, Request $request)
    {
        $demonstrative = Demostrative::query()->where('enterprise_id', '=', $id)->orderByDesc('updated_at')->first();

        if ($demonstrative == null) {
            session()->flash('WARN',"Demonstrativos da Empresa {$id} não foi localizado.");
            return redirect()->route("env_ctm");
        }

        $sanitize = json_decode($demonstrative->sanitize());

        return view('dashboard.demonstrative.dashboard_page')
            ->with('show', true)
            ->with('enterprise', $demonstrative->enterprise)
            ->with('demonstrative', $demonstrative)
            ->with('payload', $sanitize);
    }

    public function showMinhasVendasView($id, Request $request)
    {
        $demonstrative = Demostrative::query()->where('enterprise_id', '=', $id)->orderByDesc('updated_at')->first();

        if ($demonstrative == null) {
            session()->flash('WARN',"Demonstrativos da Empresa {$id} não foi localizado.");
            return redirect()->route("env_ctm");
        }

        $sanitize = json_decode($demonstrative->sanitize());

        return view('dashboard.demonstrative.dashboard_page')
            ->with('show', true)
            ->with('enterprise', $demonstrative->enterprise)
            ->with('demonstrative', $demonstrative)
            ->with('payload', $sanitize);
    }

    public function showVendedoresView($id, Request $request)
    {
        $demonstrative = Demostrative::query()->where('enterprise_id', '=', $id)->orderByDesc('updated_at')->first();

        if ($demonstrative == null) {
            session()->flash('WARN',"Demonstrativos da Empresa {$id} não foi localizado.");
            return redirect()->route("env_ctm");
        }

        $sanitize = json_decode($demonstrative->sanitize());

        return view('dashboard.demonstrative.dashboard_page')
            ->with('show', true)
            ->with('enterprise', $demonstrative->enterprise)
            ->with('demonstrative', $demonstrative)
            ->with('payload', $sanitize);
    }
}
