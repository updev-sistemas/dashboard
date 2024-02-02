<?php

namespace App\Handlers;

use App\Validators\CadastrosValidator;
use App\Validators\CaixasAbertosValidator;
use App\Validators\CalendarioValidator;
use App\Validators\KeyValuePairValidator;
use App\Validators\RelatorioVendasComponentCanceladasValidator;
use App\Validators\RelatorioVendasComponentConcluidasValidator;
use App\Validators\TopProdutosValidator;
use App\Validators\UsuarioValidator;
use App\ValueObjects\Cadastros;
use App\ValueObjects\Caixa;
use App\ValueObjects\CaixasAbertos;
use App\ValueObjects\CaixasAbertosComponent;
use App\ValueObjects\Calendario;
use App\ValueObjects\ContasPagar;
use App\ValueObjects\ContasReceber;
use App\ValueObjects\GrupoPagamentos;
use App\ValueObjects\GrupoProduto;
use App\ValueObjects\GrupoVendedor;
use App\ValueObjects\KeyValuePair;
use App\ValueObjects\LucrosPresumidos;
use App\ValueObjects\NotasFiscais;
use App\ValueObjects\Payload;
use App\ValueObjects\RelatorioVendas;
use App\ValueObjects\RelatorioVendasComponentCanceladas;
use App\ValueObjects\RelatorioVendasComponentConcluidas;
use App\ValueObjects\TopProdutos;
use App\ValueObjects\Usuario;
use App\ValueObjects\Vendas;
use Illuminate\Support\Facades\Validator;

class PayloadHandler
{
    private array $errors;

