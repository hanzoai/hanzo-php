<?php

namespace Hanzo;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client as HttpClient;

const TEMPLATE_REGEXP = '/\{([^\{\}]+)\}/';

/**
* @param  string $string
* @param  mixed $interpolate
* @param  mixed $defaults
* @return string
*/
function template($string, $interpolate = [], $defaults = []) {
    $defaults = !is_null($defaults) ? $defaults : [];
    $interpolate = !is_null($interpolate) ? $interpolate : [];

    return preg_replace_callback(TEMPLATE_REGEXP, function ($matches) use ($defaults, $interpolate) {
        $key = $matches[1];
        if (isset($interpolate[$key]) && $interpolate[$key] != null) {
            return urlencode($interpolate[$key]);
        }

        if (isset($defaults[$key]) && $defaults[$key] != null) {
            return urlencode($defaults[$key]);
        }

        return '';
    }, $string);
}

class Parameter
{
    protected $key;
    protected $value;

    public function __construct($key, $value = null)
    {
        if (empty($key)) {
            throw new \InvalidArgumentException('no key given');
        }
        $this->key = $key;
        $this->value = $value;
    }

    public function getId()
    {
        return $this->key;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function __toString()
    {
        $value = $this->getValue();
        if (is_null($value)) {
            $paramStr = $this->key;
        } elseif (is_bool($value)) {
            $paramStr = $this->key . '=' . ($value ? 'true' : 'false');
        } else {
            $paramStr = $this->key . '=' . urlencode((string)$value);
        }

        return $paramStr;
    }
}

class MultiParameter extends Parameter
{
    public function getId()
    {
        return $this->__toString();
    }
}

class Resource
{
    protected $client;
    protected $uri;

    public function __construct($uri, Client $client)
    {
        $this->uri = $uri;
        $this->client = $client;
    }
}

class Resource0 extends Resource
{
    public $store;
    public $site;
    public $user;
    public $variant;
    public $product;
    public $transaction;
    public $referrer;
    public $referral;
    public $order;
    public $form;
    public $collection;
    public $coupon;
    public $checkout;

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


        $this->store = new Resource1($this->uri . '/store', $client);

        $this->site = new Resource7($this->uri . '/site', $client);

        $this->user = new Resource9($this->uri . '/user', $client);

        $this->variant = new Resource11($this->uri . '/variant', $client);

        $this->product = new Resource13($this->uri . '/product', $client);

        $this->transaction = new Resource15($this->uri . '/transaction', $client);

        $this->referrer = new Resource17($this->uri . '/referrer', $client);

        $this->referral = new Resource19($this->uri . '/referral', $client);

        $this->order = new Resource21($this->uri . '/order', $client);

        $this->form = new Resource25($this->uri . '/form', $client);

        $this->collection = new Resource28($this->uri . '/collection', $client);

        $this->coupon = new Resource30($this->uri . '/coupon', $client);

        $this->checkout = new Resource32($this->uri . '/checkout', $client);
    }


}
class Resource1 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


    }

    public function id($id)
    {
        $uri = $this->uri . template('/{0}', [$id]);

        return new Resource2($uri, $this->client);
    }

}
class Resource2 extends Resource
{
    public $variant;
    public $product;

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


        $this->variant = new Resource3($this->uri . '/variant', $client);

