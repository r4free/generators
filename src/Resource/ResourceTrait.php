<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 25/11/2018
 * Time: 17:03
 */

namespace Generators\Resource;


trait ResourceTrait
{

    /**
     * Response for errors
     *
     * @param string $message
     * @param string $errorCode
     * @param array  $headers
     * @return mixed
     */
    public function withError($message, $errorCode, array $headers = [])
    {
        return $this->withArray([
            'error' => [
                'code' => $errorCode,
                'http_code' => $this->statusCode,
                'message' => $message
            ]
        ],
            $headers
        );
    }

    /**
     * Generates a response with a 403 HTTP header and a given message.
     *
     * @param string $message
     * @param array  $headers
     * @return mixed
     */
    public function errorForbidden($message = 'Forbidden',array $headers = [])
    {
        return $this->response()->setStatusCode(403,$message)->withHeaders($headers);
    }

    /**
     * Generates a response with a 500 HTTP header and a given message.
     *
     * @param string $message
     * @param array  $headers
     * @return mixed
     */
    public function errorInternalError($message = 'Internal Error', array $headers = [])
    {
        return $this->setStatusCode(500)->withError($message, static::CODE_INTERNAL_ERROR, $headers);
    }
    /**
     * Generates a response with a 404 HTTP header and a given message.
     *
     * @param string $message
     * @param array  $headers
     * @return mixed
     */
    public function errorNotFound($message = 'Resource Not Found', array $headers = [])
    {
        return $this->setStatusCode(404)->withError($message, static::CODE_NOT_FOUND, $headers);
    }
    /**
     * Generates a response with a 401 HTTP header and a given message.
     *
     * @param string $message
     * @param array  $headers
     * @return mixed
     */
    public function errorUnauthorized($message = 'Unauthorized', array $headers = [])
    {
        return $this->setStatusCode(401)->withError($message, static::CODE_UNAUTHORIZED, $headers);
    }
    /**
     * Generates a response with a 400 HTTP header and a given message.
     *
     * @param string $message
     * @param array  $headers
     * @return mixed
     */
    public function errorWrongArgs($message = 'Wrong Arguments', array $headers = [])
    {
        return $this->setStatusCode(400)->withError($message, static::CODE_WRONG_ARGS, $headers);
    }
    /**
     * Generates a response with a 410 HTTP header and a given message.
     *
     * @param string $message
     * @param array  $headers
     * @return mixed
     */
    public function errorGone($message = 'Resource No Longer Available', array $headers = [])
    {
        return $this->setStatusCode(410)->withError($message, static::CODE_GONE, $headers);
    }
    /**
     * Generates a response with a 405 HTTP header and a given message.
     *
     * @param string $message
     * @param array  $headers
     * @return mixed
     */
    public function errorMethodNotAllowed($message = 'Method Not Allowed', array $headers = [])
    {
        return $this->setStatusCode(405)->withError($message, static::CODE_METHOD_NOT_ALLOWED, $headers);
    }
    /**
     * Generates a Response with a 431 HTTP header and a given message.
     *
     * @param string $message
     * @param array  $headers
     * @return mixed
     */
    public function errorUnwillingToProcess($message = 'Server is unwilling to process the request', array $headers = [])
    {
        return $this->setStatusCode(431)->withError($message, static::CODE_UNWILLING_TO_PROCESS, $headers);
    }

    /**
     * Generates a Response with a 422 HTTP header and a given message.
     *
     * @param string $message
     * @param array  $headers
     * @return mixed
     */
    public function errorUnprocessable($message = 'Unprocessable Entity', array $headers = [])
    {
        return $this->setStatusCode(422)->withError($message, static::CODE_UNPROCESSABLE, $headers);
    }
}
