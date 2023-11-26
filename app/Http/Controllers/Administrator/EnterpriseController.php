<?php

namespace App\Http\Controllers\Administrator;

use App\Customer;
use App\Enterprise;
use App\Http\Requests\EnterpriseCreateRequest;
use App\Http\Requests\UserCreateRequest;
use App\Utils\Enumerables\UserStatusEnum;
use App\Utils\Enumerables\UserTypeEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class EnterpriseController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enterprises = Enterprise::query()->orderBy('fantasia')->paginate(10, ['*'] );

        return view('administrator.enterprise.index_adm')->with('collection', $enterprises);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.enterprise.create');
    }


    public function createNew($id)
    {
        $user = Customer::find($id);

        if ($user == null) {
            session()->flash('WARN',"Cliente {$id} não foi localizada.");
            return redirect()->back();
        }

        if ($user->id_status != UserStatusEnum::ACTIVE) {
            session()->flash('WARN',"Cliente {$id} não está ativo.");
            return redirect()->back();
        }


        return view('administrator.enterprise.create_new_enterprise')
                ->with('customer', $user);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnterpriseCreateRequest $request)
    {
        try
        {
            $data = [
                'user_id' => $request->get('user_id'),
                'cnpj' => $request->get('cnpj'),
                'razao_social' => $request->get('razao_social'),
                'fantasia' => $request->get('fantasia'),
                'email' => $request->get('email'),
                'uuid' => Uuid::uuid4()->toString()
            ];
            $enterprise = new Enterprise($data);
            $enterprise->save();

            session()->flash('SUCCESS', 'Empresa criada com sucesso.');

            return redirect()->route('empresas.show',['id' => $enterprise->id]);
        }
        catch (\Exception $ex) {
            session()->flash('ERROR','Ocorreu um erro ao criar a empresa.');

            logger('Tentativa de criar uma empresa');
            logger($request->all());
            logger($ex);

            return redirect()->route('empresas.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enterprise = Enterprise::find($id);

        if ($enterprise == null) {
            session()->flash('WARN',"Empresa {$id} não foi localizada.");
            return redirect()->route("empresas.index");
        }

        return view('administrator.enterprise.show')->with('enterprise', $enterprise);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enterprise = Enterprise::find($id);

        if ($enterprise == null) {
            session()->flash('WARN',"Empresa {$id} não foi localizada.");
            return redirect()->route("empresas.index");
        }

        return view('administrator.enterprise.edit')->with('enterprise', $enterprise);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $enterprise = Enterprise::find($id);

            if ($enterprise == null) {
                session()->flash('WARN',"Empresa {$id} não foi localizada.");
                return redirect()->route("empresas.index");
            }

            $enterprise->fill($request->all());
            $enterprise->save();

            session()->flash('SUCCESS', 'Empresa atualizada com sucesso.');

            return redirect()->route('empresas.show',['id' => $enterprise->id]);
        }
        catch (\Exception $ex) {
            session()->flash('ERROR','Ocorreu um erro ao atualizar a empresa.');

            logger('Tentativa de atualizar uma empresa');
            logger($request->all());
            logger($ex);

            return redirect()->route('empresas.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        throw new \Exception("Not Implemented");
    }
}
