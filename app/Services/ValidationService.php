<?php

namespace Red5g\Services;


class ValidationService {

    public static function emailValid($email)
    {
        return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;
    }

    public static function dateValid($date)
    {
        $date_regex = '/^(19|20)\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])$/';

        return (preg_match($date_regex, $date)) ? true : false;
    }
}