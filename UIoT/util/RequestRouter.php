<?php

namespace UIoT\util;
use UIoT\control\ResourceController;
use UIoT\model\Request;

/**
 * Class RequestRouter
 *
 * @package UIoT\util
 * @property ResourceController $resourceController
 */
class RequestRouter
{
    /**
     * @var ResourceController
     */
    var $resourceController;

    /**
     * RequestRouter constructor.
     */
    public function __construct()
    {
        self::createResourceController();
    }

    /**
     * Creates a new ResourceController object | @see ResourceController.php
     */
    private function createResourceController()
    {
        $this->resourceController = new ResourceController();
    }

    /**
     * Executes the received Request | @see Request.php
     *
     * @param Request $request
     * @return array|bool|string
     */
    public function submitRequest(Request $request)
    {
        return self::getResourceController()->executeRequest($request);
    }

    /**
     * Returns the resource controller attribute | @see $resourceController
     *
     * @return mixed
     */
    private function getResourceController()
    {
        return $this->resourceController;
    }


}