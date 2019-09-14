<?php
// Constant type in here
define('VIEW_ERROR', './app/views/view_error.php');

class App
{
    protected $controller = DEFAULT_CONTROLLER;
    protected $method = DEFAULT_METHOD;
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // Apabila bukan API
        if ($url[0] !== 'api') {
            // Mencari controller dari url sequences ke 1
            // Apabila ketemu maka $controller
            // ditimpah dengan yang baru. Kalau tidak ada maka
            // dijadikan null.
            if (file_exists('./app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            } else {
                if (isset($url[0])) {
                    $this->controller = null;
                    unset($url[0]);
                }
            }
            // Apabila controller null maka proses require akan diskip
            if ($this->controller != null) {
                require './app/controllers/' . $this->controller . '.php';
                $this->controller = new $this->controller;
            }

            // Ambil method dari url sequences ke 2
            if (isset($url[1])) {
                if (method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            // Parsing params dari url sequences ke 3
            if (!empty($url)) {
                $this->params = array_values($url);
            }

            // Apabila controller kosong maka akan menampilkan pesan error.
            // Dapat dimodifikasi di app/views/view_error.php.
            if ($this->controller == null) {
                $data['code'] = 404;
                $data['desc'] = 'Not Found';
                require './app/views/view_error.php';
            }
            // jalankan controller & method, serta kirimkan params jika ada        
            else {
                call_user_func_array([$this->controller, $this->method], $this->params);
            }
        }
        // Apabila adalah API
        else {
            // Unset first variable
            // And make it content type to application/json
            unset($url[0]);
            header('Content-Type: application/json');

            // Set default method to GET
            $this->method = 'GET';

            // Splash screen for API
            if (!isset($url[1])) {
                die(json_encode([
                    'message' => 'It works'
                ]));
            } else {
                // Search controller
                if (file_exists('./app/controllers/API/' . $url[1] . '.php')) {
                    $this->controller = $url[1];
                }
                // Aoabila controller tidak ditemukan, langsung matikan
                else {
                    $this->controller = null;
                    http_response_code(HTTPCodeDefenition::HTTP_NOT_FOUND);
                    die(json_encode([
                        'status' => 'NO',
                        'error' => [
                            'code' => HTTPCodeDefenition::HTTP_NOT_FOUND,
                            'message' => 'Not found'
                        ]
                    ]));
                }
                require './app/controllers/API/' . $url[1] . '.php';
                $this->controller = new $this->controller;
                unset($url[1]);

                // Get Request Method
                $this->method = strtolower($_SERVER['REQUEST_METHOD']);
                // Apabila method tidak ada, langsung matikan
                if (!method_exists($this->controller, $this->method)) {
                    http_response_code(HTTPCodeDefenition::HTTP_METHOD_NOT_ALLOWED);
                    die(json_encode([
                        'status' => 'NO',
                        'error' => [
                            'code' => HTTPCodeDefenition::HTTP_METHOD_NOT_ALLOWED,
                            'message' => 'Method not allowed'
                        ]
                    ]));
                }

                // Get param
                if (!empty($url)) {
                    $this->params = array_values($url);
                }

                // jalankan controller & method, serta kirimkan params jika ada        
                call_user_func_array([$this->controller, $this->method], $this->params);
            }

            // var_dump($url);
        }
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
