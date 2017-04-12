<?php
    namespace System\Helpers;

    use Windwalker\Edge\Edge;
    use Windwalker\Edge\Loader\EdgeFileLoader;

    class Template
    {
        public static function render($file, $vars = array(), $cache = false){
            $paths  = array('App/Views');

            $loader = new EdgeFileLoader($paths);
            $loader->addFileExtension('.edge.php');

            if($cache === false)
                $edge = new Edge($loader);
            else
                $edge = new Edge($loader, null, new EdgeFileCache( 'App/Cache'));
            return $edge->render($file, $vars);

        }
    }