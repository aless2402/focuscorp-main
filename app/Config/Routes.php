<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
//$routes->setController('Usuarios');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//inicio

$routes->get('/lang/{locale}', 'Language::index');

$routes->get('/', 'Home::index');
$routes->get('/acerca', 'Home::about');
//servicios
$routes->get('/servicios', 'Home::service');
$routes->get('/servicios/genex', 'Home::service_genex');

$routes->get('/servicios/genmind', 'Home::service_genex');
$routes->get('/servicios/genmo', 'Home::service_genex');
$routes->get('/servicios/gencom', 'Home::service_genex');
//contacto
$routes->get('/contacto', 'Home::contact');
$routes->post('/contacto/send_messages', 'Home::send_messages');
//newsletter
$routes->post('/newsletter', 'Home::newsletter');

//login

$routes->get('/login', 'Login::index');
$routes->get('/iniciar-sesion', 'Login::index');
$routes->post('/iniciar-sesion/login_user', 'Login::login_user');
//recuperar pass
$routes->get('/recuperar-contrasena', 'Forget::index');
$routes->post('/recuperar-contrasena/validate', 'Forget::validacion');
$routes->get('/password/(:any)', 'Forget::recover/$1');
$routes->post('/password/validate_recover', 'Forget::validate_recover');

//site map
$routes->get('/sitemap', 'Home::sitemap');
$route['sitemap'] = 'home/sitemap';
//terminos y condiciones
$routes->get('/terminos-y-condiciones', 'Home::terminos');
$routes->get('/politica-de-privacidad', 'Home::policy');
//faq
$routes->get('/preguntas-frecuentes', 'Home::faq');
//registro
$routes->get('/registro/(:any)', 'Registro::index/$1');
$routes->post('/register/validate_username', 'Registro::validate_username');
$routes->post('/register/validate_pass', 'Registro::validate_pass');
$routes->post('/register/validacion', 'Registro::validacion');
/*Creacion del api para la BD*/
$routes->get('/usuarios', 'Home::usuarios');
$routes->post('/registro_user', 'Home::registro_user');


//BACKOFFICE NEW

