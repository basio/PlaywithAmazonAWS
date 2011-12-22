<?php
/** 
 *  PHP Version 5
 *
 *  @category    Amazon
 *  @package     FBAInventoryServiceMWS
 *  @copyright   Copyright 2009 Amazon.com, Inc. All Rights Reserved.
 *  @link        http://mws.amazon.com
 *  @license     http://aws.amazon.com/apache2.0  Apache License, Version 2.0
 *  @version     2010-10-01
 */
/******************************************************************************* 
 * 
 *  FBA Inventory Service MWS PHP5 Library
 *  Generated: Thu Oct 28 11:07:38 UTC 2010
 * 
 */

/**
 *  @see FBAInventoryServiceMWS_Interface
 */
require_once ('FBAInventoryServiceMWS/Interface.php');

/**
 * The inventory service allows sellers to stay up to date on the
 * status of inventory in Amazon’s fulfillment centers.
 * Check Inventory Status: Sellers can discover when inventory
 * items change status and get the current availability status to
 * keep product listing information up to date
 * 
 * FBAInventoryServiceMWS_Client is an implementation of FBAInventoryServiceMWS
 *
 */
class FBAInventoryServiceMWS_Client implements FBAInventoryServiceMWS_Interface
{

    /** @var string */
    private  $_awsAccessKeyId = null;

    /** @var string */
    private  $_awsSecretAccessKey = null;

    /** @var array */
    private  $_config = array ('ServiceURL' => 'http://localhost:8000/',
                               'UserAgent' => 'FBAInventoryServiceMWS PHP5 Library',
                               'SignatureVersion' => 2,
                               'SignatureMethod' => 'HmacSHA256',
                               'ProxyHost' => null,
                               'ProxyPort' => -1,
                               'MaxErrorRetry' => 3
                               );

    private $_serviceVersion = null;

    const REQUEST_TYPE = "POST";

    const MWS_CLIENT_VERSION = "2010-10-01";

    /**
     * Construct new Client
     *
     * @param string $awsAccessKeyId AWS Access Key ID
     * @param string $awsSecretAccessKey AWS Secret Access Key
     * @param array $config configuration options.
     * @param array $attributes user-agent attributes
     * Valid configuration options are:
     * <ul>
     * <li>ServiceURL</li>
     * <li>UserAgent</li>
     * <li>SignatureVersion</li>
     * <li>TimesRetryOnError</li>
     * <li>ProxyHost</li>
     * <li>ProxyPort</li>
     * <li>MaxErrorRetry</li>
     * </ul>
     */

    public function __construct(
    $awsAccessKeyId, $awsSecretAccessKey, $config, $applicationName, $applicationVersion, $attributes = null)
    {
        iconv_set_encoding('output_encoding', 'UTF-8');
        iconv_set_encoding('input_encoding', 'UTF-8');
        iconv_set_encoding('internal_encoding', 'UTF-8');

        $this->_awsAccessKeyId = $awsAccessKeyId;
        $this->_awsSecretAccessKey = $awsSecretAccessKey;
        $this->_serviceVersion = $applicationVersion;
        if (!is_null($config)) $this->_config = array_merge($this->_config, $config);
        $this->setUserAgentHeader($applicationName, $applicationVersion, $attributes);
    }

  /**
   * Sets a MWS compliant HTTP User-Agent Header value.
   * $attributeNameValuePairs is an associative array.
   *
   * @param $applicationName
   * @param $applicationVersion
   * @param $attributes
   * @return unknown_type
   */
  public function setUserAgentHeader(
      $applicationName,
      $applicationVersion,
      $attributes = null) {

    if (is_null($attributes)) {
      $attributes = array ();
    }

    $this->_config['UserAgent'] =
        $this->constructUserAgentHeader($applicationName, $applicationVersion, $attributes);
  }

