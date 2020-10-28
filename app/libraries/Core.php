<?php

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];


    public function __construct()
    {
        $urlArray = $this->getUrl();


        // get current Controller
        if(file_exists('../app/controllers/' . ucwords($urlArray[0]) . '.php')) // [0] => Controller 
        {
            $this->currentController = ucwords($urlArray[0]);
            unset($urlArray[0]);   // vestehe ich noch nicht 100pro
        }

        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController();

        // get Method of Controller => [1]
        if(isset($urlArray[1]))
        {
            if(method_exists($this->currentController, $urlArray[1]))
            {
                $this->currentMethod = $urlArray[1];
                // unset hier nicht?
            }
        }

        // get params
        $this->params = $urlArray ? array_values($urlArray) : [];

        // call callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params); // check ich nicht
    }

    public function getUrl()
    {
        if(isset($_GET['url']))
        {
            $trimmedUrl = rtrim($_GET['url'], '/');
            $filteredUrl = filter_var($trimmedUrl, FILTER_SANITIZE_URL);
            $urlArray = explode('/', $filteredUrl);
            return $urlArray; 
        }
    }
}