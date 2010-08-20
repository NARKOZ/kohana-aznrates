<?php defined('SYSPATH') OR die('No direct script access.');

// Catch-all route for aznrates classes to run
Route::set('currency', 'aznxrates(/<date>)', array('date'=>'([0-9\.]+)'))
    ->defaults(array(
            'controller' => 'currency',
            'action'     => 'index',
            'date'		 => NULL,
    )
);

?>