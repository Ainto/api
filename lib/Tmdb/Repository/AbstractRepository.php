<?php
/**
 * This file is part of the Tmdb PHP API created by Michael Roterman.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package Tmdb
 * @author Michael Roterman <michael@wtfz.net>
 * @copyright (c) 2013, Michael Roterman
 * @version 0.0.1
 */
namespace Tmdb\Repository;

use Tmdb\Api\ApiInterface;
use Tmdb\Client;
use Tmdb\Model\Common\QueryParameter\QueryParameterInterface;

abstract class AbstractRepository {

    private static $client = null;

    protected $api = null;

    /**
     * Constructor
     *
     *
     * @todo create an interface for the client
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        self::$client = $client;
    }

    /**
     * Return the client
     *
     * @return Client
     */
    public function getClient()
    {
        return self::$client;
    }

    /**
     * Process query parameters
     *
     * @param array $parameters
     * @return array
     */
    protected function parseQueryParameters(array $parameters = array())
    {
        foreach($parameters as $key => $candidate) {
            if ($candidate instanceof QueryParameterInterface) {
                unset($parameters[$key]);

                $parameters[$candidate->getKey()] = $candidate->getValue();
            }
        }

        return $parameters;
    }

    /**
     * @todo implement
     * @param array $headers
     * @return array
     */
    protected function parseHeaders(array $headers = array())
    {
        return $headers;
    }

    /**
     * Load the given identifier
     *
     * @param $id
     * @param array $parameters Query parameters to pass to the request
     * @param array $headers Headers to pass to the request
     * @return mixed
     */
    abstract public function load($id, array $parameters = array(), array $headers = array());

    /**
     * Return the API Class
     *
     * @return ApiInterface
     */
    abstract public function getApi();
} 