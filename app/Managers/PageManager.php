<?php


namespace Panel\Managers;


class PageManager
{
    public static function generateBreadcrumbs()
    {
        return "<ol class=\"breadcrumb\">" . self::getHtml(\Request::route()->getName(),'',true) . "</ol>";
    }

    private static function getHtml($route,$current,$active = false){

        if($active){
            $me = "<li class=\"active\">" . self::getName($route) . "</li>";
        }else{
            $me = "<li><a href=\"" . route($route) . "\">" . self::getName($route) . "</a></li>";
        }

        if(self::hasParent($route)){
            return self::getHtml(self::getParent($route),$me  . $current);
        }else{
            return $me  . $current;
        }

    }

    private static function hasParent($route){
        return config('pages.details')[$route]['parent'] != 'top';
    }

    private static function getParent($route){
        return config('pages.details')[$route]['parent'];
    }

    public static function getName($route){
        return config('pages.details')[$route]['name'];
    }
}