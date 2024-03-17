<?php

namespace App\Http\Controllers\Administrator;

use App\Customer;
use App\Enterprise;
use App\Utils\Enumerables\UserStatusEnum;
use App\Utils\Enumerables\UserTypeEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
        $users = Customer::query()->orderBy('name')->paginate(10, ['*'] );
        return view('administrator.users.index')->with('collection', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $data = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => 'NOT_SET_PASSOWRD',
                'id_type' => UserTypeEnum::CUSTOMER,
                'id_status' => UserStatusEnum::ACTIVE
            ];
            $customer = new Customer($data);
            $customer->save();

            session()->flash('SUCCESS', 'Cliente criado com sucesso.');

            return redirect()->route('clientes.show',['id' => $customer->id]);
        }
        catch (\Exception $ex) {
            session()->flash('ERROR','Ocorreu um erro ao criar o Cliente.');

            logger('Tentativa de criar um Cliente');
            logger($request->all());
            logger($ex);

            return redirect()->route('clientes.index');
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
        $customer = Customer::find($id);

        if ($customer == null) {
            session()->flash('WARN',"Cliente {$id} não foi localizada.");
            return redirect()->route("clientes.index");
        }

        return view('administrator.users.show')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);

        if ($customer == null) {
            session()->flash('WARN',"Cliente {$id} não foi localizada.");
            return redirect()->route("clientes.index");
        }

        return view('administrator.users.edit')->with('customer', $customer);
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
            $customer = Customer::find($id);

            if ($customer == null) {
                session()->flash('WARN',"Cliente {$id} não foi localizada.");
                return redirect()->route("clientes.index");
            }

            $customer->name = $request->get('name', $customer->name);
            $customer->email = $request->get('email', $customer->email);
            $status = $request->get('id_status', null);
            if ($status != null && $status != '') {
                $customer->id_status = $status;
            }

            $customer->update();

            session()->flash('SUCCESS', 'Cliente atualizado com sucesso.');

            return redirect()->route('clientes.show',['id' => $customer->id]);
        }
        catch (\Exception $ex) {
            session()->flash('ERROR','Ocorreu um erro ao atualizar o Cliente.');

            logger('Tentativa de atualizar um Cliente');
            logger($request->all());
            logger($ex);

            return redirect()->route('clientes.index');
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

    public function showEnterpriseByCustomer($id)
    {
        $customer = Customer::find($id);
        if ($customer == null) {
            session()->flash('WARN',"Cliente {$id} não foi localizada.");
            return redirect()->route("clientes.index");
        }

        $enterprises = Enterprise::query()->orderBy('fantasia')->where('user_id', '=', $customer->id)->paginate(10, ['*'] );

        return view('administrator.enterprise.show_by_customer')
            ->with('customer', $customer)
            ->with('collection', $enterprises);
    }
}
