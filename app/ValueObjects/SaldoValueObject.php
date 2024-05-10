<?php

namespace App\ValueObjects;

use App\Utils\Commons\FormatDataUtil;

final class SaldoValueObject
{
    public float $janeiro;

    public float $feveiro;

    public float $marco;

    public float $abril;

    public float $maio;

    public float $junho;

    public float $julho;

    public float $agosto;

    public float $setembro;

    public float $outubro;

    public float $novembro;

    public float $dezembro;

    public function __construct(
        float $janeiro,
        float $feveiro,
        float $marco,
        float $abril,
        float $maio,
        float $junho,
        float $julho,
        float $agosto,
        float $setembro,
        float $outubro,
        float $novembro,
        float $dezembro
    )
    {
        $this->janeiro = FormatDataUtil::FormatNumber($janeiro);
        $this->feveiro = FormatDataUtil::FormatNumber($feveiro);
        $this->marco = FormatDataUtil::FormatNumber($marco);
        $this->abril = FormatDataUtil::FormatNumber($abril);
        $this->maio = FormatDataUtil::FormatNumber($maio);
        $this->junho = FormatDataUtil::FormatNumber($junho);
        $this->julho = FormatDataUtil::FormatNumber($julho);
        $this->agosto = FormatDataUtil::FormatNumber($agosto);
        $this->setembro = FormatDataUtil::FormatNumber($setembro);
        $this->outubro = FormatDataUtil::FormatNumber($outubro);
        $this->novembro = FormatDataUtil::FormatNumber($novembro);
        $this->dezembro = FormatDataUtil::FormatNumber($dezembro);
    }

    public function getJaneiro(): float
    {
        return $this->janeiro;
    }

    public function getFeveiro(): float
    {
        return $this->feveiro;
    }

    public function getMarco(): float
    {
        return $this->marco;
    }

    public function getAbril(): float
    {
        return $this->abril;
    }

    public function getMaio(): float
    {
        return $this->maio;
    }

    public function getJunho(): float
    {
        return $this->junho;
    }

    public function getJulho(): float
    {
        return $this->julho;
    }

    public function getAgosto(): float
    {
        return $this->agosto;
    }

    public function getSetembro(): float
    {
        return $this->setembro;
    }

    public function getOutubro(): float
    {
        return $this->outubro;
    }

    public function getNovembro(): float
    {
        return $this->novembro;
    }

    public function getDezembro(): float
    {
        return $this->dezembro;
    }

    public function setJaneiro(float $janeiro): self
    {
        $this->janeiro = $janeiro;
        return $this;
    }

    public function setFeveiro(float $feveiro): self
    {
        $this->feveiro = $feveiro;
        return $this;
    }

    public function setMarco(float $marco): self
    {
        $this->marco = $marco;
        return $this;
    }

    public function setAbril(float $abril): self
    {
        $this->abril = $abril;
        return $this;
    }

    public function setMaio(float $maio): self
    {
        $this->maio = $maio;
        return $this;
    }

    public function setJunho(float $junho): self
    {
        $this->junho = $junho;
        return $this;
    }

    public function setJulho(float $julho): self
    {
        $this->julho = $julho;
        return $this;
    }

    public function setAgosto(float $agosto): self
    {
        $this->agosto = $agosto;
        return $this;
    }

    public function setSetembro(float $setembro): self
    {
        $this->setembro = $setembro;
        return $this;
    }

    public function setOutubro(float $outubro): self
    {
        $this->outubro = $outubro;
        return $this;
    }

    public function setNovembro(float $novembro): self
    {
        $this->novembro = $novembro;
        return $this;
    }

    public function setDezembro(float $dezembro): self
    {
        $this->dezembro = $dezembro;
        return $this;
    }
}