        $this->product = new Resource5($this->uri . '/product', $client);
    }


    public function get($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'GET', $body, $options);
    }
}
class Resource3 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


    }

    public function key($key)
    {
        $uri = $this->uri . template('/{0}', [$key]);

        return new Resource4($uri, $this->client);
    }

}
class Resource4 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);

    }


    public function patch($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PATCH', $body, $options);
    }
    public function delete($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'DELETE', $body, $options);
    }
    public function put($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PUT', $body, $options);
    }
    public function get($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'GET', $body, $options);
    }
}
class Resource5 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


    }

    public function key($key)
    {
        $uri = $this->uri . template('/{0}', [$key]);

        return new Resource6($uri, $this->client);
    }

}
class Resource6 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);

    }


    public function get($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'GET', $body, $options);
    }
}
class Resource7 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


    }

    public function id($id)
    {
        $uri = $this->uri . template('/{0}', [$id]);

        return new Resource8($uri, $this->client);
    }

    public function post($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'POST', $body, $options);
    }
    public function get($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'GET', $body, $options);
    }
}
class Resource8 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);

    }


    public function delete($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'DELETE', $body, $options);
    }
    public function put($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PUT', $body, $options);
    }
    public function get($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'GET', $body, $options);
    }
}
class Resource9 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


    }

    public function id($id)
    {
        $uri = $this->uri . template('/{0}', [$id]);

        return new Resource10($uri, $this->client);
    }

}
class Resource10 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);

    }


    public function patch($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PATCH', $body, $options);
    }
    public function delete($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'DELETE', $body, $options);
    }
    public function post($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'POST', $body, $options);
    }
    public function put($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PUT', $body, $options);
    }
    public function get($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'GET', $body, $options);
    }
}
class Resource11 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


    }

    public function id($id)
    {
        $uri = $this->uri . template('/{0}', [$id]);

        return new Resource12($uri, $this->client);
    }

}
class Resource12 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);

    }


    public function patch($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PATCH', $body, $options);
    }
    public function delete($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'DELETE', $body, $options);
    }
    public function post($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'POST', $body, $options);
    }
    public function put($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PUT', $body, $options);
    }
    public function get($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'GET', $body, $options);
    }
}
class Resource13 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


    }

    public function id($id)
    {
        $uri = $this->uri . template('/{0}', [$id]);

        return new Resource14($uri, $this->client);
    }

}
class Resource14 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);

    }


    public function patch($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PATCH', $body, $options);
    }
    public function delete($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'DELETE', $body, $options);
    }
    public function post($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'POST', $body, $options);
    }
    public function put($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PUT', $body, $options);
    }
    public function get($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'GET', $body, $options);
    }
}
class Resource15 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


    }

    public function id($id)
    {
        $uri = $this->uri . template('/{0}', [$id]);

        return new Resource16($uri, $this->client);
    }

}
class Resource16 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);

    }


    public function get($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'GET', $body, $options);
    }
}
class Resource17 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


    }

    public function id($id)
    {
        $uri = $this->uri . template('/{0}', [$id]);

        return new Resource18($uri, $this->client);
    }

}
class Resource18 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);

    }


    public function patch($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PATCH', $body, $options);
    }
    public function delete($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'DELETE', $body, $options);
    }
    public function post($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'POST', $body, $options);
    }
    public function put($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PUT', $body, $options);
    }
    public function get($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'GET', $body, $options);
    }
}
class Resource19 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


    }

    public function id($id)
    {
        $uri = $this->uri . template('/{0}', [$id]);

        return new Resource20($uri, $this->client);
    }

}
class Resource20 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);

    }


    public function patch($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PATCH', $body, $options);
    }
    public function delete($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'DELETE', $body, $options);
    }
    public function post($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'POST', $body, $options);
    }
    public function put($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PUT', $body, $options);
    }
    public function get($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'GET', $body, $options);
    }
}
class Resource21 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


    }

    public function id($id)
    {
        $uri = $this->uri . template('/{0}', [$id]);

        return new Resource22($uri, $this->client);
    }

}
class Resource22 extends Resource
{
    public $payments;
    public $capture;

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


        $this->payments = new Resource23($this->uri . '/payments', $client);

        $this->capture = new Resource24($this->uri . '/capture', $client);
    }


    public function patch($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PATCH', $body, $options);
    }
    public function delete($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'DELETE', $body, $options);
    }
    public function post($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'POST', $body, $options);
    }
    public function put($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PUT', $body, $options);
    }
    public function get($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'GET', $body, $options);
    }
}
class Resource23 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);

    }


    public function get($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'GET', $body, $options);
    }
}
class Resource24 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);

    }


    public function post($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'POST', $body, $options);
    }
}
class Resource25 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


    }

    public function id($id)
    {
        $uri = $this->uri . template('/{0}', [$id]);

        return new Resource26($uri, $this->client);
    }

}
class Resource26 extends Resource
{
    public $submit;

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


        $this->submit = new Resource27($this->uri . '/submit', $client);
    }


    public function patch($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PATCH', $body, $options);
    }
    public function delete($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'DELETE', $body, $options);
    }
    public function post($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'POST', $body, $options);
    }
    public function put($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PUT', $body, $options);
    }
    public function get($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'GET', $body, $options);
    }
}
class Resource27 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);

    }


    public function post($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'POST', $body, $options);
    }
}
class Resource28 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


    }

    public function id($id)
    {
        $uri = $this->uri . template('/{0}', [$id]);

        return new Resource29($uri, $this->client);
    }

}
class Resource29 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);

    }


    public function patch($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PATCH', $body, $options);
    }
    public function delete($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'DELETE', $body, $options);
    }
    public function post($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'POST', $body, $options);
    }
    public function put($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PUT', $body, $options);
    }
    public function get($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'GET', $body, $options);
    }
}
class Resource30 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


    }

    public function id($id)
    {
        $uri = $this->uri . template('/{0}', [$id]);

        return new Resource31($uri, $this->client);
    }

}
class Resource31 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);

    }


    public function patch($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PATCH', $body, $options);
    }
    public function delete($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'DELETE', $body, $options);
    }
    public function post($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'POST', $body, $options);
    }
    public function put($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PUT', $body, $options);
    }
    public function get($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'GET', $body, $options);
    }
}
class Resource32 extends Resource
{
    public $authorize;
    public $charge;

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);


        $this->authorize = new Resource33($this->uri . '/authorize', $client);

        $this->charge = new Resource34($this->uri . '/charge', $client);
    }


}
class Resource33 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);

    }


    public function post($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'POST', $body, $options);
    }
}
class Resource34 extends Resource
{

