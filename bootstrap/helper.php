<?php 
function test()
{
	return 'ok';
}

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}