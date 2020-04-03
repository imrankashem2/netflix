<?php

return array(
/** set your paypal credential **/
'client_id' =>'AcHrwP4VHD8x4EOB1UlIcof3bMB0oYYYjHfwO8STmh4JtncocJ3HK03lqy3YXYVGC3i6P1-XdyqXQ-Aq2',
'secret' => 'EJwVTBGDKymCNfoKi5PEmOyo-Ipdrl18K3RpetS1UB_hTyYNSZ92a3ysB8Sjo2Dpie7y1fesGl3GB8VJW',
/**
* SDK configuration 
*/
'settings' => array(
/**
* Available option 'sandbox' or 'live'
*/
'mode' => 'sandbox',
/**
* Specify the max request time in seconds
*/
'http.ConnectionTimeOut' => 1000,
/**
* Whether want to log to a file
*/
'log.LogEnabled' => true,
/**
* Specify the file that want to write on
*/
'log.FileName' => storage_path() . '/logs/paypal.log',
/**
* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
*
* Logging is most verbose in the 'FINE' level and decreases as you
* proceed towards ERROR
*/
'log.LogLevel' => 'FINE'
),
);