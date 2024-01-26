<?php

namespace App\ValueObjects;

use JsonSerializable;

class Calendario  implements JsonSerializable
{
    private float $janeiro;
    private float $fevereiro;
    private float $marco;
    private float $abril;
    private float $maio;
    private float $junho;
    private float $julho;
    private float $agosto;
    private float $setembro;
    private float $outubro;
    private float $novembro;
    private float $dezembro;

    /**
     * @param float $janeiro
     * @param float $fevereiro
     * @param float $marco
     * @param float $abril
     * @param float $maio
     * @param float $junho
     * @param float $julho
     * @param float $agosto
     * @param float $setembro
     * @param float $outubro
     * @param float $novembro
     * @param float $dezembro
     */
    protected function __construct(float $janeiro, float $fevereiro, float $marco, float $abril, float $maio, float $junho, float $julho, float $agosto, float $setembro, float $outubro, float $novembro, float $dezembro)
    {
        $this->janeiro    = $janeiro ?? 0;
        $this->fevereiro  = $fevereiro ?? 0;
        $this->marco      = $marco ?? 0;
        $this->abril      = $abril ?? 0;
        $this->maio       = $maio ?? 0;
        $this->junho      = $junho ?? 0;
        $this->julho      = $julho ?? 0;
        $this->agosto     = $agosto ?? 0;
        $this->setembro   = $setembro ?? 0;
        $this->outubro    = $outubro ?? 0;
        $this->novembro   = $novembro ?? 0;
        $this->dezembro   = $dezembro ?? 0;
    }

    public function total() : float
    {
        return ($this->janeiro ?? 0)
             + ($this->fevereiro ?? 0)
             + ($this->marco ?? 0)
             + ($this->abril ?? 0)
             + ($this->maio ?? 0)
             + ($this->junho ?? 0)
             + ($this->julho ?? 0)
             + ($this->agosto ?? 0)
             + ($this->setembro ?? 0)
             + ($this->outubro ?? 0)
             + ($this->novembro ?? 0)
             + ($this->dezembro ?? 0);
    }

    public function get_list() : array
    {
        return [
            "janeiro" => $this->janeiro,
            "fevereiro" => $this->fevereiro,
            "marco" => $this->marco,
            "abril" => $this->abril,
            "maio" => $this->maio,
            "junho" => $this->junho,
            "julho" => $this->julho,
            "agosto" => $this->agosto,
            "setembro" => $this->setembro,
            "outubro" => $this->outubro,
            "novembro" => $this->novembro,
            "dezembro" => $this->dezembro
        ];
    }

    public static function create($janeiro, $fevereiro, $marco, $abril, $maio, $junho, $julho, $agosto, $setembro, $outubro, $novembro, $dezembro)
    {
        return new Calendario($janeiro, $fevereiro, $marco, $abril, $maio, $junho, $julho, $agosto, $setembro, $outubro, $novembro, $dezembro);
    }

    public static function default()
    {
        return new Calendario(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    }

    public function jsonSerialize()
    {
        return $this->get_list();
    }
}
