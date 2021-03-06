<?php

/**
 * Class Validation
 */
class Validation
{
    /**
     * @param $name
     * @return bool
     */
    function validName($name)
    {
        $name = str_replace(' ', '', $name);
        return !empty($name) && ctype_alpha($name);
    }

    /**
     * @param $age
     * @return bool
     */
    function validAge($age)
    {
        return !is_nan((floatval($age))) && $age >= 18 && $age <= 118;
    }

    /**
     * @param $phone
     * @return bool
     */
    function validPhone($phone)
    {
        // Allow +, - and . in phone number
        $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        // Remove "-" from number
        $phone_to_check = str_replace("-", "", $filtered_phone_number);
        // Check the length of number
        // This can be customized if you want phone number from a specific country
        if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $email
     * @return bool
     */
    function validEmail($email)
    {
        return (!preg_match(
            "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email))
            ? FALSE : TRUE;
    }

    /**
     * @param $outdoor
     * @return bool
     */
    function validOutdoor($outdoor)
    {
        $outdoors = getOutDoor();
        if (empty($outdoor)) {
            return false;
        }

        foreach ($outdoor as $key) {
            if (in_array($key, $outdoors)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $indoor
     * @return bool
     */
    function validIndoor($indoor)
    {
        $indoors = getInDoor();
        if (empty($indoor)) {
            return false;
        }

        foreach ($indoor as $key) {
            if (in_array($key, $indoors)) {
                return true;
            }
        }
        return false;
    }
}