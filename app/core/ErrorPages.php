<?php

defined("BASEPATH") or die("Direct scripting is not allowed.");


class ErrorPages
{
  public function notfound()
  {
    if (!isset($_SESSION["redirect_code"])) die("Direct scripting is not allowed.");
    if (
      isset($_SESSION["redirect_code"])
    )
      if ($_SESSION["redirect_code"] !== NOT_FOUND_ERROR)
        die("Direct scripting is not allowed.");
    echo "Not Found";
  }
  public function forbidden()
  {
    if (!isset($_SESSION["redirect_code"])) die("Direct scripting is not allowed.");
    if (
      isset($_SESSION["redirect_code"])
    )
      if ($_SESSION["redirect_code"] !== FORBIDDEN_ERROR)
        die("Direct scripting is not allowed.");
    echo "Forbidden";
  }
  public function badrequest()
  {
    if (!isset($_SESSION["redirect_code"])) die("Direct scripting is not allowed.");
    if (
      isset($_SESSION["redirect_code"])
    )
      if ($_SESSION["redirect_code"] !== BAD_REQUEST_ERROR)
        die("Direct scripting is not allowed.");
    echo "Bad Request";
  }
  public function timeout()
  {
    if (!isset($_SESSION["redirect_code"])) die("Direct scripting is not allowed.");
    if (
      isset($_SESSION["redirect_code"])
    )
      if ($_SESSION["redirect_code"] !== TIMEOUT_ERROR)
        die("Direct scripting is not allowed.");


    echo "Request Timeout";
  }
  public function unauthorized()
  {
    if (!isset($_SESSION["redirect_code"])) die("Direct scripting is not allowed.");
    if (
      isset($_SESSION["redirect_code"])
    )
      if ($_SESSION["redirect_code"] !== UNAUTHORIZED_ERROR)
        die("Direct scripting is not allowed.");
    echo "Your access is unauthorized";
  }
  public function internalerr()
  {
    if (!isset($_SESSION["redirect_code"])) die("Direct scripting is not allowed.");
    if (
      isset($_SESSION["redirect_code"])
    )
      if ($_SESSION["redirect_code"] !== INTERNAL_ERROR)
        die("Direct scripting is not allowed.");
    echo "Server Internal Error";
  }
  public function badgateway()
  {
    if (!isset($_SESSION["redirect_code"])) die("Direct scripting is not allowed.");
    if (
      isset($_SESSION["redirect_code"])
    )
      if ($_SESSION["redirect_code"] !== BAD_GATEWAY_ERROR)
        die("Direct scripting is not allowed.");
    echo "Bad Gateway Request";
  }
  public function unvailable()
  {
    if (!isset($_SESSION["redirect_code"])) die("Direct scripting is not allowed.");
    if (
      isset($_SESSION["redirect_code"])
    )
      if ($_SESSION["redirect_code"] !== UNVAILABLE_ERROR)
        die("Direct scripting is not allowed.");
    echo "Service is Unvailable right now";
  }
}
