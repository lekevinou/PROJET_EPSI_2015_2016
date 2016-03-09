<?php
 
class Doctrine
{
    public $em = null;
 
    public function __construct()
    {
        require_once APPPATH.'config/database.php';
        require_once APPPATH.'libraries/Doctrine/Common/ClassLoader.php';
 
        $doctrineClassLoader = new \Doctrine\Common\ClassLoader('Doctrine', APPPATH.'libraries');
        $doctrineClassLoader->register();
 
        $symfonyClassLoader = new \Doctrine\Common\ClassLoader('Symfony', APPPATH.'libraries/Doctrine');
        $symfonyClassLoader->register();
 
        $entityClassLoader = new \Doctrine\Common\ClassLoader('Entities', APPPATH.'models');
        $entityClassLoader->register();
 
        $proxyClassLoader = new \Doctrine\Common\ClassLoader('Proxies', APPPATH.'models');
        $proxyClassLoader->register();
 
        $config = new \Doctrine\ORM\Configuration;
        $cache = new \Doctrine\Common\Cache\ArrayCache;
 
        $config->setProxyDir(APPPATH.'models/Proxies');
        $config->setProxyNamespace('Proxies');
        $config->setAutoGenerateProxyClasses(ENVIRONMENT == 'development');
 
        $yamlDriver = new \Doctrine\ORM\Mapping\Driver\YamlDriver(APPPATH.'models/Mappings');
        $config->setMetadataDriverImpl($yamlDriver);
 
        $connectionOptions = array(
            'driver' => 'pdo_mysql',
            'user' => $db['default']['username'],
            'password' => $db['default']['password'],
            'host' => $db['default']['hostname'],
            'dbname' => $db['default']['database'],
            'charset' => 'UTF8'
        );
 
        $em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);
 
        $this->em = $em;
    }
}