  /**
   * Construct a valid MWS compliant HTTP User-Agent Header. From the MWS Developer's Guide, this
   * entails:
   * "To meet the requirements, begin with the name of your application, followed by a forward
   * slash, followed by the version of the application, followed by a space, an opening
   * parenthesis, the Language name value pair, and a closing paranthesis. The Language parameter
   * is a required attribute, but you can add additional attributes separated by semi-colons."
   *
   * @param $applicationName
   * @param $applicationVersion
   * @param $additionalNameValuePairs
   * @return unknown_type
   */
  private function constructUserAgentHeader($applicationName, $applicationVersion, $attributes = null) {

    if (is_null($applicationName) || $applicationName === "") {
      throw new InvalidArguementException('$applicationName cannot be null.');
    }
     
    if (is_null($applicationVersion) || $applicationVersion === "") {
      throw new InvalidArguementException('$applicationVersion cannot be null.');
    }
     
    $userAgent =
    $this->quoteApplicationName($applicationName)
        . '/'
        . $this->quoteApplicationVersion($applicationVersion);

    $userAgent .= ' (';

    $userAgent .= 'Language=PHP/' . phpversion();
    $userAgent .= '; ';
    $userAgent .= 'Platform=' . php_uname('s') . '/' . php_uname('m') . '/' . php_uname('r');
    $userAgent .= '; ';
    $userAgent .= 'MWSClientVersion=' . self::MWS_CLIENT_VERSION;

    foreach ($attributes as $key => $value) {
      if (is_null($value) || $value === '') {
        throw new InvalidArgumentException("Value for $key cannot be null or empty.");
      }
        
      $userAgent .= '; '
        . $this->quoteAttributeName($key)
        . '='
        . $this->quoteAttributeValue($value);
    }
    $userAgent .= ')';

    return $userAgent;
  }

  /**
   * Collapse multiple whitespace characters into a single ' ' character.
   * @param $s
   * @return string
   */
  private function collapseWhitespace($s) {
    return preg_replace('/ {2,}|\s/', ' ', $s);
  }

  /**
   * Collapse multiple whitespace characters into a single ' ' and backslash escape '\',
   * and '/' characters from a string.
   * @param $s
   * @return string
   */
  private function quoteApplicationName($s) {
    $quotedString = $this->collapseWhitespace($s);
    $quotedString = preg_replace('/\\\\/', '\\\\\\\\', $quotedString);
    $quotedString = preg_replace('/\//', '\\/', $quotedString);

    return $quotedString;
  }

  /**
   * Collapse multiple whitespace characters into a single ' ' and backslash escape '\',
   * and '(' characters from a string.
   *
   * @param $s
   * @return string
   */
  private function quoteApplicationVersion($s) {
    $quotedString = $this->collapseWhitespace($s);
    $quotedString = preg_replace('/\\\\/', '\\\\\\\\', $quotedString);
    $quotedString = preg_replace('/\\(/', '\\(', $quotedString);

    return $quotedString;
  }

  /**
   * Collapse multiple whitespace characters into a single ' ' and backslash escape '\',
   * and '=' characters from a string.
   *
   * @param $s
   * @return unknown_type
   */
  private function quoteAttributeName($s) {
    $quotedString = $this->collapseWhitespace($s);
    $quotedString = preg_replace('/\\\\/', '\\\\\\\\', $quotedString);
    $quotedString = preg_replace('/\\=/', '\\=', $quotedString);

    return $quotedString;
  }

  /**
   * Collapse multiple whitespace characters into a single ' ' and backslash escape ';', '\',
   * and ')' characters from a string.
   *
   * @param $s
   * @return unknown_type
   */
  private function quoteAttributeValue($s) {
    $quotedString = $this->collapseWhitespace($s);
    $quotedString = preg_replace('/\\\\/', '\\\\\\\\', $quotedString);
    $quotedString = preg_replace('/\\;/', '\\;', $quotedString);
    $quotedString = preg_replace('/\\)/', '\\)', $quotedString);

    return $quotedString;
    }