$routes->get('/backoffice_new', 'B_home::index',['filter' => 'authGuard']);
$routes->post('/backoffice_new/temporal', 'B_home::temporal',['filter' => 'authGuard']);
//perfil
$routes->get('/backoffice_new/perfil', 'B_perfil::setting',['filter' => 'authGuard']);
$routes->get('/backoffice_new/configuracion', 'B_perfil::setting',['filter' => 'authGuard']);
$routes->post('/backoffice_new/save_profile', 'B_perfil::save_profile',['filter' => 'authGuard']);
$routes->post('/backoffice_new/save_wallet', 'B_perfil::save_wallet',['filter' => 'authGuard']);
$routes->post('/backoffice_new/save_email', 'B_perfil::save_email',['filter' => 'authGuard']);
$routes->post('/backoffice_new/save_pass', 'B_perfil::save_pass',['filter' => 'authGuard']);
//kyc
$routes->get('/backoffice_new/kyc', 'B_perfil::kyc',['filter' => 'authGuard']);
$routes->post('/backoffice_new/kyc_validate', 'B_perfil::kyc_validate',['filter' => 'authGuard']);
//pin
$routes->get('/backoffice_new/pin', 'B_perfil::pin',['filter' => 'authGuard']);
$routes->post('/backoffice_new/save_pin', 'B_perfil::save_pin',['filter' => 'authGuard']);
$routes->post('/backoffice_new/recover_pin', 'B_perfil::recover_pin',['filter' => 'authGuard']);
$routes->get('/recover-pin/(:any)', 'Forget::recover_pin/$1');
$routes->post('/pin/validate_pin', 'Forget::validate_pin');
//planes
$routes->get('/backoffice_new/planes', 'B_plan::index',['filter' => 'authGuard']);
$routes->post('/backoffice_new/planes/activar', 'B_plan::activar',['filter' => 'authGuard']);
//historial
$routes->match(['get', 'post'], '/backoffice_new/historial', 'B_finanzas::index',['filter' => 'authGuard']);
//facturas
$routes->get('/backoffice_new/facturas', 'B_finanzas::facturas',['filter' => 'authGuard']);
$routes->get('/backoffice_new/facturas/(:any)', 'B_finanzas::facturas_detail/$1',['filter' => 'authGuard']);
//carrera
$routes->get('/backoffice_new/carrera', 'B_carrera::index',['filter' => 'authGuard']);
//ticket
$routes->get('/backoffice_new/ticket', 'B_ticket::index',['filter' => 'authGuard']);
$routes->post('/backoffice_new/ticket/send_ticket', 'B_ticket::send_ticket',['filter' => 'authGuard']);
$routes->get('/backoffice_new/ticket/(:any)', 'B_ticket::description/$1',['filter' => 'authGuard']);
//centro de ayuda
$routes->get('/backoffice_new/centro-ayuda', 'B_ticket::help',['filter' => 'authGuard']);
//materiales
$routes->get('/backoffice/documentos', 'B_files::index',['filter' => 'authGuard']);
$routes->get('/backoffice_new/documentos', 'B_files::index',['filter' => 'authGuard']);
//cobros
$routes->get('/backoffice_new/cobros', 'B_cobros::index',['filter' => 'authGuard']);
$routes->post('/backoffice_new/cobros/send_pin', 'B_cobros::send_pin',['filter' => 'authGuard']);
$routes->post('/backoffice_new/pay/make_pay', 'B_cobros::make_pay',['filter' => 'authGuard']);
$routes->post('/backoffice_new/cobros/validate_wallet', 'B_cobros::validate_wallet',['filter' => 'authGuard']);
//binario
$routes->get('/backoffice_new/binario', 'B_binario::index',['filter' => 'authGuard']);
$routes->post('/backoffice_new/binario_top', 'B_binario::top',['filter' => 'authGuard']);
$routes->post('/backoffice_new/binario_left', 'B_binario::left',['filter' => 'authGuard']);
$routes->post('/backoffice_new/binario_right', 'B_binario::right',['filter' => 'authGuard']);
$routes->get('/backoffice_new/binario/(:any)', 'B_binario::index',['filter' => 'authGuard']);
//unilevel
$routes->get('/backoffice_new/unilevel', 'B_network::unilevel',['filter' => 'authGuard']);
$routes->get('/backoffice_new/unilevel/(:any)', 'B_network::unilevel',['filter' => 'authGuard']);
//referidos
$routes->get('/backoffice/directos', 'B_network::index',['filter' => 'authGuard']);
$routes->get('/backoffice_new/directos', 'B_network::index',['filter' => 'authGuard']);



// rutas con authenticacion
$routes->get('/perfil', 'Home::perfil',['filter' => 'authGuard']);
$routes->get('/backoffice', 'B_home::index',['filter' => 'authGuard']);
$routes->post('/backoffice/temporal', 'B_home::temporal',['filter' => 'authGuard']);

$routes->get('/backoffice/perfil', 'B_perfil::index',['filter' => 'authGuard']);
$routes->post('/backoffice/perfil/save_profile', 'B_perfil::save_profile',['filter' => 'authGuard']);
$routes->post('/backoffice/perfil/update_password', 'B_perfil::update_password',['filter' => 'authGuard']);
$routes->post('/backoffice/perfil/update_wallet', 'B_perfil::update_wallet',['filter' => 'authGuard']);

$routes->post('/backoffice/binario_top', 'B_binario::top',['filter' => 'authGuard']);
$routes->post('/backoffice/binario_left', 'B_binario::left',['filter' => 'authGuard']);
$routes->post('/backoffice/binario_right', 'B_binario::right',['filter' => 'authGuard']);
$routes->get('/backoffice/binario', 'B_binario::index',['filter' => 'authGuard']);
$routes->post('/backoffice/binario/register', 'B_binario::register',['filter' => 'authGuard']);
$routes->get('/backoffice/binario/(:any)', 'B_binario::index',['filter' => 'authGuard']);

