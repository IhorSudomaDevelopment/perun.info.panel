<?php

namespace App\ValuesObject;

/**
 *
 */
class DroneType
{
    /*** @var string */
    public const R2D2 = 'R2D2';
    /*** @var string */
    public const ORION = 'Orion';


    /*** @return string[] */
    public static function getList(): array
    {
        return [
            self::R2D2 => self::R2D2,
            self::ORION => self::ORION,
        ];
    }
}
