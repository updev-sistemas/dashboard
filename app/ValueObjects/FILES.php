<?php

namespace App\ValueObjects;

final class CanceladasValueObject
{
	public int $janeiro;

	public int $feveiro;

	public int $marco;

	public int $abril;

	public int $maio;

	public int $junho;

	public int $julho;

	public int $agosto;

	public int $setembro;

	public int $outubro;

	public int $novembro;

	public int $dezembro;

	public function __construct(
		int $janeiro,
		int $feveiro,
		int $marco,
		int $abril,
		int $maio,
		int $junho,
		int $julho,
		int $agosto,
		int $setembro,
		int $outubro,
		int $novembro,
		int $dezembro
	) {
		$this->janeiro = $janeiro;
		$this->feveiro = $feveiro;
		$this->marco = $marco;
		$this->abril = $abril;
		$this->maio = $maio;
		$this->junho = $junho;
		$this->julho = $julho;
		$this->agosto = $agosto;
		$this->setembro = $setembro;
		$this->outubro = $outubro;
		$this->novembro = $novembro;
		$this->dezembro = $dezembro;
	}

	public function getJaneiro(): int
	{
		return $this->janeiro;
	}

	public function getFeveiro(): int
	{
		return $this->feveiro;
	}

	public function getMarco(): int
	{
		return $this->marco;
	}

	public function getAbril(): int
	{
		return $this->abril;
	}

	public function getMaio(): int
	{
		return $this->maio;
	}

	public function getJunho(): int
	{
		return $this->junho;
	}

	public function getJulho(): int
	{
		return $this->julho;
	}

	public function getAgosto(): int
	{
		return $this->agosto;
	}

	public function getSetembro(): int
	{
		return $this->setembro;
	}

	public function getOutubro(): int
	{
		return $this->outubro;
	}

	public function getNovembro(): int
	{
		return $this->novembro;
	}

	public function getDezembro(): int
	{
		return $this->dezembro;
	}

	public function setJaneiro(int $janeiro): self
	{
		$this->janeiro = $janeiro;
		return $this;
	}

	public function setFeveiro(int $feveiro): self
	{
		$this->feveiro = $feveiro;
		return $this;
	}

	public function setMarco(int $marco): self
	{
		$this->marco = $marco;
		return $this;
	}

	public function setAbril(int $abril): self
	{
		$this->abril = $abril;
		return $this;
	}

	public function setMaio(int $maio): self
	{
		$this->maio = $maio;
		return $this;
	}

	public function setJunho(int $junho): self
	{
		$this->junho = $junho;
		return $this;
	}

	public function setJulho(int $julho): self
	{
		$this->julho = $julho;
		return $this;
	}

	public function setAgosto(int $agosto): self
	{
		$this->agosto = $agosto;
		return $this;
	}

	public function setSetembro(int $setembro): self
	{
		$this->setembro = $setembro;
		return $this;
	}

	public function setOutubro(int $outubro): self
	{
		$this->outubro = $outubro;
		return $this;
	}

	public function setNovembro(int $novembro): self
	{
		$this->novembro = $novembro;
		return $this;
	}

	public function setDezembro(int $dezembro): self
	{
		$this->dezembro = $dezembro;
		return $this;
	}
}

final class ConcluidasValueObject
{
	public int $janeiro;

	public int $feveiro;

	public int $marco;

	public int $abril;

	public int $maio;

	public int $junho;

	public int $julho;

	public int $agosto;

	public int $setembro;

	public int $outubro;

	public int $novembro;

	public int $dezembro;

	public function __construct(
		int $janeiro,
		int $feveiro,
		int $marco,
		int $abril,
		int $maio,
		int $junho,
		int $julho,
		int $agosto,
		int $setembro,
		int $outubro,
		int $novembro,
		int $dezembro
	) {
		$this->janeiro = $janeiro;
		$this->feveiro = $feveiro;
		$this->marco = $marco;
		$this->abril = $abril;
		$this->maio = $maio;
		$this->junho = $junho;
		$this->julho = $julho;
		$this->agosto = $agosto;
		$this->setembro = $setembro;
		$this->outubro = $outubro;
		$this->novembro = $novembro;
		$this->dezembro = $dezembro;
	}

	public function getJaneiro(): int
	{
		return $this->janeiro;
	}

	public function getFeveiro(): int
	{
		return $this->feveiro;
	}

	public function getMarco(): int
	{
		return $this->marco;
	}

	public function getAbril(): int
	{
		return $this->abril;
	}

	public function getMaio(): int
	{
		return $this->maio;
	}

	public function getJunho(): int
	{
		return $this->junho;
	}

	public function getJulho(): int
	{
		return $this->julho;
	}

	public function getAgosto(): int
	{
		return $this->agosto;
	}

	public function getSetembro(): int
	{
		return $this->setembro;
	}

	public function getOutubro(): int
	{
		return $this->outubro;
	}

	public function getNovembro(): int
	{
		return $this->novembro;
	}

	public function getDezembro(): int
	{
		return $this->dezembro;
	}

	public function setJaneiro(int $janeiro): self
	{
		$this->janeiro = $janeiro;
		return $this;
	}

	public function setFeveiro(int $feveiro): self
	{
		$this->feveiro = $feveiro;
		return $this;
	}

	public function setMarco(int $marco): self
	{
		$this->marco = $marco;
		return $this;
	}

	public function setAbril(int $abril): self
	{
		$this->abril = $abril;
		return $this;
	}

	public function setMaio(int $maio): self
	{
		$this->maio = $maio;
		return $this;
	}

	public function setJunho(int $junho): self
	{
		$this->junho = $junho;
		return $this;
	}

	public function setJulho(int $julho): self
	{
		$this->julho = $julho;
		return $this;
	}

	public function setAgosto(int $agosto): self
	{
		$this->agosto = $agosto;
		return $this;
	}

	public function setSetembro(int $setembro): self
	{
		$this->setembro = $setembro;
		return $this;
	}

	public function setOutubro(int $outubro): self
	{
		$this->outubro = $outubro;
		return $this;
	}

	public function setNovembro(int $novembro): self
	{
		$this->novembro = $novembro;
		return $this;
	}

	public function setDezembro(int $dezembro): self
	{
		$this->dezembro = $dezembro;
		return $this;
	}
}