    public function __construct()
    {
        $this->errors = [];
        $this->payload = null;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function handler($payload): ?Payload
    {
        $notasFiscais = $this->tryRecoveryNotasFiscais($payload);
        $vendas = $this->tryRecoveryVendas($payload);
        $grupoPagamentos = $this->tryRecoveryGrupoPagamentos($payload);
        $grupoVendedor = $this->tryRecoveryGrupoVendedor($payload);
        $grupoProduto = $this->tryRecoveryGrupoProduto($payload);
        $caixa = $this->tryRecoveryCaixa($payload);
        $cadastros = $this->tryRecoveryCadastros($payload);
        $contasPagar = $this->tryRecoveryContasPagar($payload);
        $contasReceber = $this->tryRecoveryContasReceber($payload);
        $caixasAbertos = $this->tryRecoveryCaixasAbertos($payload);
        $topProdutos = $this->tryRecoveryTopProdutos($payload);
        $lucrosPresumidos = $this->tryRecoveryLucrosPresumidos($payload);

        if (count($this->errors) == 0) {
            return Payload::create(
                $notasFiscais,
                $vendas,
                $grupoPagamentos,
                $grupoVendedor,
                $grupoProduto,
                $caixa,
                $cadastros,
                $contasPagar,
                $contasReceber,
                $caixasAbertos,
                $topProdutos,
                $lucrosPresumidos);
        }
        else {
            return null;
        }
    }

    private function tryRecoveryNotasFiscais(array $payload): ?NotasFiscais
    {
        try
        {
            $totalEnviadasArr = isset($payload['notasFiscais']['totalEnviadas']) ? $payload['notasFiscais']['totalEnviadas'] : [];
            $validateTotalEnviadas = Validator::make($totalEnviadasArr, CalendarioValidator::rules(), CalendarioValidator::messages());
            $validateTotalEnviadasFlag = $validateTotalEnviadas->fails();

            $totalCanceladasArr = isset($payload['notasFiscais']['totalCanceladas']) ? $payload['notasFiscais']['totalCanceladas'] : [];
            $validateTotalCanceladas = Validator::make($totalCanceladasArr, CalendarioValidator::rules(), CalendarioValidator::messages());
            $validateTotalCanceladasFlag = $validateTotalCanceladas->fails();

            $totalContigenciaArr = isset($payload['notasFiscais']['totalContigencia']) ? $payload['notasFiscais']['totalContigencia'] : [];
            $validateTotalContigencia = Validator::make($totalContigenciaArr, CalendarioValidator::rules(), CalendarioValidator::messages());
            $validateTotalContigenciaFlag = $validateTotalContigencia->fails();

            if ($validateTotalEnviadasFlag || $validateTotalCanceladasFlag || $validateTotalContigenciaFlag)
            {
                $dataErrors = [
                    "notasFiscais" => [
                        'totalEnviadas' => $validateTotalEnviadas->errors(),
                        'totalCanceladas' => $validateTotalCanceladas->errors(),
                        'totalContigencia' => $validateTotalContigencia->errors(),
                    ]
                ];

                array_push($this->errors, $dataErrors);

                return null;
            }
            else {
                return NotasFiscais::create(
                    Calendario::create($totalEnviadasArr['janeiro'], $totalEnviadasArr['fevereiro'], $totalEnviadasArr['marco'], $totalEnviadasArr['abril'], $totalEnviadasArr['maio'], $totalEnviadasArr['junho'], $totalEnviadasArr['julho'], $totalEnviadasArr['agosto'], $totalEnviadasArr['setembro'], $totalEnviadasArr['outubro'], $totalEnviadasArr['novembro'], $totalEnviadasArr['dezembro']),
                    Calendario::create($totalCanceladasArr['janeiro'], $totalCanceladasArr['fevereiro'], $totalCanceladasArr['marco'], $totalCanceladasArr['abril'], $totalCanceladasArr['maio'], $totalCanceladasArr['junho'], $totalCanceladasArr['julho'], $totalCanceladasArr['agosto'], $totalCanceladasArr['setembro'], $totalCanceladasArr['outubro'], $totalCanceladasArr['novembro'], $totalCanceladasArr['dezembro']),
                    Calendario::create($totalContigenciaArr['janeiro'], $totalContigenciaArr['fevereiro'], $totalContigenciaArr['marco'], $totalContigenciaArr['abril'], $totalContigenciaArr['maio'], $totalContigenciaArr['junho'], $totalContigenciaArr['julho'], $totalContigenciaArr['agosto'], $totalContigenciaArr['setembro'], $totalContigenciaArr['outubro'], $totalContigenciaArr['novembro'], $totalContigenciaArr['dezembro'])
                );
            }
        }
        catch (\Exception $e)
        {
            return null;
        }
    }

    private function tryRecoveryVendas(array $payload): ?Vendas
    {
        try
        {
            $totalConcluidasArr = isset($payload['vendas']['concluidas']) ? $payload['vendas']['concluidas'] : [];
            $validateTotalConcluidas = Validator::make($totalConcluidasArr, CalendarioValidator::rules(), CalendarioValidator::messages());
            $validateTotalConcluidasFlag = $validateTotalConcluidas->fails();

            $totalCanceladasArr = isset($payload['vendas']['canceladas']) ? $payload['vendas']['canceladas'] : [];
            $validateTotalCanceladas = Validator::make($totalCanceladasArr, CalendarioValidator::rules(), CalendarioValidator::messages());
            $validateTotalCanceladasFlag = $validateTotalCanceladas->fails();

            // dd($totalConcluidasArr, $totalCanceladasArr, $validateTotalConcluidas->errors(), $validateTotalCanceladas->errors());
            if ($validateTotalConcluidasFlag || $validateTotalCanceladasFlag)
            {
                $dataErrors = [
                    "vendas" => [
                        'concluidas' => $validateTotalConcluidas->errors(),
                        'canceladas' => $validateTotalCanceladas->errors(),
                    ]
                ];

                array_push($this->errors, $dataErrors);

                return null;
            }
            else {
                return Vendas::create(
                    Calendario::create($totalConcluidasArr['janeiro'], $totalConcluidasArr['fevereiro'], $totalConcluidasArr['marco'], $totalConcluidasArr['abril'], $totalConcluidasArr['maio'], $totalConcluidasArr['junho'], $totalConcluidasArr['julho'], $totalConcluidasArr['agosto'], $totalConcluidasArr['setembro'], $totalConcluidasArr['outubro'], $totalConcluidasArr['novembro'], $totalConcluidasArr['dezembro']),
                    Calendario::create($totalCanceladasArr['janeiro'], $totalCanceladasArr['fevereiro'], $totalCanceladasArr['marco'], $totalCanceladasArr['abril'], $totalCanceladasArr['maio'], $totalCanceladasArr['junho'], $totalCanceladasArr['julho'], $totalCanceladasArr['agosto'], $totalCanceladasArr['setembro'], $totalCanceladasArr['outubro'], $totalCanceladasArr['novembro'], $totalCanceladasArr['dezembro'])
                );
            }
        }
        catch (\Exception $e)
        {
            return null;
        }
    }

    private function tryRecoveryGrupoPagamentos(array $payload): ?GrupoPagamentos
    {
        try
        {
            $hasErrorPagamentoDia = false;
            $totalErrorPagamentoDiaList = [];
            $pagamentoDiaValidos = [];
            $totalPagamentosDiaGroupArr = isset($payload['pagamentos']['pagamentosDia']) ? $payload['pagamentos']['pagamentosDia'] : [];
            foreach ($totalPagamentosDiaGroupArr as $key => $value) {
                $validate = Validator::make(['descricao'=>$value['descricao'], 'valor' => $value['value']], KeyValuePairValidator::rules(), KeyValuePairValidator::messages());
                $validateFlag = $validate->fails();

                if ($validateFlag)
                {
                    $hasErrorPagamentoDia = true;
                    $dataErrors = [
                        "pagamentosDia_{$key}" => [ $validate->errors() ]
                    ];

                    array_push($totalErrorPagamentoDiaList, $dataErrors);
                }
                else
                {
                    array_push($pagamentoDiaValidos, KeyValuePair::create($value['descricao'], floatval($value['value'])));
                }
            }

            $hasErrorPagamentoSemana = false;
            $totalErrorPagamentoSemanaList = [];
            $pagamentoSemanaValidos = [];
            $totalPagamentosSemanaGroupArr = isset($payload['pagamentos']['pagamentosSemana']) ? $payload['pagamentos']['pagamentosSemana'] : [];
            foreach ($totalPagamentosSemanaGroupArr as $key => $value) {
                $validate = Validator::make(['descricao'=>$value['descricao'], 'valor' => $value['value']], KeyValuePairValidator::rules(), KeyValuePairValidator::messages());
                $validateFlag = $validate->fails();

                if ($validateFlag)
                {
                    $hasErrorPagamentoSemana = true;
                    $dataErrors = [
                        "pagamentos_Semana_{$key}" => [ $validate->errors() ]
                    ];

                    array_push($totalErrorPagamentoSemanaList, $dataErrors);
                }
                else
                {
                    array_push($pagamentoSemanaValidos, KeyValuePair::create($value['descricao'], floatval($value['value'])));
                }
            }

            $hasErrorPagamentoMes = false;
            $totalErrorPagamentoMesList = [];
            $pagamentoMesValidos = [];
            $totalPagamentosMesGroupArr = isset($payload['pagamentos']['pagamentosMes']) ? $payload['pagamentos']['pagamentosMes'] : [];
            foreach ($totalPagamentosMesGroupArr as $key => $value) {
                $validate = Validator::make(['descricao'=>$value['descricao'], 'valor' => $value['value']], KeyValuePairValidator::rules(), KeyValuePairValidator::messages());
                $validateFlag = $validate->fails();

                if ($validateFlag)
                {
                    $hasErrorPagamentoMes = true;
                    $dataErrors = [
                        "pagamentos_Mes_{$key}" => [ $validate->errors() ]
                    ];

                    array_push($totalErrorPagamentoMesList, $dataErrors);
                }
                else
                {
                    array_push($pagamentoMesValidos, KeyValuePair::create($value['descricao'], floatval($value['value'])));
                }
            }

            if (!$hasErrorPagamentoDia && !$hasErrorPagamentoSemana && !$hasErrorPagamentoMes)
            {
                return GrupoPagamentos::create($pagamentoDiaValidos, $pagamentoSemanaValidos, $pagamentoMesValidos);
            }
            else
            {
                array_push($this->errors, $totalErrorPagamentoDiaList);
                array_push($this->errors, $totalErrorPagamentoSemanaList);
                array_push($this->errors, $totalErrorPagamentoMesList);
                return null;
            }
        }
        catch (\Exception $e)
        {
            return null;
        }
    }

    private function tryRecoveryGrupoVendedor(array $payload): ?GrupoVendedor
    {
        try
        {
            $hasErrorPagamentoDia = false;
            $totalErrorPagamentoDiaList = [];
            $pagamentoDiaValidos = [];
            $totalPagamentosDiaGroupArr = isset($payload['vendedor']['vendedorDia']) ? $payload['vendedor']['vendedorDia'] : [];
            foreach ($totalPagamentosDiaGroupArr as $key => $value) {
                $validate = Validator::make(['descricao'=>$value['descricao'], 'valor' => $value['value']], KeyValuePairValidator::rules(), KeyValuePairValidator::messages());
                $validateFlag = $validate->fails();

                if ($validateFlag)
                {
                    $hasErrorPagamentoDia = true;
                    $dataErrors = [
                        "vendedor_Dia_{$key}" => [ $validate->errors() ]
                    ];

                    array_push($totalErrorPagamentoDiaList, $dataErrors);
                }
                else
                {
                    array_push($pagamentoDiaValidos, KeyValuePair::create($value['descricao'], floatval($value['value'])));
                }
            }

            $hasErrorPagamentoSemana = false;
            $totalErrorPagamentoSemanaList = [];
            $pagamentoSemanaValidos = [];
            $totalPagamentosSemanaGroupArr = isset($payload['vendedor']['vendedorSemana']) ? $payload['vendedor']['vendedorSemana'] : [];
            foreach ($totalPagamentosSemanaGroupArr as $key => $value) {
                $validate = Validator::make(['descricao'=>$value['descricao'], 'valor' => $value['value']], KeyValuePairValidator::rules(), KeyValuePairValidator::messages());
                $validateFlag = $validate->fails();

                if ($validateFlag)
                {
                    $hasErrorPagamentoSemana = true;
                    $dataErrors = [
                        "vendedor_Semana_{$key}" => [ $validate->errors() ]
                    ];

                    array_push($totalErrorPagamentoSemanaList, $dataErrors);
                }
                else
                {
                    array_push($pagamentoSemanaValidos, KeyValuePair::create($value['descricao'], floatval($value['value'])));
                }
            }

            $hasErrorPagamentoMes = false;
            $totalErrorPagamentoMesList = [];
            $pagamentoMesValidos = [];
            $totalPagamentosMesGroupArr = isset($payload['vendedor']['vendedorMes']) ? $payload['vendedor']['vendedorMes'] : [];
            foreach ($totalPagamentosMesGroupArr as $key => $value) {
                $validate = Validator::make(['descricao'=>$value['descricao'], 'valor' => $value['value']], KeyValuePairValidator::rules(), KeyValuePairValidator::messages());
                $validateFlag = $validate->fails();

                if ($validateFlag)
                {
                    $hasErrorPagamentoMes = true;
                    $dataErrors = [
                        "vendedor_Mes_{$key}" => [ $validate->errors() ]
                    ];

                    array_push($totalErrorPagamentoMesList, $dataErrors);
                }
                else
                {
                    array_push($pagamentoMesValidos, KeyValuePair::create($value['descricao'], floatval($value['value'])));
                }
            }

            if (!$hasErrorPagamentoDia && !$hasErrorPagamentoSemana && !$hasErrorPagamentoMes)
            {
                return GrupoVendedor::create($pagamentoDiaValidos, $pagamentoSemanaValidos, $pagamentoMesValidos);
            }
            else
            {
                array_push($this->errors, $totalErrorPagamentoDiaList);
                array_push($this->errors, $totalErrorPagamentoSemanaList);
                array_push($this->errors, $totalErrorPagamentoMesList);
                return null;
            }
        }
        catch (\Exception $e)
        {
            return null;
        }
    }

    private function tryRecoveryGrupoProduto(array $payload): ?GrupoProduto
    {
        try
        {
            $hasErrorPagamentoDia = false;
            $totalErrorPagamentoDiaList = [];
            $pagamentoDiaValidos = [];
            $totalPagamentosDiaGroupArr = isset($payload['grupoProdutos']['grupoProdutosDia']) ? $payload['grupoProdutos']['grupoProdutosDia'] : [];
            foreach ($totalPagamentosDiaGroupArr as $key => $value) {
                $validate = Validator::make(['descricao'=>$value['descricao'], 'valor' => $value['total']], KeyValuePairValidator::rules(), KeyValuePairValidator::messages());
                $validateFlag = $validate->fails();

                if ($validateFlag)
                {
                    $hasErrorPagamentoDia = true;
                    $dataErrors = [
                        "grupoProdutos_Dia_{$key}" => [ $validate->errors() ]
                    ];

                    array_push($totalErrorPagamentoDiaList, $dataErrors);
                }
                else
                {
                    array_push($pagamentoDiaValidos, KeyValuePair::create($value['descricao'], floatval($value['total'])));
                }
            }

            $hasErrorPagamentoSemana = false;
            $totalErrorPagamentoSemanaList = [];
            $pagamentoSemanaValidos = [];
            $totalPagamentosSemanaGroupArr = isset($payload['grupoProdutos']['grupoProdutosSemana']) ? $payload['grupoProdutos']['grupoProdutosSemana'] : [];
            foreach ($totalPagamentosSemanaGroupArr as $key => $value) {
                $validate = Validator::make(['descricao'=>$value['descricao'], 'valor' => $value['total']], KeyValuePairValidator::rules(), KeyValuePairValidator::messages());
                $validateFlag = $validate->fails();

                if ($validateFlag)
                {
                    $hasErrorPagamentoSemana = true;
                    $dataErrors = [
                        "grupoProdutos_Semana_{$key}" => [ $validate->errors() ]
                    ];

                    array_push($totalErrorPagamentoSemanaList, $dataErrors);
                }
                else
                {
                    array_push($pagamentoSemanaValidos, KeyValuePair::create($value['descricao'], floatval($value['total'])));
                }
            }

            $hasErrorPagamentoMes = false;
            $totalErrorPagamentoMesList = [];
            $pagamentoMesValidos = [];
            $totalPagamentosMesGroupArr = isset($payload['grupoProdutos']['grupoProdutosMes']) ? $payload['grupoProdutos']['grupoProdutosMes'] : [];
            foreach ($totalPagamentosMesGroupArr as $key => $value) {
                $validate = Validator::make(['descricao'=>$value['descricao'], 'valor' => $value['total']], KeyValuePairValidator::rules(), KeyValuePairValidator::messages());
                $validateFlag = $validate->fails();

                if ($validateFlag)
                {
                    $hasErrorPagamentoMes = true;
                    $dataErrors = [
                        "grupoProdutos_Mes_{$key}" => [ $validate->errors() ]
                    ];

                    array_push($totalErrorPagamentoMesList, $dataErrors);
                }
                else
                {
                    array_push($pagamentoMesValidos, KeyValuePair::create($value['descricao'], floatval($value['total'])));
                }
            }

            if (!$hasErrorPagamentoDia && !$hasErrorPagamentoSemana && !$hasErrorPagamentoMes)
            {
                return GrupoProduto::create($pagamentoDiaValidos, $pagamentoSemanaValidos, $pagamentoMesValidos);
            }
            else
            {
                array_push($this->errors, $totalErrorPagamentoDiaList);
                array_push($this->errors, $totalErrorPagamentoSemanaList);
                array_push($this->errors, $totalErrorPagamentoMesList);
                return null;
            }
        }
        catch (\Exception $e)
        {
            return null;
        }
    }

    private function tryRecoveryCaixa(array $payload): ?Caixa
    {
        try
        {
            $totalSaldoArr = isset($payload['caixa']['saldo']) ? $payload['caixa']['saldo'] : [];
            $validateSaldo = Validator::make($totalSaldoArr, CalendarioValidator::rules(), CalendarioValidator::messages());
            $validateSaldoFlag = $validateSaldo->fails();

            $caixa = $payload['caixa'];
            $totalEntradasArr = isset($payload['caixa']['entradas']) ? $payload['caixa']['entradas'] : [];
            $validateEntradas = Validator::make($totalEntradasArr, CalendarioValidator::rules(), CalendarioValidator::messages());
            $validateEntradasFlag = $validateEntradas->fails();

            $totalSaidaArr = isset($payload['caixa']['saidas']) ? $payload['caixa']['saidas'] : [];
            $validateSaida = Validator::make($totalSaidaArr, CalendarioValidator::rules(), CalendarioValidator::messages());
            $validateSaidaFlag = $validateSaida->fails();

            if ($validateSaldoFlag || $validateEntradasFlag || $validateSaidaFlag)
            {
                $dataErrors = [
                    "caixa" => [
                        'saldo' => $validateSaldo->errors(),
                        'entradas' => $validateEntradas->errors(),
                        'saidas' => $validateSaida->errors(),
                    ]
                ];

                array_push($this->errors, $dataErrors);

                return null;
            }
            else {
                return Caixa::create(
                    Calendario::create($totalSaldoArr['janeiro'], $totalSaldoArr['fevereiro'], $totalSaldoArr['marco'], $totalSaldoArr['abril'], $totalSaldoArr['maio'], $totalSaldoArr['junho'], $totalSaldoArr['julho'], $totalSaldoArr['agosto'], $totalSaldoArr['setembro'], $totalSaldoArr['outubro'], $totalSaldoArr['novembro'], $totalSaldoArr['dezembro']),
                    Calendario::create($totalEntradasArr['janeiro'], $totalEntradasArr['fevereiro'], $totalEntradasArr['marco'], $totalEntradasArr['abril'], $totalEntradasArr['maio'], $totalEntradasArr['junho'], $totalEntradasArr['julho'], $totalEntradasArr['agosto'], $totalEntradasArr['setembro'], $totalEntradasArr['outubro'], $totalEntradasArr['novembro'], $totalEntradasArr['dezembro']),
                    Calendario::create($totalSaidaArr['janeiro'], $totalSaidaArr['fevereiro'], $totalSaidaArr['marco'], $totalSaidaArr['abril'], $totalSaidaArr['maio'], $totalSaidaArr['junho'], $totalSaidaArr['julho'], $totalSaidaArr['agosto'], $totalSaidaArr['setembro'], $totalSaidaArr['outubro'], $totalSaidaArr['novembro'], $totalSaidaArr['dezembro']),
                    $caixa['entradaAtual'],
                    $caixa['saidaAtual'],
                    $caixa['saldoAtual']
                );
            }
        }
        catch (\Exception $e)
        {
            return null;
        }
    }

    private function tryRecoveryCadastros(array $payload): ?Cadastros
    {
        try
        {
            $cadastros = isset($payload['cadastros']) ? $payload['cadastros'] : [];
            $validateCadastro = Validator::make($cadastros, CadastrosValidator::rules(), CadastrosValidator::messages());

            if ($validateCadastro->fails())
            {
                array_push($this->errors, [ "cadastros" => $validateCadastro->errors() ]);
                return null;
            }
            else {
                return Cadastros::create(
                    $cadastros['produtos'],
                    $cadastros['clientes'],
                    $cadastros['usuarios'],
                    $cadastros['fornecedores']);
            }
        }
        catch (\Exception $e)
        {
            return null;
        }
    }

    private function tryRecoveryContasPagar(array $payload): ?ContasPagar
    {
        try
        {
            $contasPagar = isset($payload['contasPagar']) ? $payload['contasPagar'] : [];
            $totalPagasArr = isset($payload['contasPagar']['receber']) ? $payload['contasPagar']['receber'] : [];
            $validatePagas = Validator::make($totalPagasArr, CalendarioValidator::rules(), CalendarioValidator::messages());
            $validatePagasFlag = $validatePagas->fails();

            $totalVencidasArr = isset($payload['contasPagar']['recebidas']) ? $payload['contasPagar']['recebidas'] : [];
            $validateVencidas = Validator::make($totalVencidasArr, CalendarioValidator::rules(), CalendarioValidator::messages());
            $validateVencidasFlag = $validateVencidas->fails();

            if ($validatePagasFlag || $validateVencidasFlag)
            {
                $dataErrors = [
                    "contasPagar" => [
                        'receber' => $validatePagas->errors(),
                        'recebidas' => $validateVencidas->errors()
                    ]
                ];

                array_push($this->errors, $dataErrors);

                return null;
            }
            else {
                return ContasPagar::create(
                    Calendario::create($totalPagasArr['janeiro'], $totalPagasArr['fevereiro'], $totalPagasArr['marco'], $totalPagasArr['abril'], $totalPagasArr['maio'], $totalPagasArr['junho'], $totalPagasArr['julho'], $totalPagasArr['agosto'], $totalPagasArr['setembro'], $totalPagasArr['outubro'], $totalPagasArr['novembro'], $totalPagasArr['dezembro']),
                    Calendario::create($totalVencidasArr['janeiro'], $totalVencidasArr['fevereiro'], $totalVencidasArr['marco'], $totalVencidasArr['abril'], $totalVencidasArr['maio'], $totalVencidasArr['junho'], $totalVencidasArr['julho'], $totalVencidasArr['agosto'], $totalVencidasArr['setembro'], $totalVencidasArr['outubro'], $totalVencidasArr['novembro'], $totalVencidasArr['dezembro']),
                    $contasPagar['pagasAtual'],
                    $contasPagar['vencidasAtual'],
                    $contasPagar['pendentesAtual']);
            }
        }
        catch (\Exception $e)
        {
            return null;
        }
    }

    private function tryRecoveryContasReceber(array $payload): ?ContasReceber
    {
        try
        {
            $totalPagasArr = isset($payload['contasReceber']['receber']) ? $payload['contasReceber']['receber'] : [];
            $validatePagas = Validator::make($totalPagasArr, CalendarioValidator::rules(), CalendarioValidator::messages());
            $validatePagasFlag = $validatePagas->fails();

            $dataToBind = $payload['contasReceber'];
            $totalRecebidasArr = isset($payload['contasReceber']['recebidas']) ? $payload['contasReceber']['recebidas'] : [];
            $validateRecebidas = Validator::make($totalRecebidasArr, CalendarioValidator::rules(), CalendarioValidator::messages());
            $validateRecebidasFlag = $validateRecebidas->fails();

            if ($validatePagasFlag || $validateRecebidasFlag)
            {
                $dataErrors = [
                    "contasReceber" => [
                        'receber' => $validatePagas->errors(),
                        'recebidas' => $validateRecebidas->errors(),
                    ]
                ];

                array_push($this->errors, $dataErrors);

                return null;
            }
            else {
                return ContasReceber::create(
                    Calendario::create($totalPagasArr['janeiro'], $totalPagasArr['fevereiro'], $totalPagasArr['marco'], $totalPagasArr['abril'], $totalPagasArr['maio'], $totalPagasArr['junho'], $totalPagasArr['julho'], $totalPagasArr['agosto'], $totalPagasArr['setembro'], $totalPagasArr['outubro'], $totalPagasArr['novembro'], $totalPagasArr['dezembro']),
                    Calendario::create($totalRecebidasArr['janeiro'], $totalRecebidasArr['fevereiro'], $totalRecebidasArr['marco'], $totalRecebidasArr['abril'], $totalRecebidasArr['maio'], $totalRecebidasArr['junho'], $totalRecebidasArr['julho'], $totalRecebidasArr['agosto'], $totalRecebidasArr['setembro'], $totalRecebidasArr['outubro'], $totalRecebidasArr['novembro'], $totalRecebidasArr['dezembro']),
                    $dataToBind['pagasAtual'],
                    $dataToBind['pendentesAtual'],
                    $dataToBind['vencidasAtual']
                );
            }
        }
        catch (\Exception $e)
        {
            return null;
        }
    }

    private function tryRecoveryCaixasAbertos(array $payload): ?CaixasAbertos
    {
        try
        {
            $totalCaixasAbertosArr = isset($payload['caixasAbertos']) ? $payload['caixasAbertos'] : [];
            if (count($totalCaixasAbertosArr) == 0) {
                return CaixasAbertos::create([]);
            }

            $caixasAbertos = [];
            $caixasAbertosErrors = [];

            $hasError = false;

            foreach ($totalCaixasAbertosArr as $key => $value) {
                $validate = Validator::make($value, CaixasAbertosValidator::rules(), CaixasAbertosValidator::messages());
                $validateFlag = $validate->fails();

                if ($validateFlag)
                {
                    $hasError = true;
                    $dataErrors = [
                        "caixasAbertos_{$key}" => $validate->errors()
                    ];

                    array_push($caixasAbertosErrors, $dataErrors);
                }
                else
                {
                    $target = CaixasAbertosComponent::create($value['cartao'],$value['cashback'],$value['cheque'],$value['credito'],$value['dataabertura'],$value['digital'],$value['dinheiro'],$value['dinheiro1'],$value['fechamento'],$value['horaabertura'],$value['id'],$value['pix'],$value['saldoatual'],$value['saldoinicial'],$value['usuario']);
                    array_push($caixasAbertos, $target);
                }
            }

            if (!$hasError)
            {
                return CaixasAbertos::create($caixasAbertos);
            }
            else
            {
                array_push($this->errors, $caixasAbertosErrors);
                return null;
            }
        }
        catch (\Exception $e)
        {
            return null;
        }
    }

    private function tryRecoveryTopProdutos(array $payload): ?TopProdutos
    {
        try
        {
            $topProducts = [];
            $topProdutsErrors = [];
            $totalTopProdutosArr = isset($payload['produtosMaisVendidos']) ? $payload['produtosMaisVendidos'] : [];
            $hasError = false;

            foreach ($totalTopProdutosArr as $key => $value) {
                $validate = Validator::make($value, TopProdutosValidator::rules(), TopProdutosValidator::messages());
                $validateFlag = $validate->fails();

                if ($validateFlag)
                {
                    $hasError = true;
                    $dataErrors = [
                        "produto_{$key}" => [ $validate->errors() ]
                    ];

                    array_push($topProdutsErrors, $dataErrors);
                }
                else
                {
                    array_push($topProducts, KeyValuePair::create($value['descricao'], floatval($value['quantidade'])));
                }
            }

            if (!$hasError)
            {
                return TopProdutos::create($topProducts);
            }
            else
            {
                array_push($this->errors, $topProdutsErrors);
                return null;
            }
        }
        catch (\Exception $e)
        {
            return null;
        }
    }

    private function tryRecoveryLucrosPresumidos(array $payload): ?LucrosPresumidos
    {
        try
        {
            $totalLucrosPresumidosGanhoArr = isset($payload['lucrosPresumidos']['ganhos']) ? $payload['lucrosPresumidos']['ganhos'] : [];
            $validateLucrosPresumidosGanho = Validator::make($totalLucrosPresumidosGanhoArr, CalendarioValidator::rules(), CalendarioValidator::messages());
            $validateLucrosPresumidosGanhoFlag = $validateLucrosPresumidosGanho->fails();

            $totalLucrosPresumidosPerdidoArr = isset($payload['lucrosPresumidos']['perdidos']) ? $payload['lucrosPresumidos']['perdidos'] : [];
            $validateLucrosPresumidosPerdido = Validator::make($totalLucrosPresumidosPerdidoArr, CalendarioValidator::rules(), CalendarioValidator::messages());
            $validateLucrosPresumidosPerdidoFlag = $validateLucrosPresumidosPerdido->fails();

            $relatorioVendasConcluidaObj = isset($payload['lucrosPresumidos']['relatorioVendas']['concluidas']) ? $payload['lucrosPresumidos']['relatorioVendas']['concluidas'] : [];
            $validateRelatorioVendasConcluidaObj = Validator::make($relatorioVendasConcluidaObj, RelatorioVendasComponentConcluidasValidator::rules(), RelatorioVendasComponentConcluidasValidator::messages());
            $validateRelatorioVendasConcluidaObjFlag = $validateRelatorioVendasConcluidaObj->fails();

            $relatorioVendasCanceladasObj = isset($payload['lucrosPresumidos']['relatorioVendas']['canceladas']) ? $payload['lucrosPresumidos']['relatorioVendas']['canceladas'] : [];
            $validateRelatorioVendasCanceladasObj = Validator::make($relatorioVendasCanceladasObj, RelatorioVendasComponentCanceladasValidator::rules(), RelatorioVendasComponentCanceladasValidator::messages());
            $validateRelatorioVendasCanceladasObjFlag = $validateRelatorioVendasCanceladasObj->fails();

            $vendasUsuariosArr = isset($payload['lucrosPresumidos']['relatorioVendas']['vendasUsuarios']) ? $payload['lucrosPresumidos']['relatorioVendas']['vendasUsuarios'] : [];
            $vendasUsuariosErrorsArr = [];
            $vendasUsuarioMountedArr = [];
            $hasErrorVendasUsr = false;

            foreach ($vendasUsuariosArr as $key => $target)
            {
                $internalValidator = Validator::make($target, UsuarioValidator::rules(), UsuarioValidator::messages());
                if ($internalValidator->fails()) {
                    $hasErrorVendasUsr = true;
                    array_push($vendasUsuariosErrorsArr, $internalValidator->errors());
                } else {
                    array_push($vendasUsuarioMountedArr, Usuario::create($target['comissao'],$target['comissoes'],$target['quantidadeprodutos'],$target['quantidadevendas'],$target['totalvendas'],$target['usuario'],$target['vendascanceladas']));
                }
            }

            if (!$validateLucrosPresumidosGanhoFlag && !$validateLucrosPresumidosPerdidoFlag && !$validateRelatorioVendasCanceladasObjFlag && !$validateRelatorioVendasConcluidaObjFlag && !$hasErrorVendasUsr)
            {
                $relatorioVendas = RelatorioVendas::create(
                    RelatorioVendasComponentConcluidas::create($relatorioVendasConcluidaObj['valorVendas'], $relatorioVendasConcluidaObj['quantidadeVendas'], $relatorioVendasConcluidaObj['totalDescontos'], $relatorioVendasConcluidaObj['totalLucros'], $relatorioVendasConcluidaObj['ticketMedio'], $relatorioVendasConcluidaObj['tempoMedioAtendimento'], $relatorioVendasConcluidaObj['quantidadeProdutosVendidos'],$relatorioVendasConcluidaObj['totaldescontosdia'], $relatorioVendasConcluidaObj['totalvendames'], $relatorioVendasConcluidaObj['qtdvendames'], $relatorioVendasConcluidaObj['tikectmediomes'], $relatorioVendasConcluidaObj['qtddeprodutosvendidos'], $relatorioVendasConcluidaObj['qtdmediadeitensporcupom'], $relatorioVendasConcluidaObj['valordevendascanceladas'], $relatorioVendasConcluidaObj['qtddevendascanceladas'], $relatorioVendasConcluidaObj['totaldescontomes']),
                    RelatorioVendasComponentCanceladas::create($relatorioVendasCanceladasObj['valorVendas'], $relatorioVendasCanceladasObj['lucrosPerdidos'], $relatorioVendasCanceladasObj['QuantidadeProdutosPerdidos'], $relatorioVendasCanceladasObj['QuantidadeVendasPerdidas']),
                    $vendasUsuarioMountedArr
                );

                return LucrosPresumidos::create(
                    Calendario::create($totalLucrosPresumidosGanhoArr['janeiro'], $totalLucrosPresumidosGanhoArr['fevereiro'], $totalLucrosPresumidosGanhoArr['marco'], $totalLucrosPresumidosGanhoArr['abril'], $totalLucrosPresumidosGanhoArr['maio'], $totalLucrosPresumidosGanhoArr['junho'], $totalLucrosPresumidosGanhoArr['julho'], $totalLucrosPresumidosGanhoArr['agosto'], $totalLucrosPresumidosGanhoArr['setembro'], $totalLucrosPresumidosGanhoArr['outubro'], $totalLucrosPresumidosGanhoArr['novembro'], $totalLucrosPresumidosGanhoArr['dezembro']),
                    Calendario::create($totalLucrosPresumidosPerdidoArr['janeiro'], $totalLucrosPresumidosPerdidoArr['fevereiro'], $totalLucrosPresumidosPerdidoArr['marco'], $totalLucrosPresumidosPerdidoArr['abril'], $totalLucrosPresumidosPerdidoArr['maio'], $totalLucrosPresumidosPerdidoArr['junho'], $totalLucrosPresumidosPerdidoArr['julho'], $totalLucrosPresumidosPerdidoArr['agosto'], $totalLucrosPresumidosPerdidoArr['setembro'], $totalLucrosPresumidosPerdidoArr['outubro'], $totalLucrosPresumidosPerdidoArr['novembro'], $totalLucrosPresumidosPerdidoArr['dezembro']),
                    $relatorioVendas
                );
            }
            else
            {
                $dataErrors = [
                    "lucrosPresumidos" => [
                        'ganhos' => $validateLucrosPresumidosGanho->errors(),
                        'perdidos' => $validateLucrosPresumidosPerdido->errors(),
                        'relatorioVendas' => [
                            'concluidas' => $validateRelatorioVendasConcluidaObj->errors(),
                            'canceladas' => $validateRelatorioVendasCanceladasObj->errors(),
                            'vendasUsuarios' => $vendasUsuariosErrorsArr
                        ]
                    ]
                ];

                array_push($this->errors, $dataErrors);
                return null;
            }
        }
        catch (\Exception $e)
        {
            return null;
        }
    }
}
