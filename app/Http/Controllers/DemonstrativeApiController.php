<?php

namespace App\Http\Controllers;

use App\Demostrative;
use App\Enterprise;
use App\Utils\Enumerables\UserStatusEnum;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DemonstrativeApiController extends Controller
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

    public function registerAlt(Request $request)
    {
        try
        {
            $document = $request->get('documento', '');
            $dataJson = \json_encode($request->get('json'));

            if (empty($document) || empty($dataJson))
            {
                throw new \Exception("Dados de envio estão inválidos.");
            }

            $enterprise = Enterprise::query()->where('cnpj','=', $document)->first();

            if ($enterprise == null) {
                throw new \Exception("Empresa não foi localizada.");
            }

            if ($enterprise->user->id_status == UserStatusEnum::SUSPENDED) {
                throw new \Exception("Conta suspensa, por favor, entre em contato com o suporte técnico.");
            }

            $demostrative = Demostrative::query()->where('enterprise_id','=', $enterprise->id)->first();
            if ($demostrative == null)
            {
                $dataToSave = [
                    'payload' => $dataJson,
                    'enterprise_id' => $enterprise->id
                ];

                $demostrative = new Demostrative($dataToSave);
                $demostrative->save();
            }
            else
            {
                $demostrative->payload = $dataJson;
                $demostrative->updated_at = Carbon::now();
                $demostrative->update();
            }

            return response(['status' =>'Sucesso', 'Return' => 200], 200);
        }
        catch (\Exception $e)
        {
            logger('Ocorreu um erro durante a integração');
            logger($e);
            logger($request->all());

            return response(['status' =>'ERROR', 'return' => $e->getCode()], 400);
       }
    }

    public function register($pathUuid, $id, Request $request)
    {
        try
        {
            $uuid = decrypt($id);
            if ($uuid == $pathUuid) {
                $dataJson = json_encode($request->all());

                $enterprise = Enterprise::query()->where('uuid', '=', $uuid)->firstOrFail();

                if ($enterprise == null) {
                    throw new \Exception("Empresa não foi localizada.");
                }

                if ($enterprise->user->id_status == UserStatusEnum::SUSPENDED) {
                    throw new \Exception("Conta suspensa, por favor, entre em contato com o suporte técnico.");
                }

                $demostrative = Demostrative::query()->where('enterprise_id', '=', $enterprise->id)->first();
                if ($demostrative == null) {
                    $dataToSave = [
                        'payload' => $dataJson,
                        'enterprise_id' => $enterprise->id
                    ];

                    $demostrative = new Demostrative($dataToSave);
                    $demostrative->save();
                } else {
                    $demostrative->payload = $dataJson;
                    $demostrative->updated_at = Carbon::now();
                    $demostrative->update();
                }

                return response(['status' => 'Atualizado', 'return' => 200], 200);
            }
            else {
                return response(['status' => 'Atualizado', 'return' => 404], 200);
            }
        }
        catch (\Exception $e)
        {
            logger('Ocorreu um erro durante a integração');
            logger($e);
            logger($id);
            logger($request->all());
            return response(['status' =>'ERROR', 'Message' => $e->getMessage() ,'return' => $e->getCode()], 400);
        }
    }

}
