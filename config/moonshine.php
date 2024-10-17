<?php
// Excepción personalizada para manejar errores 404 en MoonShine
use MoonShine\Exceptions\MoonShineNotFoundException;
 // Clase del formulario de inicio de sesión
use MoonShine\Forms\LoginForm;
// Middleware para autenticar usuarios
use MoonShine\Http\Middleware\Authenticate;
// Middleware para añadir cabeceras de seguridad a las respuestas HTTP
use MoonShine\Http\Middleware\SecurityHeadersMiddleware;
 // Modelo del usuario predeterminado de MoonShine
use MoonShine\Models\MoonshineUser;
// Clase para la plantilla del diseño principal del panel
use MoonShine\MoonShineLayout;
// Clase para la página de perfil
use MoonShine\Pages\ProfilePage;

return [
    // El directorio donde se encuentran los recursos de MoonShine
    'dir' => 'app/MoonShine',
    // Espacio de nombres para los recursos de MoonShine (según la convención PSR-4)
    'namespace' => 'App\MoonShine',

    // Título que aparecerá en el encabezado del panel de administración
    'title' => env('MOONSHINE_TITLE', 'F\'trick Consultora & Constructora E.I.R.L'),
    // Ruta del logotipo que se mostrará en el panel de administración
    'logo' => env('MOONSHINE_LOGO', '/img/logo.png'),
    // Ruta del logotipo en su versión pequeña (ej. para encabezados compactos)
    'logo_small' => env('MOONSHINE_LOGO_SMALL'),

    'route' => [
        // Dominio del panel de administración, si es diferente al dominio principal        
        'domain' => env('MOONSHINE_URL', ''),
        // Prefijo para las URLs del panel de administración
        'prefix' => env('MOONSHINE_ROUTE_PREFIX', 'admin'),
        // Prefijo utilizado para las URLs de páginas de una sola vista
        'single_page_prefix' => 'page',
        // Nombre de la ruta para la página de inicio del panel
        'index' => 'moonshine.index',

        // Middlewares a aplicar en el panel de administración
        'middlewares' => [
            // Añade cabeceras de seguridad
            SecurityHeadersMiddleware::class,
        ],
        // Controlador para manejar excepciones 404
        'notFoundHandler' => MoonShineNotFoundException::class,
    ],

    // Si se desactiva, no se usarán las migraciones predeterminadas para MoonshineUser
    'use_migrations' => true,
    // Activa o desactiva las notificaciones en el panel
    'use_notifications' => true,
    // Activa o desactiva la opción de cambiar entre tema claro y oscuro
    'use_theme_switcher' => true,

    // Clase utilizada para el diseño de la página principal del panel
    'layout' => MoonShineLayout::class,

    // Disco de almacenamiento predeterminado en el sistema de archivos
    'disk' => 'public',

    // Opciones adicionales para el disco (si es necesario)
    'disk_options' => [],

    // Tipo de caché que se utilizará (archivo por defecto)
    'cache' => 'file',

    'assets' => [
        'js' => [

            // Atributos a aplicar a las etiquetas de los scripts
            'script_attributes' => [
                'defer',// Cargar el script de forma diferida
            ]
        ],
        'css' => [
            'link_attributes' => [
                'rel' => 'stylesheet',
            ]
        ]
    ],

    'forms' => [
        // Formulario de autenticación para iniciar sesión en el panel
        'login' => LoginForm::class
    ],

    'pages' => [
        // Clase para la página del panel de control principal (dashboard)
        'dashboard' => App\MoonShine\Pages\Dashboard::class,
        // Clase para la página de perfil del usuario
        'profile' => ProfilePage::class
    ],

    // Configuraciones predeterminadas para la importación y exportación de modelos
    'model_resources' => [
        'default_with_import' => true,
        'default_with_export' => true,
    ],

    'auth' => [
        // Activa o desactiva la autenticación en el panel de administración
        'enable' => true,
        // Middleware que se usará para la autenticación
        'middleware' => Authenticate::class,

        // Campos del formulario de autenticación
        'fields' => [
            'username' => 'email',
            'password' => 'password',
            'name' => 'name',
            'avatar' => 'avatar',
        ],

        // Guardián para la autenticación
        'guard' => 'moonshine',

        // Configuración de los guardianes para la autenticación
        'guards' => [
            'moonshine' => [
                'driver' => 'session', // Usa sesiones para la autenticación
                'provider' => 'moonshine',// Proveedor de autenticación
            ],
        ],

        // Configuración del proveedor de autenticación
        'providers' => [
            'moonshine' => [
                'driver' => 'eloquent', // Usa Eloquent como driver
                'model' => MoonshineUser::class,// Modelo de usuario de Moonshine
            ],
        ],
        'pipelines' => [],
    ],
    'locales' => [
        'es',
        'en',
    ],

    // Configuración de la búsqueda global en el panel
    'global_search' => [
        // User::class
    ],

    'tinymce' => [
        // Activar o desactivar el gestor de archivos para el editor TinyMCE
        'file_manager' => false, // or 'laravel-filemanager' prefix for lfm
        'token' => env('MOONSHINE_TINYMCE_TOKEN', ''),
        'version' => env('MOONSHINE_TINYMCE_VERSION', '6'),
    ],

    // Configuración para la autenticación a través de redes sociales (socialite)
    'socialite' => [
        // 'driver' => 'path_to_image_for_button'
    ],
];