$routes->get('/backoffice/referidos', 'B_network::index',['filter' => 'authGuard']);
$routes->get('/backoffice/unilevel', 'B_network::unilevel',['filter' => 'authGuard']);
$routes->get('/backoffice/unilevel/(:any)', 'B_network::unilevel',['filter' => 'authGuard']);

$routes->get('/backoffice/planes', 'B_plan::index',['filter' => 'authGuard']);
$routes->post('/backoffice/planes/activar', 'B_plan::activar',['filter' => 'authGuard']);
$routes->get('/backoffice/inmobiliario', 'B_plan::inmobiliario',['filter' => 'authGuard']);
$routes->get('/backoffice/upgrade', 'B_plan::upgrade',['filter' => 'authGuard']);
$routes->get('/backoffice/renovacion', 'B_plan::renovation',['filter' => 'authGuard']);
$routes->get('/backoffice/renovacion/activar', 'B_plan::renovacion_activar',['filter' => 'authGuard']);

$routes->match(['get', 'post'], '/backoffice/historial', 'B_finanzas::index',['filter' => 'authGuard']);
$routes->get('/backoffice/facturas', 'B_finanzas::facturas',['filter' => 'authGuard']);
$routes->get('/backoffice/envios', 'B_finanzas::envios',['filter' => 'authGuard']);
$routes->post('/backoffice/envios/search_username', 'B_finanzas::search_username',['filter' => 'authGuard']);
$routes->post('/backoffice/envios/send_commission', 'B_finanzas::send_commission',['filter' => 'authGuard']);
$routes->match(['get', 'post'],'/backoffice/puntosbinario', 'B_finanzas::list_binarypoint',['filter' => 'authGuard']);


$routes->get('/backoffice/cobros', 'B_cobros::index',['filter' => 'authGuard']);
$routes->post('/backoffice/cobros/validate_wallet', 'B_cobros::validate_wallet',['filter' => 'authGuard']);
$routes->post('/backoffice/cobros/make_pay', 'B_cobros::make_pay',['filter' => 'authGuard']);
$routes->get('/backoffice/carrera', 'B_carrera::index',['filter' => 'authGuard']);
$routes->get('/backoffice/ticket', 'B_ticket::index',['filter' => 'authGuard']);
$routes->post('/backoffice/ticket/send_ticket', 'B_ticket::send_ticket',['filter' => 'authGuard']);
$routes->get('/backoffice/materiales', 'B_ticket::materiales',['filter' => 'authGuard']);

//Para el adminisrador
$routes->get('/admin', 'B_admin::admin');
$routes->post('/dashboard/validate', 'B_admin::login_admin');
$routes->get('/dashboard', 'D_panel::index',['filter' => 'authGuard']);
$routes->get('/dashboard/panel', 'D_panel::index',['filter' => 'authGuard']);

//pagos diarios
$routes->get('/dashboard/pagos-diarios', 'D_pagos_diarios::index');

//pagos binario
$routes->get('/dashboard/binario', 'D_pagos_diarios::binario');
//pagos binario
$routes->get('/dashboard/crone/rangos', 'D_pagos_diarios::rangos');

//Crud Bonos 
$routes->get('/dashboard/bonos', 'D_bonos::index',['filter' => 'authGuard']);
$routes->get('/dashboard/bonos/load', 'D_bonos::load',['filter' => 'authGuard']);
$routes->get('/dashboard/bonos/load/(:num)', 'D_bonos::load/$1',['filter' => 'authGuard']);
$routes->post('/dashboard/bonos/validate', 'D_bonos::validacion',['filter' => 'authGuard']);
$routes->post('/dashboard/bonos/eliminar', 'D_bonos::eliminar',['filter' => 'authGuard']);

//kyc
$routes->get('/dashboard/kyc_pendientes', 'D_kyc::index',['filter' => 'authGuard']);
$routes->get('/dashboard/kyc_verificados', 'D_kyc::kyc_verificados',['filter' => 'authGuard']);
$routes->post('/dashboard/kyc/cambiar_verificado', 'D_kyc::verificado',['filter' => 'authGuard']);
$routes->post('/dashboard/kyc/cambiar_rechazado', 'D_kyc::rechazado',['filter' => 'authGuard']);


