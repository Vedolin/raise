<?php

namespace UIoT\callbacks;

use UIoT\messages\InvalidTokenMessage;
use UIoT\model\CallBack;
use UIoT\model\UIoTRequest;
use UIoT\util\MessageHandler;
use UIoT\util\RequestInput;

/**
 * Class ExecuteDeleteCallBack
 * @package UIoT\callbacks
 */
class ExecuteDeleteCallBack extends CallBack
{
    /**
     * ExecuteDeleteCallBack constructor.
     *
     * @param UIoTRequest $request
     */
    public function __construct($request)
    {
        if (!$request->query->has('token')) {
            $this->callBackResult = MessageHandler::getInstance()->getResult(new InvalidTokenMessage);
        } elseif (RequestInput::getTokenManager()->validateCode($request->query->get('token'))) {
            RequestInput::getTokenManager()->updateTokenExpire($request->query->get('token'));
            $this->callBackResult = RequestInput::getRequest()->executeRequest();
        } else {
            $this->callBackResult = MessageHandler::getInstance()->getResult(new InvalidTokenMessage);
        }
    }
}