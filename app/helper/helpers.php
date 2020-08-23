<?php

function getLogo()
{
    $data = \App\Logo::first();
    if ($data != null) {
        return $data->logo_image;
    }
}

function setActiveHome($segment)
{
    if (Request::segment(1) == '') {
        return 'active';
    }
}

function setActive($segment)
{
    if($segment == Request::segment(1)) {
        return 'active';
    }
}

function setCurrentHome($segment)
{
    if (Request::segment(1) == '') {
        return 'current';
    }
}

function setCurrent($segment)
{
    if($segment == Request::segment(1)) {
        return 'current';
    }
}


function getColor()
{
    $settings = \App\WebsiteSetting::first();
    return $settings->color;
}

function getThemeName()
{
    $theme = \App\Theme::where('status', 1)->first();
    return $theme->en_title;
}

function admin()
{
    return auth()->guard('admin');
}