    // Public API ------------------------------------------------------------//


            
    /**
     * List Inventory Supply By Next Token 
     * Continues pagination over a resultset of inventory data for inventory
     * items.
     * 
     * This operation is used in conjunction with ListUpdatedInventorySupply.
     * Please refer to documentation for that operation for further details.
     * 
     * @param mixed $request array of parameters for FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenRequest request
     * or FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenRequest object itself
     * @see FBAInventoryServiceMWS_Model_ListInventorySupplyByNextToken
     * @return FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResponse FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResponse
     *
     * @throws FBAInventoryServiceMWS_Exception
     */
    public function listInventorySupplyByNextToken($request)
    {
        if (!$request instanceof FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenRequest) {
            require_once ('FBAInventoryServiceMWS/Model/ListInventorySupplyByNextTokenRequest.php');
            $request = new FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenRequest($request);
        }
        require_once ('FBAInventoryServiceMWS/Model/ListInventorySupplyByNextTokenResponse.php');
        return FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResponse::fromXML($this->_invoke($this->_convertListInventorySupplyByNextToken($request)));
    }


            
    /**
     * List Inventory Supply 
     * Get information about the supply of seller-owned inventory in
     * Amazon's fulfillment network. "Supply" is inventory that is available
     * for fulfilling (a.k.a. Multi-Channel Fulfillment) orders. In general
     * this includes all sellable inventory that has been received by Amazon,
     * that is not reserved for existing orders or for internal FC processes,
     * and also inventory expected to be received from inbound shipments.
     * This operation provides 2 typical usages by setting different
     * ListInventorySupplyRequest value:
     * 
     * 1. Set value to SellerSkus and not set value to QueryStartDateTime,
     * this operation will return all sellable inventory that has been received
     * by Amazon's fulfillment network for these SellerSkus.
     * 2. Not set value to SellerSkus and set value to QueryStartDateTime,
     * This operation will return information about the supply of all seller-owned
     * inventory in Amazon's fulfillment network, for inventory items that may have had
     * recent changes in inventory levels. It provides the most efficient mechanism
     * for clients to maintain local copies of inventory supply data.
     * Only 1 of these 2 parameters (SellerSkus and QueryStartDateTime) can be set value for 1 request.
     * If both with values or neither with values, an exception will be thrown.
     * This operation is used with ListInventorySupplyByNextToken
     * to paginate over the resultset. Begin pagination by invoking the
     * ListInventorySupply operation, and retrieve the first set of
     * results. If more results are available,continuing iteratively requesting further
     * pages results by invoking the ListInventorySupplyByNextToken operation (each time
     * passing in the NextToken value from the previous result), until the returned NextToken
     * is null, indicating no further results are available.
     * 
     * @param mixed $request array of parameters for FBAInventoryServiceMWS_Model_ListInventorySupplyRequest request
     * or FBAInventoryServiceMWS_Model_ListInventorySupplyRequest object itself
     * @see FBAInventoryServiceMWS_Model_ListInventorySupply
     * @return FBAInventoryServiceMWS_Model_ListInventorySupplyResponse FBAInventoryServiceMWS_Model_ListInventorySupplyResponse
     *
     * @throws FBAInventoryServiceMWS_Exception
     */
    public function listInventorySupply($request)
    {
        if (!$request instanceof FBAInventoryServiceMWS_Model_ListInventorySupplyRequest) {
            require_once ('FBAInventoryServiceMWS/Model/ListInventorySupplyRequest.php');
            $request = new FBAInventoryServiceMWS_Model_ListInventorySupplyRequest($request);
        }
        require_once ('FBAInventoryServiceMWS/Model/ListInventorySupplyResponse.php');
        return FBAInventoryServiceMWS_Model_ListInventorySupplyResponse::fromXML($this->_invoke($this->_convertListInventorySupply($request)));
    }


            
    /**
     * Get Service Status 
     * Gets the status of the service.
     * Status is one of GREEN, RED representing:
     * GREEN: This API section of the service is operating normally.
     * RED: The service is disrupted.
     * 
     * @param mixed $request array of parameters for FBAInventoryServiceMWS_Model_GetServiceStatusRequest request
     * or FBAInventoryServiceMWS_Model_GetServiceStatusRequest object itself
     * @see FBAInventoryServiceMWS_Model_GetServiceStatus
     * @return FBAInventoryServiceMWS_Model_GetServiceStatusResponse FBAInventoryServiceMWS_Model_GetServiceStatusResponse
     *
     * @throws FBAInventoryServiceMWS_Exception
     */
    public function getServiceStatus($request)
    {
        if (!$request instanceof FBAInventoryServiceMWS_Model_GetServiceStatusRequest) {
            require_once ('FBAInventoryServiceMWS/Model/GetServiceStatusRequest.php');
            $request = new FBAInventoryServiceMWS_Model_GetServiceStatusRequest($request);
        }
        require_once ('FBAInventoryServiceMWS/Model/GetServiceStatusResponse.php');
        return FBAInventoryServiceMWS_Model_GetServiceStatusResponse::fromXML($this->_invoke($this->_convertGetServiceStatus($request)));
    }

