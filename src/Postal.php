<?php

namespace Travis;

class Postal
{
    protected static $symbols = [
        ',' => '',
        '.' => '',
        '#' => '',
    ];

    protected static $directions = [
        'E' => 'EAST',
        'W' => 'WEST',
        'N' => 'NORTH',
        'S' => 'SOUTH',
        'SW' => 'SOUTHWEST',
        'SE' => 'SOUTHEAST',
        'NE' => 'NORTHEAST',
        'NW' => 'NORTHWEST',
    ];

    protected static $cities = [
        'FT' => 'FORT',
        'MT' => 'MOUNT',
        'PT' => 'POINT',
        'ST' => 'SAINT',
    ];

    protected static $streets = [
        'STREET' => '', // too common and often ommited
        'ST' => '',
        'ROAD' => '', // too common and often ommited
        'RD' => '',
        'UNIT' => '', // too common and often ommited
        'SUITE' => '', // too common and often ommited
        'STE' => '',
        ###
        'ALY' => 'ALLEY',
        'AVE' => 'AVENUE',
        'BND' => 'BEND',
        'BLVD' => 'BOULEVARD',
        'BYP' => 'BYPASS',
        'CYN' => 'CANYON',
        'DR' => 'DRIVE',
        'FT' => 'FORT',
        'HWY' => 'HIGHWAY',
        'HW' => 'HIGHWAY',
        'JNCT' => 'JUNCTION',
        'JCT' => 'JUNCTION',
        'LK' => 'LAKE',
        'LN' => 'LANE',
        'PKWY' => 'PARKWAY',
        'PL' => 'PLACE',
        'PT' => 'POINT',
        'TERR' => 'TERRACE',
        'TER' => 'TERRACE',
        'TRCE' => 'TRACE',
        'TPKE' => 'TURNPIKE',
        'TRNPK' => 'TURNPIKE',
        'VW' => 'VIEW',
        'WY' => 'WAY',
    ];

    public static function run($string, $mode = 'street')
    {
        // filter symboms
        $string = str_replace(array_keys(static::$symbols), array_values(static::$symbols), $string);

        // load filter for string type
        switch ($mode)
        {
            case 'city':
                $find = static::$cities;
                break;
            default:
                $find = static::$streets;
                break;
        }

        // split words
        $words = explode(' ', $string);

        // foreach word...
        $final = [];
        foreach ($words as $key => $word)
        {
            // trim word
            $word = trim(strtoupper($word));

            // patch word for directions
            $word = isset(static::$directions[$word]) ? static::$directions[$word] : $word;

            // patch word based on filter mode
            $word = isset($find[$word]) ? $find[$word] : $word;

            // save words
            if ($word) $final[] = $word;
        }

        // return
        return trim(implode(' ', $final));
    }
}