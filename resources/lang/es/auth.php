<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
        ///////
         //titles

        'signup_browser_title'                    => 'Crea tu cuenta',
        'login_browser_title'                     => 'Ingresa a tu cuenta',
        'password_reset_request_browser_title'    => 'Recuperar contraseña',
        
        'password_reset_browser_title'            => 'Crea una nueva contraseña',

        //////
         //email
        'password_reset_email_title'              => 'Has solicitado restablecer la contraseña',
        'password_reset_email_text'               => 'Para poder restabler tu contraseña,has click en el siguiente enlace',
        'password_reset_email_subject'            => 'Recuperación de contraseña',
        'password_reset_email_no_request_text'    => 'Si no has solicitado restablecer tu contraseña. No te preocupes, puedes ignorar este correo. No realizaremos ningún cambio',
        
        ///////
         //Form Fields

        'signup_name'                             => 'Nombre',
        'signup_name_placeholder'                 => 'Ingresa tu  nombre',

        'signup_username'                         => 'Nombre de usuario',
        'signup_username_placeholder'             => 'Ingresa tu  nombre de usuario',

        'signup_email'                            => 'Correo',
        'signup_email_placeholder'                => 'Ingresa tu  correo electrónico',

        'signup_password'                         => 'Contraseña',
        'signup_password_placeholder'             => 'Ingresa tu  contraseña',

        'signup_password_confirmation'            => 'Repite tu Contraseña',
        'signup_password_confirmation_placeholder'=> 'Repite tu  contraseña',

        ///////
         //texts

        'signup_accept_disclaimer'                 => 'He leido,entendido y aceptado los <a href=":tos_url" target ="_blank">Términos y condiciones de uso</a> 
                                                       y las <a href=":privacy_url" target ="_blank">Politicas de privacidad </a>  de :app_name' ,
        'login_remember_me'                        => 'Mantener conectado' ,

        'password_reset_request_text'              => 'Ingresa la dirección de correo con la que te registraste y te enviaremos las instrucciones para generar una nueva contraseña.' ,         
         'password_reset_text'                     => 'Has comprobado tu identidad, Ahora crea una nueva contraseña para poder ingresar al sistema' ,         
        'password_reset_request_email_send_text'   => 'Ya hemos enviado las instrucciones para que puedas restablecer la contraseña al correo que nos has indicado:' ,         
        'password_reset_request_email_send_hint_text'   => 'Si luego de unos segundos no has recibido el correo,revisa tu casilla de correo no deseado (spam).' ,         
        'password_reset_token_invalid_text'         => 'El token que estás utilizando no es válido o ha expirado. Restablece tu contraseña nuevamente',
        'password_reset_token_invalid_body'         => 'Token inválido',

        ///////
         //alerts

         'signup_success_alert'                    => 'Se ha creado correctamente tu cuenta. Bienvenido!', 
         'logout_success_alert'                    => 'Has salido correctamente del sistema', 

         ///////buttons

         'signup_btn'                              => 'Crear mi cuenta', 
         'login_btn'                               => 'Ingresar a mi cuenta', 
         'password_reset_btn'                      => 'Enviar',  

         ///////
         //call to action

         'login_call_to_action'                    => '¿Ya tienes una cuenta? Ingresa aquí.' ,  
         'signup_call_to_action'                   => '¿No tienes una cuenta? Crea una aquí.' , 
         'reset_password_call_to_action'           => '¿Olvidaste tu contraseña?',  
         'reset_password_call_to_action_alternative'  => 'Restablecer tu contraseña',  

         ///////
         //validation errors

         'accept_disclaimer_error'                 => 'Debes aceptar los términos de uso y las politicas de privacidad',  
         'username_error_unique'                   => 'El nombre de usuario ya existe',
         'email_error_unique'                      => 'El correo ya está registrado en nuestra base de datos',
         'email_error_exists'                      => 'Este correo no se encuentra registrado',
         'email_error_login'                       => 'Los datos de acceso no son válidos',
         'password_error_exists'                   => 'La contraseña no corresponde al usuario',
         'username_error_regex'                    => 'Solo puedes usar minúsculas,números,guión bajo,sin tildes ni ñ.',

         

        'failed'                                   => 'Estas credenciales no coinciden con nuestros registros.',
        'throttle'                                 => 'Demasiados intentos de acceso. Por favor intente nuevamente en :seconds segundos.',

];