//Crud Comentarios
$routes->get('/dashboard/comentarios', 'D_comentarios::index',['filter' => 'authGuard']);
$routes->post('/dashboard/comentarios/cambiar_status', 'D_comentarios::change_status',['filter' => 'authGuard']);
$routes->post('/dashboard/comentarios/cambiar_status_no', 'D_comentarios::change_status_no',['filter' => 'authGuard']);

//Crud Comisiones
$routes->get('/dashboard/comisiones', 'D_comisiones::index',['filter' => 'authGuard']);
$routes->get('/dashboard/comisiones/load/(:num)', 'D_comisiones::load/$1',['filter' => 'authGuard']);
$routes->post('/dashboard/comisiones/validate', 'D_comisiones::validacion',['filter' => 'authGuard']);
$routes->post('/dashboard/comisiones/eliminar', 'D_comisiones::eliminar',['filter' => 'authGuard']);

//Crud Facturas
$routes->get('/dashboard/facturas', 'D_facturas::index',['filter' => 'authGuard']);
$routes->get('/dashboard/facturas/load/(:num)', 'D_facturas::load/$1',['filter' => 'authGuard']);
$routes->post('/dashboard/facturas/validate', 'D_facturas::validacion',['filter' => 'authGuard']);

//Crud Kit
$routes->get('/dashboard/planes', 'D_planes::index',['filter' => 'authGuard']);
$routes->get('/dashboard/planes/load/(:num)', 'D_planes::load/$1',['filter' => 'authGuard']);
$routes->post('/dashboard/planes/validate', 'D_planes::validacion',['filter' => 'authGuard']);

//Crud concepto_ticket
$routes->get('/dashboard/concepto_ticket', 'D_concepto_ticket::index',['filter' => 'authGuard']);
$routes->get('/dashboard/concepto_ticket/load', 'D_concepto_ticket::load',['filter' => 'authGuard']);
$routes->get('/dashboard/concepto_ticket/load/(:num)', 'D_concepto_ticket::load/$1',['filter' => 'authGuard']);
$routes->post('/dashboard/concepto_ticket/validate', 'D_concepto_ticket::validacion',['filter' => 'authGuard']);

//Crud pagos
$routes->get('/dashboard/pagos', 'D_pagos::index',['filter' => 'authGuard']);
$routes->get('/dashboard/pagos/load', 'D_pagos::load',['filter' => 'authGuard']);
$routes->get('/dashboard/pagos/load/(:num)', 'D_pagos::load/$1',['filter' => 'authGuard']);
$routes->post('/dashboard/pagos/validate', 'D_pagos::validacion',['filter' => 'authGuard']);
$routes->post('/dashboard/pagos/eliminar', 'D_pagos::eliminar',['filter' => 'authGuard']);

//Crud puntos
$routes->get('/dashboard/puntos', 'D_puntos::index',['filter' => 'authGuard']);
$routes->get('/dashboard/puntos/load/(:num)', 'D_puntos::load/$1',['filter' => 'authGuard']);
$routes->post('/dashboard/puntos/validate', 'D_puntos::validacion',['filter' => 'authGuard']);
$routes->post('/dashboard/puntos/eliminar', 'D_puntos::eliminar',['filter' => 'authGuard']);

//Crud rangos
$routes->get('/dashboard/rangos', 'D_rangos::index',['filter' => 'authGuard']);
$routes->get('/dashboard/rangos/load/(:num)', 'D_rangos::load/$1',['filter' => 'authGuard']);
$routes->post('/dashboard/rangos/validate', 'D_rangos::validacion',['filter' => 'authGuard']);
$routes->post('/dashboard/rangos/eliminar', 'D_rangos::eliminar',['filter' => 'authGuard']);
//nuevos rangos panel
$routes->get('/dashboard/nuevos_rangos', 'D_rangos::nuevos_rangos',['filter' => 'authGuard']);
//bono liderazgo
$routes->get('/dashboard/bono_liderazgo', 'D_rangos::liderazgo',['filter' => 'authGuard']);
$routes->post('/dashboard/bono_liderazgo/pagado', 'D_rangos::liderazgo_pagado',['filter' => 'authGuard']);

