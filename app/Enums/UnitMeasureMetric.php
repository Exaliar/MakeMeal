<?php

namespace App\Enums;

enum UnitMeasureMetric
{
    case Teaspoon;
    case Tablespoon;
    case Cup;
    case Glass;
    case Gram;
    case Kilogram;
    case Milliliter;
    case Liter;
    case Pinch;
    case Clove;
    case Piece;


    public function grams(): ?float
    {
        return match ($this) {
            self::Teaspoon => 5,
            self::Tablespoon => 15,
            self::Cup => 240,
            self::Glass => 240,
            self::Gram => 1,
            self::Kilogram => 1000,
            self::Milliliter => 1, // Zależy od gęstości składnika
            self::Liter => 1000, // Zależy od gęstości składnika
            self::Pinch => 0.5,
            self::Clove => 3, // Zależy od czosnku
            self::Piece => null, // Zależy od składnika
        };
    }
}