        // Private API ------------------------------------------------------------//

    /**
     * Invoke request and return response
     */
    private function _invoke(array $parameters)
    {
        $actionName = $parameters["Action"];
        $response = array();
        $responseBody = null;
        $statusCode = 200;

        /* Submit the request and read response body */
        try {

            // Ensure the endpoint URL is set.
            if (empty($this->_config['ServiceURL'])) {
                throw new MarketplaceWebService_Exception(
                    array('ErrorCode' => 'InvalidServiceUrl',
                          'Message' => "Missing serviceUrl configuration value. You may obtain a list of valid MWS URLs by consulting the MWS Developer's Guide, or reviewing the sample code published along side this library."));
            }

            /* Add required request parameters */
            $parameters = $this->_addRequiredParameters($parameters);

            $shouldRetry = false;
            $retries = 0;
            do {
                try {
                        $response = $this->_httpPost($parameters);
                        $httpStatus = $response['Status'];
                        switch ($httpStatus)
                        {
                            case 200:
                                $shouldRetry = false;
                                break;

                            case 500:
                            case 503:
                                require_once('FBAInventoryServiceMWS/Model/ErrorResponse.php');
                                $errorResponse = FBAInventoryServiceMWS_Model_ErrorResponse::fromXML($response['ResponseBody']);

                                // We will not retry throttling errors since this would just add to the throttling problem.
                                $errors = $errorResponse->getError();
                                $shouldRetry = ($errors[0]->getCode() === 'RequestThrottled') ? false : true;

                                if ($shouldRetry && $retries <= $this->config['MaxErrorRetry'])
                                {
                                    $this->_pauseOnRetry(++$retries);
                                }
                                else
                                {
                                    throw $this->_reportAnyErrors($response['ResponseBody'], $response['Status']);
                                }
                                break;

                            default:
                                    $shouldRetry = false;
                                    throw $this->_reportAnyErrors($response['ResponseBody'], $response['Status']);
                                break;
                        }
                /* Rethrow on deserializer error */
                } catch (Exception $e) {
                    require_once ('FBAInventoryServiceMWS/Exception.php');
                    throw new FBAInventoryServiceMWS_Exception(array('Exception' => $e, 'Message' => $e->getMessage()));
                }

            } while ($shouldRetry);

        } catch (FBAInventoryServiceMWS_Exception $se) {
            throw $se;
        } catch (Exception $t) {
            throw new FBAInventoryServiceMWS_Exception(array('Exception' => $t, 'Message' => $t->getMessage()));
        }

        return $response['ResponseBody'];
    }

