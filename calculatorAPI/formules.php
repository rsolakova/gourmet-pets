<?php

function calories($weight, $activity)
{
    $result = 70 * pow($weight, 0.75) * $activity;

    return $result;
}

function activity($body, $neutered, $active)
{
    $result = null;

    if ($body == 'slim' && $active == 'high_active' && $neutered == false) {
        $result = 1.8;
    }

    if ($body == 'slim' && $active == 'less_active' && $neutered == false) {
        $result = 1.6;
    }

    if ($body == 'slim' && $active == 'normal_active' && $neutered == false) {
        $result = 1.6;
    }

    if ($body == 'slim' && $active == 'high_active' && $neutered == true) {
        $result = 1.8;
    }

    if ($body == 'slim' && $active == 'less_active' && $neutered == true) {
        $result = 1.6;
    }

    if ($body == 'slim' && $active == 'normal_active' && $neutered == true) {
        $result = 1.6;
    }

    if ($body == 'normal' && $active == 'high_active' && $neutered == false) {
        $result = 1.8;
    }

    if ($body == 'normal' && $active == 'less_active' && $neutered == false) {
        $result = 1.6;
    }

    if ($body == 'normal' && $active == 'normal_active' && $neutered == false) {
        $result = 1.6;
    }

    if ($body == 'normal' && $active == 'high_active' && $neutered == true) {
        $result = 1.6;
    }

    if ($body == 'normal' && $active == 'less_active' && $neutered == true) {
        $result = 1.4;
    }

    if ($body == 'normal' && $active == 'normal_active' && $neutered == true) {
        $result = 1.6;
    }

    if ($body == 'fat' && $active == 'high_active' && $neutered == false) {
        $result = 1.6;
    }

    if ($body == 'fat' && $active == 'less_active' && $neutered == false) {
        $result = 1.4;
    }

    if ($body == 'fat' && $active == 'normal_active' && $neutered == false) {
        $result = 1.4;
    }

    if ($body == 'fat' && $active == 'high_active' && $neutered == true) {
        $result = 1.4;
    }

    if ($body == 'fat' && $active == 'less_active' && $neutered == true) {
        $result = 1.0;
    }

    if ($body == 'fat' && $active == 'normal_active' && $neutered == true) {
        $result = 1.0;
    }

    return $result;
}

function price($weight, $meat, $active_index)
{
    require 'prices.php';

    $result = null;

    if ($meat == 'beef') {

        if ($active_index == 1.8) {
            $result = $beef_1_8;
        }

        if ($active_index == 1.6) {
            $result = $beef_1_6;
        }

        if ($active_index == 1.4) {
            $result = $beef_1_4;
        }

        if ($active_index == 1.0) {
            $result = $beef_1_0;
        }
    }

    if ($meat == 'pork') {
        if ($active_index == 1.8) {
            $result = $pork_1_8;
        }

        if ($active_index == 1.6) {
            $result = $pork_1_6;
        }

        if ($active_index == 1.4) {
            $result = $pork_1_4;
        }

        if ($active_index == 1.0) {
            $result = $pork_1_0;
        }
    }

    if ($meat == 'chicken') {
        if ($active_index == 1.8) {
            $result = $chicken_1_8;
        }

        if ($active_index == 1.6) {
            $result = $chicken_1_6;
        }

        if ($active_index == 1.4) {
            $result = $chicken_1_4;
        }

        if ($active_index == 1.0) {
            $result = $chicken_1_0;
        }
    }


    $result = $result[$weight][0];

    return $result;
}