<?php

namespace App\Http\Controllers;

use App\Demostrative;
use App\Enterprise;
use App\Handlers\PayloadHandler;
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

    public function getPayload($storeId, Request $request)
    {
        try
        {
            $id = decrypt($storeId);
            $demonstrative = Demostrative::query()->where('enterprise_id', '=', $id)->first();

            if ($demonstrative == null) {
                throw new \Exception("Demonstrativos da Empresa {$id} não foi localizado.");
            }

            $sanitize = $demonstrative->sanitize();

            return response(json_encode($sanitize), 200);
        }
        catch (\Exception $e)
        {
            return response(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }


    public function registerAlt(Request $request)
    {

        try {
            throw new \InvalidArgumentException("Use a API com validação.");
            $document = $request->get('documento', '');
            $dataJson = \json_encode($request->get('json'));

            if (empty($document) || empty($dataJson)) {
                throw new \Exception("Dados de envio estão inválidos.");
            }

            $enterprise = Enterprise::query()->where('cnpj', '=', $document)->first();

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

            return response(['status' => 'Sucesso', 'Return' => 200], 200);
        } catch (\Exception $e) {
            logger('Ocorreu um erro durante a integração');
            logger($e);
            logger($request->all());

            return response(['status' => 'ERROR', 'return' => $e->getCode()], 400);
        }
    }


    public function registerWithValidation($id, Request $request)
    {
        try {
            $uuid = decrypt($id);

            $enterprise = Enterprise::query()->where('uuid', '=', $uuid)->firstOrFail();

            if ($enterprise == null) {
                throw new \Exception("Empresa não foi localizada.");
            }

            if ($enterprise->user->id_status == UserStatusEnum::SUSPENDED) {
                throw new \Exception("Conta suspensa, por favor, entre em contato com o suporte técnico.");
            }

            $data = $request->all();
            $ph = new PayloadHandler();
            $objectMounted = $ph->handler($data);
            if ($objectMounted == null) {
                return response([
                    'status' => 'Error',
                    'payload' => $data,
                    'Errors' => $ph->getErrors()
                ], 400);
            }
            else {

                $payloadStr = json_encode($objectMounted);

                $demostrative = Demostrative::query()->where('enterprise_id', '=', $enterprise->id)->first();
                if ($demostrative == null) {
                    $dataToSave = [
                        'payload' => $payloadStr,
                        'enterprise_id' => $enterprise->id
                    ];

                    $demostrative = new Demostrative($dataToSave);
                    $demostrative->save();
                } else {
                    $demostrative->payload = $payloadStr;
                    $demostrative->updated_at = Carbon::now();
                    $demostrative->update();
                }

                return response(['status' => 'Atualizado', 'return' => 200], 200);
            }
        } catch (\Exception $e) {
            logger('Ocorreu um erro durante a integração');
            logger($e);
            logger($id);
            logger($request->all());
            return response(['status' => 'ERROR', 'Message' => $e->getMessage(), 'return' => $e->getCode()], 400);
        }
    }

}
