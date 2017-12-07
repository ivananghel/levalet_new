<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return [

    /**
     * Name of the application
     */
	'name'			=> env('APP_NAME', 'Le Valet'),

    /**
     * Date format used in output for datatables
     *
     * Must be a valid SQL date format string
     */
	'date_format'   => '%d %M %Y %H:%i',
	'datepicker'	=> 'yy-mm-dd',
	'formatAPI'		=> 'U',
    'formatUI'      => 'Y-m-d',
	'uploadPath'	=> 'uploads/',
	'faIconsPath'	=> 'fa-icons/png/256/',
	
	'contcat_info' => array(
		'email' => 'levaler@gmail.com',
		'phone' => '+39 0536 941 018', 
		'site'	=> 'www.xxx.it',
	),
	
	'terms_link'	=> '',
	'privacy_link'	=> '',
	
	'recovery_email_subject'	=> 'hello'
];