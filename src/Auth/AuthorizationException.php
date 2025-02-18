<?php namespace Laralips\Storm\Auth;

use Laralips\Storm\Exception\ApplicationException;

/**
 * Used when user authorization fails. Implements a softer error message.
 *
 * @author Luke Towers
 */
class AuthorizationException extends ApplicationException
{

}
