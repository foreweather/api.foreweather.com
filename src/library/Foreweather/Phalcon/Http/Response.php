<?php

namespace Foreweather\Phalcon\Http;

use Phalcon\Http\Response as PhalconResponse;
use Phalcon\Http\ResponseInterface;

class Response extends PhalconResponse
{
    const OK = 200;
    const CREATED = 201;
    const ACCEPTED = 202;
    const NO_CONTENT = 204;
    const MOVED_PERMANENTLY = 301;
    const FOUND = 302;
    const TEMPORARY_REDIRECT = 307;
    const PERMANENTLY_REDIRECT = 308;
    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const INTERNAL_SERVER_ERROR = 500;
    const NOT_IMPLEMENTED = 501;
    const BAD_GATEWAY = 502;

    private $codes = [
        200 => 'OK',
        204 => 'No Content',
        301 => 'Moved Permanently',
        302 => 'Found',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
    ];

    /**
     * Returns the http code description or if not found the code itself
     *
     * @param int $code
     *
     * @return int|string
     */
    public function getHttpCodeDescription(int $code)
    {
        if (true === isset($this->codes[$code])) {
            return sprintf('%d (%s)', $code, $this->codes[$code]);
        }

        return $code;
    }

    /**
     * Send the response back
     *
     * @return ResponseInterface
     */
    public function send(): ResponseInterface
    {
        $content = $this->getContent();
        $eTag    = sha1($content);

        /** @var array $content */
        $content = json_decode($this->getContent(), true);


        /**
         * Join the array again
         */
        $data = $content;
        $this
            ->setHeader('E-Tag', $eTag)
            ->setJsonContent($data);

        return parent::send();
    }

    /**
     * Sets the payload code as Error
     *
     * @param string $detail
     *
     * @return Response
     */
    public function setPayloadError(string $detail = ''): Response
    {
        $this->setJsonContent(['errors' => [$detail]]);

        return $this;
    }

    /**
     * Sets the payload code as Success
     *
     * @param null|string|array $content The content
     *
     * @return Response
     */
    public function success(array $content = []): Response
    {
        $data = (true === is_array($content)) ? $content : [$content];
        $this->setStatusCode(self::OK);
        $this->setJsonContent($data);

        return $this;
    }

    /**
     * Sets the payload code as Success
     *
     * @param null|string|array $content The content
     *
     * @return Response
     */
    public function accepted(array $content = []): Response
    {
        $data = (true === is_array($content)) ? $content : [$content];
        $this->setStatusCode(self::ACCEPTED);
        $this->setJsonContent($data);

        return $this;
    }

    /**
     * Sets the payload code as Success
     *
     * @param null|string|array $content The content
     *
     * @return Response
     */
    public function successCreated(array $content = []): Response
    {
        $data = (true === is_array($content)) ? $content : [$content];
        $this->setStatusCode(self::CREATED);
        $this->setJsonContent($data);

        return $this;
    }

    /**
     * Sets the payload code as Success
     *
     * @return Response
     */
    public function successNoContent(): Response
    {
        $this->setStatusCode(self::NO_CONTENT);

        return $this;
    }

    /**
     * @param string|null $message
     * @param string|null $code
     * @param string|null $help
     *
     * @return Response
     */
    public function notFound($message = null, string $code = null, string $help = null): Response
    {
        $this->setStatusCode(self::NOT_FOUND);
        $this->setJsonContent(
            $this->err(
                $this->codes[self::NOT_FOUND],
                $message,
                $code,
                $help
            )
        );

        return $this;
    }

    /**
     * @param string|null $message
     * @param string|null $code
     * @param string|null $help
     *
     * @return Response
     */
    public function badRequest($message = null, string $code = null, string $help = null): Response
    {
        $this->setStatusCode(self::BAD_REQUEST);
        $this->setJsonContent(
            $this->err(
                $this->codes[self::BAD_REQUEST],
                $message,
                $code ?? self::BAD_REQUEST,
                $help
            )
        );

        return $this;
    }

    /**
     * @param string|null $message
     * @param string|null $code
     * @param string|null $help
     *
     * @return Response
     */
    public function unAuthorized($message = null, string $code = null, string $help = null): Response
    {
        $this->setStatusCode(self::UNAUTHORIZED);
        $this->setJsonContent(
            $this->err(
                $this->codes[self::UNAUTHORIZED],
                $message,
                $code ?? self::UNAUTHORIZED,
                $help
            )
        );

        return $this;
    }

    private function err(string $error = null, $message = null, string $code = null, string $help = null): array
    {
        return array_merge_recursive(
            $code ? ['code' => $code] : [],
            [
                'message' => $error,
            ],
            $message ? ['detail' => $message] : [],
            $help ? ['documentation' => $help] : [],
        );
    }
}
