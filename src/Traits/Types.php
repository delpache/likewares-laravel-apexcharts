<?php

namespace Likewares\Apexcharts\Traits;

use Likewares\Apexcharts\Types\Area;
use Likewares\Apexcharts\Types\Bar;
use Likewares\Apexcharts\Types\Donut;
use Likewares\Apexcharts\Types\HeatMap;
use Likewares\Apexcharts\Types\HorizontalBar;
use Likewares\Apexcharts\Types\Line;
use Likewares\Apexcharts\Types\Pie;
use Likewares\Apexcharts\Types\PolarArea;
use Likewares\Apexcharts\Types\Radar;
use Likewares\Apexcharts\Types\Radial;

trait Types
{
    public function area(): Area
    {
        return new Area();
    }

    public function bar(): Bar
    {
        return new Bar();
    }

    public function donut(): Donut
    {
        return new Donut();
    }

    public function heatMap(): HeatMap
    {
        return new HeatMap();
    }

    public function horizontalBar(): HorizontalBar
    {
        return new HorizontalBar();
    }

    public function line(): Line
    {
        return new Line();
    }

    public function pie(): Pie
    {
        return new Pie();
    }

    public function polarArea(): PolarArea
    {
        return new PolarArea();
    }

    public function radar(): Radar
    {
        return new Radar();
    }

    public function radial(): Radial
    {
        return new Radial();
    }
}
