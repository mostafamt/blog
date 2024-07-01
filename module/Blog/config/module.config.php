<?php
return array(
    'db' => array(
        'driver'         => 'Pdo',
        'username'       => 'root',  //edit this
        'password'       => '',  //edit this
        'dsn'            => 'mysql:dbname=blog;host=localhost',
        'driver_options' => array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Blog\Controller\List' => 'Blog\Factory\ListControllerFactory',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Blog\Mapper\PostMapperInterface'   => 'Blog\Factory\ZendDbSqlMapperFactory',
            'Blog\Service\PostServiceInterface' => 'Blog\Factory\PostServiceFactory',
            'Zend\Db\Adapter\Adapter'           => 'Zend\Db\Adapter\AdapterServiceFactory'
        ),
    ),
    'router' => array(
        'routes' => array(
            'post' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/blog',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Blog\Controller',
                        'controller'    => 'List',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Blog' => __DIR__ . '/../view',
        ),
    ),
);
