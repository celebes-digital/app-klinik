<?php

use Carbon\Carbon;

if ( ! function_exists('dateHumanFormat') )
{
	function dateHumanFormat(String $date)
	{
		return Carbon::parse($date)->translatedFormat('j F Y');
	}
}