<?php

namespace Likewares\Apexcharts\Types;

use Likewares\Apexcharts\Chart;

class Donut extends Chart
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('donut');
    }

    public function addPieces(array $data): Donut
    {
        return $this->setSeries($data);
    }
}