    public function __construct($uri, $client)
    {
        parent::__construct($uri, $client);

    }


    public function post($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'POST', $body, $options);
    }
}

class CustomResource extends Resource
{
    public function acl($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'ACL', $body, $options);
    }
    public function bind($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'BIND', $body, $options);
    }
    public function checkout($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'CHECKOUT', $body, $options);
    }
    public function connect($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'CONNECT', $body, $options);
    }
    public function copy($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'COPY', $body, $options);
    }
    public function delete($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'DELETE', $body, $options);
    }
    public function get($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'GET', $body, $options);
    }
    public function head($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'HEAD', $body, $options);
    }
    public function link($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'LINK', $body, $options);
    }
    public function lock($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'LOCK', $body, $options);
    }
    public function mSearch($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'M-SEARCH', $body, $options);
    }
    public function merge($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'MERGE', $body, $options);
    }
    public function mkactivity($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'MKACTIVITY', $body, $options);
    }
    public function mkcalendar($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'MKCALENDAR', $body, $options);
    }
    public function mkcol($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'MKCOL', $body, $options);
    }
    public function move($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'MOVE', $body, $options);
    }
    public function notify($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'NOTIFY', $body, $options);
    }
    public function options($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'OPTIONS', $body, $options);
    }
    public function patch($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PATCH', $body, $options);
    }
    public function post($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'POST', $body, $options);
    }
    public function propfind($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PROPFIND', $body, $options);
    }
    public function proppatch($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PROPPATCH', $body, $options);
    }
    public function purge($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PURGE', $body, $options);
    }
    public function put($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'PUT', $body, $options);
    }
    public function rebind($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'REBIND', $body, $options);
    }
    public function report($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'REPORT', $body, $options);
    }
    public function search($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'SEARCH', $body, $options);
    }
    public function subscribe($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'SUBSCRIBE', $body, $options);
    }
    public function trace($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'TRACE', $body, $options);
    }
    public function unbind($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'UNBIND', $body, $options);
    }
    public function unlink($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'UNLINK', $body, $options);
    }
    public function unlock($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'UNLOCK', $body, $options);
    }
    public function unsubscribe($body = null, $options = [])
    {
        return $this->client->request($this->uri, 'UNSUBSCRIBE', $body, $options);
    }
}

class Client
{
    private $httpClient;

    private $options;

    public $resources;

    public $resource;

    public function __construct($options = [])
    {
        $baseUriParameters = [];
        if (isset($options['baseUriParameters'])) {
            $baseUriParameters = $options['baseUriParameters'];
            unset($options['baseUriParameters']);
        }
        if (isset($options['baseUri'])) {
            $options['base_uri'] = template($options['baseUri'], $baseUriParameters);
            unset($options['baseUri']);
        } else {
            $options['base_uri'] = template('https://api.hanzo.io', []);
        }
        $this->options = $options;
        $this->httpClient = new HttpClient($this->options);
        $this->resources = new Resource0('.', $this);
    }

    protected function buildRequest($path, $method, $body = null, $options = [])
    {
        $options = array_merge($this->options, $options);
        $hasBody = $method !== 'GET' && $method !== 'HEAD';

        $reqQuery = [];
        if (isset($options['query'])) {
            $reqQuery = $options['query'];
            unset($options['query']);
        }
        $headers = isset($options['headers']) ? $options['headers'] : [];

        $request = new Request($method, $path, $headers);

        if ($hasBody && !is_null($body)) {
            $request = $request->withBody($body);
        }
        if (!$hasBody && !is_null($body)) {
            $reqQuery = array_merge($reqQuery, $body);
        }
        if (count($reqQuery) > 0) {
            $params = [];
            foreach ($reqQuery as $key => $value) {
                if (!is_array($value)) {
                    $param = new Parameter($key, $value);
                    $params[$param->getId()] = $param;
                } else {
                    foreach ($value as $data) {
                        $param = new MultiParameter($key, $data);
                        $params[$param->getId()] = $param;
                    }
                }
            }
            $params = array_map(
                function ($param) {
                    return (string)$param;
                },
                $params
            );
            sort($params);
            $query = implode('&', $params);
            $uri = $request->getUri()->withQuery($query);
            $request = $request->withUri($uri);
        }

        return $request;
    }

    public function request($path, $method, $body = null, $options = [])
    {
        return $this->send($this->buildRequest($path, $method, $body, $options));
    }

    public function resource($route, $parameters)
    {
        $path = '/' . ltrim(template($route, $parameters),'/');

        return new CustomResource($path, $this);
    }

    protected function send(Request $request)
    {
        return $this->getHttpClient()->send($request);
    }

    public function getHttpClient()
    {
        return $this->httpClient;
    }
}
