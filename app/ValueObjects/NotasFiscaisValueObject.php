<?php

namespace App\ValueObjects;

final class NotasFiscaisValueObject
{
	public TotalEnviadasValueObject $totalEnviadas;

	public TotalCanceladasValueObject $totalCanceladas;

	public TotalContigenciaValueObject $totalContigencia;

	public function __construct(
		TotalEnviadasValueObject $totalEnviadas,
		TotalCanceladasValueObject $totalCanceladas,
		TotalContigenciaValueObject $totalContigencia
	) {
		$this->totalEnviadas = $totalEnviadas;
		$this->totalCanceladas = $totalCanceladas;
		$this->totalContigencia = $totalContigencia;
	}

	public function getTotalEnviadas(): TotalEnviadasValueObject
	{
		return $this->totalEnviadas;
	}

	public function getTotalCanceladas(): TotalCanceladasValueObject
	{
		return $this->totalCanceladas;
	}

	public function getTotalContigencia(): TotalContigenciaValueObject
	{
		return $this->totalContigencia;
	}

	public function setTotalEnviadas(TotalEnviadasValueObject $totalEnviadas): self
	{
		$this->totalEnviadas = $totalEnviadas;
		return $this;
	}

	public function setTotalCanceladas(TotalCanceladasValueObject $totalCanceladas): self
	{
		$this->totalCanceladas = $totalCanceladas;
		return $this;
	}

	public function setTotalContigencia(TotalContigenciaValueObject $totalContigencia): self
	{
		$this->totalContigencia = $totalContigencia;
		return $this;
	}
}

