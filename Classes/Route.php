<?php
session_start();

//include '../autoload.php';
class Route
{
    public static $configurations = [];


    public static $routes = [];


//profile/:id
//    public static function test($i,$j=1){
//
//        echo $i. " ". $j;
//    }
//     public static function group($params,$func){
//
//        call_user_func($func());
//
//
//
//     }
    private static function checkParams($routeToChange)
    {
        self::$configurations = parse_ini_file("./config/routes.ini");
        $parameters = [];
        if (preg_match('/:.+/', $routeToChange)) {
// profile/:id

            $routeAndParams = explode('/', $routeToChange);

            for ($i = 0; $i < count($routeAndParams); $i++) {

                foreach (self::$configurations as $param) {

                    $key = ':' . array_search($param, self::$configurations);
                    $routeAndParams[$i] = str_replace("$key", $param, $routeAndParams[$i], $count);
                    if ($count > 0) {
                        array_push($parameters, $i);
                    }
                }
            }
            $route = implode('/',$routeAndParams);
            $test = [];
            array_push($test,$route,$parameters);
            return $test;

        }
        return false;
    }

    public static function set($routeToAdd, $controller, $roleId = null)
    {

        $routeAndParams = self::checkParams($routeToAdd);
        $action = explode('.', $controller);
        if (!$routeAndParams){
            $route=[
                $routeToAdd =>
                    [
                        'controller' => $action[0],
                        'action' => $action[1],
                        'roleId' => $roleId,
                        'params' => []
                ]
            ];
            self::$routes[] = $route;
        }else{

            $route = [
                $routeAndParams[0] =>
                    [
                        'controller' => $action[0],
                        'action' => $action[1],
                        'roleId' => $roleId,
                        'params' => $routeAndParams[1]
                    ]
            ];
            self::$routes[$routeToAdd] = $route;
        }


    }
    public static function check()
    {
        foreach (self::$routes as $route) {
            $key = key($route);


            if (preg_match("#\A$key\z#", $_GET['url'])) {
//                echo 'q';

               // echo "f";
//                print_r($_SESSION);
                if($route[$key]['roleId'] == $_SESSION['user']['roleId'] || $_SESSION['user']['roleId'] == RolesModel::ROLE_ADMIN_ID){
//                    echo "!";
                        $params = self::parseUrl($route[$key]['params']);
                        $controller = new $route[$key]['controller'];
                        $action = $route[$key]['action'];
//                        echo $action;
                        $controller->$action($params[0],$params[1]);
                    }else{
//
                    self::redirect('forbidden');
                }
                }

            }
        }


        public static function parseUrl(Array $params){
            $url = explode('/',$_GET['url']);
            $parameters= [];
            foreach ($params as $param){
                $parameters[] = $url[$param];
            }
            return $parameters;
        }



    public static function redirect($path)
    {
        header("Location: http://phpteam.test/$path");
        exit();
    }
}