    /**
     * Look for additional error strings in the response and return formatted exception
     */
    private function _reportAnyErrors($responseBody, $status, Exception $e =  null)
    {
        $ex = null;
        if (!is_null($responseBody) && strpos($responseBody, '<') === 0) {
            if (preg_match('@<RequestId>(.*)</RequestId>.*<Error><Code>(.*)</Code><Message>(.*)</Message></Error>.*(<Error>)?@mi',
                $responseBody, $errorMatcherOne)) {

                $requestId = $errorMatcherOne[1];
                $code = $errorMatcherOne[2];
                $message = $errorMatcherOne[3];

                require_once ('FBAInventoryServiceMWS/Exception.php');
                $ex = new FBAInventoryServiceMWS_Exception(array ('Message' => $message, 'StatusCode' => $status, 'ErrorCode' => $code,
                                                           'ErrorType' => 'Unknown', 'RequestId' => $requestId, 'XML' => $responseBody));

            } elseif (preg_match('@<Error><Code>(.*)</Code><Message>(.*)</Message></Error>.*(<Error>)?.*<RequestID>(.*)</RequestID>@mi',
                $responseBody, $errorMatcherTwo)) {

                $code = $errorMatcherTwo[1];
                $message = $errorMatcherTwo[2];
                $requestId = $errorMatcherTwo[4];
                require_once ('FBAInventoryServiceMWS/Exception.php');
                $ex = new FBAInventoryServiceMWS_Exception(array ('Message' => $message, 'StatusCode' => $status, 'ErrorCode' => $code,
                                                              'ErrorType' => 'Unknown', 'RequestId' => $requestId, 'XML' => $responseBody));
            } elseif (preg_match('@<Error><Type>(.*)</Type><Code>(.*)</Code><Message>(.*)</Message>.*</Error>.*(<Error>)?.*<RequestId>(.*)</RequestId>@mi',
                $responseBody, $errorMatcherThree)) {

                $type = $errorMatcherThree[1];
                $code = $errorMatcherThree[2];
                $message = $errorMatcherThree[3];
                $requestId = $errorMatcherThree[5];
                require_once ('FBAInventoryServiceMWS/Exception.php');
                $ex = new FBAInventoryServiceMWS_Exception(array ('Message' => $message, 'StatusCode' => $status, 'ErrorCode' => $code,
                                                              'ErrorType' => $type, 'RequestId' => $requestId, 'XML' => $responseBody));

            } elseif (preg_match('@<Error>\n.*<Type>(.*)</Type>\n.*<Code>(.*)</Code>\n.*<Message>(.*)</Message>\n.*</Error>\n?.*<RequestId>(.*)</RequestId>\n.*@mi',
                $responseBody, $errorMatcherFour)) {

                $type = $errorMatcherFour[1];
                $code = $errorMatcherFour[2];
                $message = $errorMatcherFour[3];
                $requestId = $errorMatcherFour[4];
                require_once ('FBAInventoryServiceMWS/Exception.php');
                $ex = new FBAInventoryServiceMWS_Exception(array ('Message' => $message, 'StatusCode' => $status, 'ErrorCode' => $code,
                                                              'ErrorType' => $type, 'RequestId' => $requestId, 'XML' => $responseBody));

            } else {
                require_once ('FBAInventoryServiceMWS/Exception.php');
                $ex = new FBAInventoryServiceMWS_Exception(array('Message' => 'Internal Error', 'StatusCode' => $status));
            }
        } else {
            require_once ('FBAInventoryServiceMWS/Exception.php');
            $ex = new FBAInventoryServiceMWS_Exception(array('Message' => 'Internal Error', 'StatusCode' => $status));
        }
        return $ex;
    }



    /**
     * Perform HTTP post with exponential retries on error 500 and 503
     *
     */
    private function _httpPost(array $parameters)
    {

        $query = $this->_getParametersAsString($parameters);
        $url = parse_url ($this->_config['ServiceURL']);
        $post  = "POST " . $url['path'] ." HTTP/1.0\r\n";
        $post .= "Host: " . $url['host'] . "\r\n";
        $post .= "Content-Type: application/x-www-form-urlencoded; charset=utf-8\r\n";
        $post .= "Content-Length: " . strlen($query) . "\r\n";
        $post .= "User-Agent: " . $this->_config['UserAgent'] . "\r\n";
        $post .= "\r\n";
        $post .= $query;
        $port = array_key_exists('port',$url) ? $url['port'] : null;
        $scheme = '';

        switch ($url['scheme']) {
            case 'https':
                $scheme = 'ssl://';
                $port = $port === null ? 443 : $port;
                break;
            default:
                $scheme = '';
                $port = $port === null ? 80 : $port;
        }

        $response = '';
        if ($socket = @fsockopen($scheme . $url['host'], $port, $errno, $errstr, 10)) {

            fwrite($socket, $post);

            while (!feof($socket)) {
                $response .= fgets($socket, 1160);
            }
            fclose($socket);

            list($other, $responseBody) = explode("\r\n\r\n", $response, 2);
            $other = preg_split("/\r\n|\n|\r/", $other);
            list($protocol, $code, $text) = explode(' ', trim(array_shift($other)), 3);
        } else {
            throw new Exception ("Unable to establish connection to host " . $url['host'] . " $errstr");
        }


        return array ('Status' => (int)$code, 'ResponseBody' => $responseBody);
    }

