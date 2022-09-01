<?php

defined('BASEPATH') or exit('No direct script access allowed');



/*

| -------------------------------------------------------------------------

| URI ROUTING

| -------------------------------------------------------------------------

| This file lets you re-map URI requests to specific controller functions.

|

| Typically there is a one-to-one relationship between a URL string

| and its corresponding controller class/method. The segments in a

| URL normally follow this pattern:

|

|	example.com/class/method/id/

|

| In some instances, however, you may want to remap this relationship

| so that a different class/function is called than the one

| corresponding to the URL.

|

| Please see the user guide for complete details:

|

|	https://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There are three reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router which controller/method to use if those

| provided in the URL cannot be matched to a valid route.

|

|	$route['translate_uri_dashes'] = FALSE;

|

| This is not exactly a route, but allows you to automatically route

| controller and method names that contain dashes. '-' isn't a valid

| class or method name character, so it requires translation.

| When you set this option to TRUE, it will replace ALL dashes in the

| controller and method URI segments.

|

| Examples:	my-controller/index	-> my_controller/index

|		my-controller/my-method	-> my_controller/my_method

*/

$route['default_controller'] = 'auth/controller_ctl';

$route['auth']  = 'auth/controller_ctl';

$route['auth/(:any)'] = 'auth/controller_ctl/$1';

$route['auth/(:any)/(:any)'] = 'auth/controller_ctl/$1/$2';


$route['func_auth']  = 'auth/function_ctl';

$route['func_auth/(:any)'] = 'auth/function_ctl/$1';

$route['func_auth/(:any)/(:any)'] = 'auth/function_ctl/$1/$2';


$route['home']  = 'home/controller_ctl';

$route['home/(:any)'] = 'home/controller_ctl/$1';

$route['home/(:any)/(:any)'] = 'home/controller_ctl/$1/$2';


$route['presensi']  = 'home/function_ctl';

$route['presensi/(:any)'] = 'home/function_ctl/$1';

$route['presensi/(:any)/(:any)'] = 'home/function_ctl/$1/$2';



$route['notifikasi']  = 'notifikasi/controller_ctl';

$route['notifikasi/(:any)'] = 'notifikasi/controller_ctl/$1';

$route['notifikasi/(:any)/(:any)'] = 'notifikasi/controller_ctl/$1/$2';

$route['func_notifikasi']  = 'notifikasi/function_ctl';

$route['func_notifikasi/(:any)'] = 'notifikasi/function_ctl/$1';

$route['func_notifikasi/(:any)/(:any)'] = 'notifikasi/function_ctl/$1/$2';



$route['kbm']  = 'kbm/controller_ctl';

$route['kbm/(:any)'] = 'kbm/controller_ctl/$1';

$route['kbm/(:any)/(:any)'] = 'kbm/controller_ctl/$1/$2';

$route['kbm/(:any)/(:any)/(:any)'] = 'kbm/controller_ctl/$1/$2/$3';

$route['kbm/(:any)/(:any)/(:any)/(:any)'] = 'kbm/controller_ctl/$1/$2/$3/$4';

$route['kbm/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'kbm/controller_ctl/$1/$2/$3/$4/$5';

$route['func_kbm']  = 'kbm/function_ctl';

$route['func_kbm/(:any)'] = 'kbm/function_ctl/$1';

$route['func_kbm/(:any)/(:any)'] = 'kbm/function_ctl/$1/$2';




$route['jurnal']  = 'jurnal/controller_ctl';

$route['jurnal/(:any)'] = 'jurnal/controller_ctl/$1';

$route['jurnal/(:any)/(:any)'] = 'jurnal/controller_ctl/$1/$2';

$route['jurnal/(:any)/(:any)/(:any)'] = 'jurnal/controller_ctl/$1/$2/$3';

$route['func_jurnal']  = 'jurnal/function_ctl';

$route['func_jurnal/(:any)'] = 'jurnal/function_ctl/$1';

$route['func_jurnal/(:any)/(:any)'] = 'jurnal/function_ctl/$1/$2';




$route['profil']  = 'profil/controller_ctl';

$route['profil/(:any)'] = 'profil/controller_ctl/$1';

$route['profil/(:any)/(:any)'] = 'profil/controller_ctl/$1/$2';

$route['func_profil']  = 'profil/function_ctl';

$route['func_profil/(:any)'] = 'profil/function_ctl/$1';

$route['func_profil/(:any)/(:any)'] = 'profil/function_ctl/$1/$2';






$route['materi']  = 'materi/controller_ctl';

$route['materi/(:any)'] = 'materi/controller_ctl/$1';

$route['materi/(:any)/(:any)'] = 'materi/controller_ctl/$1/$2';

$route['func_materi']  = 'materi/function_ctl';

$route['func_materi/(:any)'] = 'materi/function_ctl/$1';

$route['func_materi/(:any)/(:any)'] = 'materi/function_ctl/$1/$2';




$route['tugas']  = 'tugas/controller_ctl';

$route['tugas/(:any)'] = 'tugas/controller_ctl/$1';

$route['tugas/(:any)/(:any)'] = 'tugas/controller_ctl/$1/$2';

$route['tugas/(:any)/(:any)/(:any)'] = 'tugas/controller_ctl/$1/$2/$3';

$route['tugas/(:any)/(:any)/(:any)/(:any)'] = 'tugas/controller_ctl/$1/$2/$3/$4';

$route['func_tugas']  = 'tugas/function_ctl';

$route['func_tugas/(:any)'] = 'tugas/function_ctl/$1';

$route['func_tugas/(:any)/(:any)'] = 'tugas/function_ctl/$1/$2';

$route['func_tugas/(:any)/(:any)/(:any)'] = 'tugas/function_ctl/$1/$2/$3';

$route['func_tugas/(:any)/(:any)/(:any)/(:any)'] = 'tugas/function_ctl/$1/$2/$3/$4';



$route['suratijin']  = 'suratijin/controller_ctl';

$route['suratijin/(:any)'] = 'suratijin/controller_ctl/$1';

$route['suratijin/(:any)/(:any)'] = 'suratijin/controller_ctl/$1/$2';

$route['func_suratijin']  = 'suratijin/function_ctl';

$route['func_suratijin/(:any)'] = 'suratijin/function_ctl/$1';

$route['func_suratijin/(:any)/(:any)'] = 'suratijin/function_ctl/$1/$2';



$route['qna']  = 'qna/controller_ctl';

$route['qna/(:any)'] = 'qna/controller_ctl/$1';

$route['qna/(:any)/(:any)'] = 'qna/controller_ctl/$1/$2';

$route['func_qna']  = 'qna/function_ctl';

$route['func_qna/(:any)'] = 'qna/function_ctl/$1';

$route['func_qna/(:any)/(:any)'] = 'qna/function_ctl/$1/$2';




$route['ujian']  = 'ujian/controller_ctl';

$route['ujian/(:any)'] = 'ujian/controller_ctl/$1';

$route['ujian/(:any)/(:any)'] = 'ujian/controller_ctl/$1/$2';

$route['func_ujian']  = 'ujian/function_ctl';

$route['func_ujian/(:any)'] = 'ujian/function_ctl/$1';

$route['func_ujian/(:any)/(:any)'] = 'ujian/function_ctl/$1/$2';



$route['toko']  = 'toko/controller_ctl';

$route['toko/(:any)'] = 'toko/controller_ctl/$1';

$route['toko/(:any)/(:any)'] = 'toko/controller_ctl/$1/$2';


$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;
