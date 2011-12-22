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
 *  Generated: Fri Oct 22 09:52:21 UTC 2010
 * 
 */

/**
 *  @see FBAInventoryServiceMWS_Model
 */
require_once ('FBAInventoryServiceMWS/Model.php');  

    

/**
 * FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResponse
 * 
 * Properties:
 * <ul>
 * 
 * <li>ListInventorySupplyByNextTokenResult: FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResult</li>
 * <li>ResponseMetadata: FBAInventoryServiceMWS_Model_ResponseMetadata</li>
 *
 * </ul>
 */ 
class FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResponse extends FBAInventoryServiceMWS_Model
{


    /**
     * Construct new FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResponse
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>ListInventorySupplyByNextTokenResult: FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResult</li>
     * <li>ResponseMetadata: FBAInventoryServiceMWS_Model_ResponseMetadata</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'ListInventorySupplyByNextTokenResult' => array('FieldValue' => null, 'FieldType' => 'FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResult'),
        'ResponseMetadata' => array('FieldValue' => null, 'FieldType' => 'FBAInventoryServiceMWS_Model_ResponseMetadata'),
        );
        parent::__construct($data);
    }

       
    /**
     * Construct FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResponse from XML string
     * 
     * @param string $xml XML string to construct from
     * @return FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResponse 
     */
    public static function fromXML($xml)
    {
        $dom = new DOMDocument();
        $dom->loadXML($xml);
        $xpath = new DOMXPath($dom);
    	$xpath->registerNamespace('a', 'http://mws.amazonaws.com/FulfillmentInventory/2010-10-01/');
        $response = $xpath->query('//a:ListInventorySupplyByNextTokenResponse');
        if ($response->length == 1) {
            return new FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResponse(($response->item(0))); 
        } else {
            throw new Exception ("Unable to construct FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResponse from provided XML. 
                                  Make sure that ListInventorySupplyByNextTokenResponse is a root element");
        }
          
    }
    
    /**
     * Gets the value of the ListInventorySupplyByNextTokenResult.
     * 
     * @return ListInventorySupplyByNextTokenResult ListInventorySupplyByNextTokenResult
     */
    public function getListInventorySupplyByNextTokenResult() 
    {
        return $this->_fields['ListInventorySupplyByNextTokenResult']['FieldValue'];
    }

    /**
     * Sets the value of the ListInventorySupplyByNextTokenResult.
     * 
     * @param ListInventorySupplyByNextTokenResult ListInventorySupplyByNextTokenResult
     * @return void
     */
    public function setListInventorySupplyByNextTokenResult($value) 
    {
        $this->_fields['ListInventorySupplyByNextTokenResult']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the ListInventorySupplyByNextTokenResult  and returns this instance
     * 
     * @param ListInventorySupplyByNextTokenResult $value ListInventorySupplyByNextTokenResult
     * @return FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResponse instance
     */
    public function withListInventorySupplyByNextTokenResult($value)
    {
        $this->setListInventorySupplyByNextTokenResult($value);
        return $this;
    }


    /**
     * Checks if ListInventorySupplyByNextTokenResult  is set
     * 
     * @return bool true if ListInventorySupplyByNextTokenResult property is set
     */
    public function isSetListInventorySupplyByNextTokenResult()
    {
        return !is_null($this->_fields['ListInventorySupplyByNextTokenResult']['FieldValue']);

    }

    /**
     * Gets the value of the ResponseMetadata.
     * 
     * @return ResponseMetadata ResponseMetadata
     */
    public function getResponseMetadata() 
    {
        return $this->_fields['ResponseMetadata']['FieldValue'];
    }

    /**
     * Sets the value of the ResponseMetadata.
     * 
     * @param ResponseMetadata ResponseMetadata
     * @return void
     */
    public function setResponseMetadata($value) 
    {
        $this->_fields['ResponseMetadata']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the ResponseMetadata  and returns this instance
     * 
     * @param ResponseMetadata $value ResponseMetadata
     * @return FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResponse instance
     */
    public function withResponseMetadata($value)
    {
        $this->setResponseMetadata($value);
        return $this;
    }


    /**
     * Checks if ResponseMetadata  is set
     * 
     * @return bool true if ResponseMetadata property is set
     */
    public function isSetResponseMetadata()
    {
        return !is_null($this->_fields['ResponseMetadata']['FieldValue']);

    }



    /**
     * XML Representation for this object
     * 
     * @return string XML for this object
     */
    public function toXML() 
    {
        $xml = "";
        $xml .= "<ListInventorySupplyByNextTokenResponse xmlns=\"http://mws.amazonaws.com/FulfillmentInventory/2010-10-01/\">";
        $xml .= $this->_toXMLFragment();
        $xml .= "</ListInventorySupplyByNextTokenResponse>";
        return $xml;
    }

}