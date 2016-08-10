<?php


namespace Panel\Managers;


use Illuminate\Support\Facades\Route;

class PageManager
{
    public static function generateBreadcrumbs()
    {
        return "<ol class=\"breadcrumb\">" . self::getHtml(\Request::route()->getName(),'',true) . "</ol>";
    }

    private static function getHtml($route,$current,$active = false){

        $params = self::getParams($route);
        if($active){
            $me = "<li class=\"active\">" . self::getName($route) . "</li>";
        }else{
            $me = "<li><a href=\"" . route($route,Route::current()->getParameter($params[0])) . "\">" . self::getName($route) . "</a></li>";

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
    public static function getParams($route){
        if(isset(config('pages.details')[$route]['params'])){
            return config('pages.details')[$route]['params'];
        }
        return null;

    }
}