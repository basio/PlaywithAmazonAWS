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
 * FBAInventoryServiceMWS_Model_ListInventorySupplyResponse
 * 
 * Properties:
 * <ul>
 * 
 * <li>ListInventorySupplyResult: FBAInventoryServiceMWS_Model_ListInventorySupplyResult</li>
 * <li>ResponseMetadata: FBAInventoryServiceMWS_Model_ResponseMetadata</li>
 *
 * </ul>
 */ 
class FBAInventoryServiceMWS_Model_ListInventorySupplyResponse extends FBAInventoryServiceMWS_Model
{


    /**
     * Construct new FBAInventoryServiceMWS_Model_ListInventorySupplyResponse
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>ListInventorySupplyResult: FBAInventoryServiceMWS_Model_ListInventorySupplyResult</li>
     * <li>ResponseMetadata: FBAInventoryServiceMWS_Model_ResponseMetadata</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'ListInventorySupplyResult' => array('FieldValue' => null, 'FieldType' => 'FBAInventoryServiceMWS_Model_ListInventorySupplyResult'),
        'ResponseMetadata' => array('FieldValue' => null, 'FieldType' => 'FBAInventoryServiceMWS_Model_ResponseMetadata'),
        );
        parent::__construct($data);
    }

       
    /**
     * Construct FBAInventoryServiceMWS_Model_ListInventorySupplyResponse from XML string
     * 
     * @param string $xml XML string to construct from
     * @return FBAInventoryServiceMWS_Model_ListInventorySupplyResponse 
     */
    public static function fromXML($xml)
    {
        $dom = new DOMDocument();
        $dom->loadXML($xml);
        $xpath = new DOMXPath($dom);
    	$xpath->registerNamespace('a', 'http://mws.amazonaws.com/FulfillmentInventory/2010-10-01/');
        $response = $xpath->query('//a:ListInventorySupplyResponse');
        if ($response->length == 1) {
            return new FBAInventoryServiceMWS_Model_ListInventorySupplyResponse(($response->item(0))); 
        } else {
            throw new Exception ("Unable to construct FBAInventoryServiceMWS_Model_ListInventorySupplyResponse from provided XML. 
                                  Make sure that ListInventorySupplyResponse is a root element");
        }
          
    }
    
    /**
     * Gets the value of the ListInventorySupplyResult.
     * 
     * @return ListInventorySupplyResult ListInventorySupplyResult
     */
    public function getListInventorySupplyResult() 
    {
        return $this->_fields['ListInventorySupplyResult']['FieldValue'];
    }

    /**
     * Sets the value of the ListInventorySupplyResult.
     * 
     * @param ListInventorySupplyResult ListInventorySupplyResult
     * @return void
     */
    public function setListInventorySupplyResult($value) 
    {
        $this->_fields['ListInventorySupplyResult']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the ListInventorySupplyResult  and returns this instance
     * 
     * @param ListInventorySupplyResult $value ListInventorySupplyResult
     * @return FBAInventoryServiceMWS_Model_ListInventorySupplyResponse instance
     */
    public function withListInventorySupplyResult($value)
    {
        $this->setListInventorySupplyResult($value);
        return $this;
    }


    /**
     * Checks if ListInventorySupplyResult  is set
     * 
     * @return bool true if ListInventorySupplyResult property is set
     */
    public function isSetListInventorySupplyResult()
    {
        return !is_null($this->_fields['ListInventorySupplyResult']['FieldValue']);

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
     * @return FBAInventoryServiceMWS_Model_ListInventorySupplyResponse instance
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
        $xml .= "<ListInventorySupplyResponse xmlns=\"http://mws.amazonaws.com/FulfillmentInventory/2010-10-01/\">";
        $xml .= $this->_toXMLFragment();
        $xml .= "</ListInventorySupplyResponse>";
        return $xml;
    }

}