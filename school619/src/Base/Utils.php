<?php


namespace Alexandr\Vatutin\School619\Base;


class Utils
{
    public static function getRandom(){
        $num = rand(0,9999);
        return $num;
    }
}