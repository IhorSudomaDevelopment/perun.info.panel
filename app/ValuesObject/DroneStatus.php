<?php

namespace App\ValuesObject;

class DroneStatus
{
    /*** @var string */
    public const WORK = 'Combat-ready';
    /*** @var string */
    public const NOT_WORK = 'Not Combat-ready';
    /*** @var string */
    public const LOST = 'Lost';
    /*** @var string */
    public const ON_WAREHOUSE = 'On warehouse';

    /*** @return string[] */
    public static function getList(): array
    {
        return [
            self::WORK => self::WORK,
            self::NOT_WORK => self::NOT_WORK,
            self::LOST => self::LOST,
            self::ON_WAREHOUSE => self::ON_WAREHOUSE,
        ];
    }
}