//Crud usuarios
$routes->get('/dashboard/usuarios', 'D_usuarios::index',['filter' => 'authGuard']);
$routes->get('/dashboard/usuarios/load', 'D_usuarios::load',['filter' => 'authGuard']);
$routes->get('/dashboard/usuarios/load/(:num)', 'D_usuarios::load/$1',['filter' => 'authGuard']);
$routes->post('/dashboard/usuarios/validate', 'D_usuarios::validacion',['filter' => 'authGuard']);
$routes->post('/dashboard/usuarios/eliminar', 'D_usuarios::eliminar',['filter' => 'authGuard']);

//Crud setting
$routes->get('/dashboard/setting', 'D_setting::index',['filter' => 'authGuard']);
$routes->post('/dashboard/setting/validate', 'D_setting::validacion',['filter' => 'authGuard']);

//Crud Clientes 
$routes->get('/dashboard/clientes', 'D_clientes::index',['filter' => 'authGuard']);
$routes->get('/dashboard/clientes/load/(:num)', 'D_clientes::load/$1',['filter' => 'authGuard']);
$routes->post('/dashboard/clientes/validate', 'D_clientes::validacion',['filter' => 'authGuard']);

//ACTIVACIONES
$routes->get('/dashboard/activaciones', 'D_activaciones::index',['filter' => 'authGuard']);
$routes->get('/dashboard/activaciones/nuevo', 'D_activaciones::nuevo',['filter' => 'authGuard']);
$routes->post('/dashboard/activaciones/validate_user', 'D_activaciones::validate_user',['filter' => 'authGuard']);
$routes->post('/dashboard/activaciones/active', 'D_activaciones::activar',['filter' => 'authGuard']);
$routes->post('/dashboard/activaciones/active_financy', 'D_activaciones::activar_financiado',['filter' => 'authGuard']);
$routes->post('/dashboard/activaciones/activar_from_backoffice', 'D_activaciones::activar_from_backoffice',['filter' => 'authGuard']);
$routes->post('/dashboard/activaciones/activar_from_upgrade', 'D_activaciones::activar_from_upgrade',['filter' => 'authGuard']);
$routes->post('/dashboard/activaciones/activar_from_renovation', 'D_activaciones::activar_from_renovation',['filter' => 'authGuard']);

$routes->get('/dashboard/upgrade', 'B_admin::upgrade',['filter' => 'authGuard']);

//PAGOS
$routes->get('/dashboard/activar_pagos', 'D_activar_pagos::index',['filter' => 'authGuard']);
$routes->get('/dashboard/activar_pagos/load/(:num)', 'D_activar_pagos::load/$1',['filter' => 'authGuard']);
$routes->post('/dashboard/activar_pagos/pagado', 'D_activar_pagos::pagado',['filter' => 'authGuard']);
$routes->post('/dashboard/activar_pagos/devolver', 'D_activar_pagos::devolver',['filter' => 'authGuard']);
$routes->post('/dashboard/activar_pagos/validate', 'D_activar_pagos::validacion',['filter' => 'authGuard']);

//Integración Pagos
$routes->get('/dashboard/integracion_pagos', 'D_integracion_pagos::index',['filter' => 'authGuard']);
$routes->get('/dashboard/integracion_pagos/load', 'D_integracion_pagos::load',['filter' => 'authGuard']);
$routes->get('/dashboard/integracion_pagos/load/(:num)', 'D_integracion_pagos::load/$1',['filter' => 'authGuard']);
$routes->post('/dashboard/integracion_pagos/validate_user', 'D_integracion_pagos::validate_user',['filter' => 'authGuard']);
$routes->post('/dashboard/integracion_pagos/active', 'D_integracion_pagos::active',['filter' => 'authGuard']);
$routes->post('/dashboard/integracion_pagos/delete', 'D_integracion_pagos::eliminar',['filter' => 'authGuard']);

