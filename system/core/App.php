<?php class App
{
    protected $controller = 'error404.html';
    protected $method = 'index';
    protected $params = [];
    public function __construct()
    {
        $url = $this->parseURL();
        if ($url == '/' || $url == '' || $url == NULL) {
            $this->controller = 'home';
            unset($url[0]);
        } elseif (file_exists('app/controllers/' . $url[0] . '/' . $url[0] . 'Controller.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once('app/controllers/' . $this->controller . '/' . $this->controller . 'Controller.php');
        $this->controller = preg_replace('[.html]', '', $this->controller);
        $this->controller = new $this->controller;
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