    /**
     * Exponential sleep on failed request
     * @param retries current retry
     * @throws FBAInventoryServiceMWS_Exception if maximum number of retries has been reached
     */
    private function _pauseOnRetry($retries)
    {
        $delay = (int) (pow(4, $retries) * 100000) ;
        usleep($delay);
    }

    /**
     * Add authentication related and version parameters
     */
    private function _addRequiredParameters(array $parameters)
    {
        $parameters['AWSAccessKeyId'] = $this->_awsAccessKeyId;
        $parameters['Timestamp'] = $this->_getFormattedTimestamp();
        $parameters['Version'] = $this->_serviceVersion;
        $parameters['SignatureVersion'] = $this->_config['SignatureVersion'];
        if ($parameters['SignatureVersion'] > 1) {
            $parameters['SignatureMethod'] = $this->_config['SignatureMethod'];
        }
        $parameters['Signature'] = $this->_signParameters($parameters, $this->_awsSecretAccessKey);

        return $parameters;
    }

    /**
     * Convert paremeters to Url encoded query string
     */
    private function _getParametersAsString(array $parameters)
    {
        $queryParameters = array();
        foreach ($parameters as $key => $value) {
            if (!is_null($key) && $key !=='' && !is_null($value) && $value!=='')
            {
                $queryParameters[] = $key . '=' . $this->_urlencode($value);
            }
        }
        return implode('&', $queryParameters);
    }


    /**
     * Computes RFC 2104-compliant HMAC signature for request parameters
     * Implements AWS Signature, as per following spec:
     *
     * Signature Version 0: This is not supported in the MWS.
     *
     * Signature Version 1: This is not supported in the MWS.
     *
     * Signature Version is 2, string to sign is based on following:
     *
     *    1. The HTTP Request Method followed by an ASCII newline (%0A)
     *    2. The HTTP Host header in the form of lowercase host, followed by an ASCII newline.
     *    3. The URL encoded HTTP absolute path component of the URI
     *       (up to but not including the query string parameters);
     *       if this is empty use a forward '/'. This parameter is followed by an ASCII newline.
     *    4. The concatenation of all query string components (names and values)
     *       as UTF-8 characters which are URL encoded as per RFC 3986
     *       (hex characters MUST be uppercase), sorted using lexicographic byte ordering.
     *       Parameter names are separated from their values by the '=' character
     *       (ASCII character 61), even if the value is empty.
     *       Pairs of parameter and values are separated by the '&' character (ASCII code 38).
     *
     */
    private function _signParameters(array $parameters, $key) {
        $signatureVersion = $parameters['SignatureVersion'];
        $algorithm = "HmacSHA1";
        $stringToSign = null;
        if (0 === $signatureVersion) {
            throw new InvalidArguementException(
                'Signature Version 0 is no longer supported. Only Signature Version 2 is supported.');
        } else if (1 === $signatureVersion) {
            throw new InvalidArguementException(
                'Signature Version 1 is no longer supported. Only Signature Version 2 is supported.');
        } else if (2 === $signatureVersion) {
            $algorithm = $this->_config['SignatureMethod'];
            $parameters['SignatureMethod'] = $algorithm;
            $stringToSign = $this->_calculateStringToSignV2($parameters);
        } else {
            throw new Exception("Invalid Signature Version specified");
        }
        return $this->_sign($stringToSign, $key, $algorithm);
    }