//Integración Descuentos
$routes->get('/dashboard/descuentos_pagos', 'D_integracion_pagos::descuentos',['filter' => 'authGuard']);
$routes->get('/dashboard/descuentos_pagos/load', 'D_integracion_pagos::descuentos_load',['filter' => 'authGuard']);
$routes->get('/dashboard/descuentos_pagos/load/(:num)', 'D_integracion_pagos::descuentos_load/$1',['filter' => 'authGuard']);
$routes->post('/dashboard/descuentos_pagos/validate_user', 'D_integracion_pagos::validate_user',['filter' => 'authGuard']);
$routes->post('/dashboard/descuentos_pagos/active_discount', 'D_integracion_pagos::active_descuento',['filter' => 'authGuard']);
$routes->post('/dashboard/descuentos_pagos/delete', 'D_integracion_pagos::eliminar',['filter' => 'authGuard']);

//Integración Puntos
$routes->get('/dashboard/integracion_puntos', 'D_integracion_pagos::puntos',['filter' => 'authGuard']);
$routes->get('/dashboard/integracion_puntos/load', 'D_integracion_pagos::puntos_load',['filter' => 'authGuard']);
$routes->get('/dashboard/integracion_puntos/load/(:num)', 'D_integracion_pagos::puntos_load/$1',['filter' => 'authGuard']);
$routes->post('/dashboard/integracion_puntos/validate_user', 'D_integracion_pagos::validate_user',['filter' => 'authGuard']);
$routes->post('/dashboard/integracion_puntos/active_points', 'D_integracion_pagos::active_puntos',['filter' => 'authGuard']);
$routes->post('/dashboard/integracion_puntos/delete', 'D_integracion_pagos::eliminar_point_binary',['filter' => 'authGuard']);

// Soporte
$routes->get('/dashboard/ticket', 'D_ticket::index',['filter' => 'authGuard']);
$routes->get('/dashboard/ticket/load/(:num)', 'D_ticket::load/$1',['filter' => 'authGuard']);
$routes->post('/dashboard/ticket/validate', 'D_ticket::validacion',['filter' => 'authGuard']);
$routes->post('/dashboard/ticket/delete', 'D_ticket::eliminar',['filter' => 'authGuard']);

//SERVICIOS BACK END DASHBOARD
$routes->group('bonus', function ($routes) {
    $routes->get('list', 'B_bonus::list',['filter' => 'authGuard']);
    $routes->post('register', 'B_bonus::register',['filter' => 'authGuard']);
    $routes->post('update', 'B_bonus::update',['filter' => 'authGuard']);
    $routes->post('delete', 'B_bonus::delete',['filter' => 'authGuard']);
});
$routes->group('kit', function ($routes) {
    $routes->get('list', 'B_kit::list',['filter' => 'authGuard']);
    $routes->post('register', 'B_kit::register',['filter' => 'authGuard']);
    $routes->post('update', 'B_kit::update',['filter' => 'authGuard']);
    $routes->post('delete', 'B_kit::delete',['filter' => 'authGuard']);
});
$routes->group('ranges', function ($routes) {
    $routes->get('list', 'B_ranges::list',['filter' => 'authGuard']);
    $routes->post('register', 'B_ranges::register',['filter' => 'authGuard']);
    $routes->post('update', 'B_ranges::update',['filter' => 'authGuard']);
    $routes->post('delete', 'B_ranges::delete',['filter' => 'authGuard']);
});
$routes->group('users', function ($routes) {
    $routes->get('list', 'B_user::list',['filter' => 'authGuard']);
    $routes->post('register', 'B_user::register',['filter' => 'authGuard']);
    $routes->post('update', 'B_user::update',['filter' => 'authGuard']);
    $routes->post('delete', 'B_user::delete',['filter' => 'authGuard']);
});

$routes->get('/logout', 'Home::logout');
$routes->get('/salir', 'Home::logout');
$routes->get('/dashboard/logout', 'Home::adm_logout');

$routes->get('/(:any)', 'Home::otras');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
