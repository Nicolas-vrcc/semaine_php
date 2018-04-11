<?php
// evaluate the distance between 2 locations using lat and long
function distance($lat1, $lon1, $lat2, $lon2)
{

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $kilometers = $dist * 60 * 1.1515 * 1.609344;

    return intval(round($kilometers));

}

// delete a specified value in an array
function unsetValue($array, $key, $value)
{
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i]->$key == $value) {
            unset($array[$i]);
        }
    }
    return $array;
}