    /**
     * Calculate String to Sign for SignatureVersion 2
     * @param array $parameters request parameters
     * @return String to Sign
     */
    private function _calculateStringToSignV2(array $parameters) {
        $parsedUrl = parse_url($this->_config['ServiceURL']);
        $endpoint = $parsedUrl['host'];
        if (!is_null($parsedUrl['port'])) {
          $endpoint .= ':' . $parsedUrl['port'];
        }

        $data = 'POST';
        $data .= "\n";
        $endpoint = parse_url ($this->_config['ServiceURL']);
        $data .= $endpoint['host'];
        $data .= "\n";
        $uri = array_key_exists('path', $endpoint) ? $endpoint['path'] : null;
        if (!isset ($uri)) {
            $uri = "/";
        }
        $uriencoded = implode("/", array_map(array($this, "_urlencode"), explode("/", $uri)));
        $data .= $uriencoded;
        $data .= "\n";
        uksort($parameters, 'strcmp');
        $data .= $this->_getParametersAsString($parameters);
        return $data;
    }

    private function _urlencode($value) {
        return str_replace('%7E', '~', rawurlencode($value));
    }


    /**
     * Computes RFC 2104-compliant HMAC signature.
     */
    private function _sign($data, $key, $algorithm)
    {
        if ($algorithm === 'HmacSHA1') {
            $hash = 'sha1';
        } else if ($algorithm === 'HmacSHA256') {
            $hash = 'sha256';
        } else {
            throw new Exception ("Non-supported signing method specified");
        }
        return base64_encode(
            hash_hmac($hash, $data, $key, true)
        );
    }


    /**
     * Formats date as ISO 8601 timestamp
     */
    private function _getFormattedTimestamp()
    {
        return gmdate("Y-m-d\TH:i:s.\\0\\0\\0\\Z", time());
    }


                                                
    /**
     * Convert ListInventorySupplyByNextTokenRequest to name value pairs
     */
    private function _convertListInventorySupplyByNextToken($request) {
        
        $parameters = array();
        $parameters['Action'] = 'ListInventorySupplyByNextToken';
        if ($request->isSetSellerId()) {
            $parameters['SellerId'] =  $request->getSellerId();
        }
        if ($request->isSetMarketplace()) {
            $parameters['Marketplace'] =  $request->getMarketplace();
        }
        if ($request->isSetNextToken()) {
            $parameters['NextToken'] =  $request->getNextToken();
        }

        return $parameters;
    }
        
                                                
    /**
     * Convert ListInventorySupplyRequest to name value pairs
     */
    private function _convertListInventorySupply($request) {
        
        $parameters = array();
        $parameters['Action'] = 'ListInventorySupply';
        if ($request->isSetSellerId()) {
            $parameters['SellerId'] =  $request->getSellerId();
        }
        if ($request->isSetMarketplace()) {
            $parameters['Marketplace'] =  $request->getMarketplace();
        }
        if ($request->isSetSellerSkus()) {
            $sellerSkuslistInventorySupplyRequest = $request->getSellerSkus();
            foreach  ($sellerSkuslistInventorySupplyRequest->getmember() as $membersellerSkusIndex => $membersellerSkus) {
                $parameters['SellerSkus' . '.' . 'member' . '.'  . ($membersellerSkusIndex + 1)] =  $membersellerSkus;
            }
        }
        if ($request->isSetQueryStartDateTime()) {
            $parameters['QueryStartDateTime'] =  $request->getQueryStartDateTime();
        }
        if ($request->isSetResponseGroup()) {
            $parameters['ResponseGroup'] =  $request->getResponseGroup();
        }

        return $parameters;
    }
        
                                                
    /**
     * Convert GetServiceStatusRequest to name value pairs
     */
    private function _convertGetServiceStatus($request) {
        
        $parameters = array();
        $parameters['Action'] = 'GetServiceStatus';
        if ($request->isSetSellerId()) {
            $parameters['SellerId'] =  $request->getSellerId();
        }
        if ($request->isSetMarketplace()) {
            $parameters['Marketplace'] =  $request->getMarketplace();
        }

        return $parameters;
    }
        
                                                                        
}