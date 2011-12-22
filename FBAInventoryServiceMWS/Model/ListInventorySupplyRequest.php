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
 * FBAInventoryServiceMWS_Model_ListInventorySupplyRequest
 * 
 * Properties:
 * <ul>
 * 
 * <li>SellerId: string</li>
 * <li>Marketplace: string</li>
 * <li>SellerSkus: FBAInventoryServiceMWS_Model_SellerSkuList</li>
 * <li>QueryStartDateTime: string</li>
 * <li>ResponseGroup: string</li>
 *
 * </ul>
 */ 
class FBAInventoryServiceMWS_Model_ListInventorySupplyRequest extends FBAInventoryServiceMWS_Model
{


    /**
     * Construct new FBAInventoryServiceMWS_Model_ListInventorySupplyRequest
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>SellerId: string</li>
     * <li>Marketplace: string</li>
     * <li>SellerSkus: FBAInventoryServiceMWS_Model_SellerSkuList</li>
     * <li>QueryStartDateTime: string</li>
     * <li>ResponseGroup: string</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'SellerId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Marketplace' => array('FieldValue' => null, 'FieldType' => 'string'),
        'SellerSkus' => array('FieldValue' => null, 'FieldType' => 'FBAInventoryServiceMWS_Model_SellerSkuList'),
        'QueryStartDateTime' => array('FieldValue' => null, 'FieldType' => 'string'),
        'ResponseGroup' => array('FieldValue' => null, 'FieldType' => 'string'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the SellerId property.
     * 
     * @return string SellerId
     */
    public function getSellerId() 
    {
        return $this->_fields['SellerId']['FieldValue'];
    }

    /**
     * Sets the value of the SellerId property.
     * 
     * @param string SellerId
     * @return this instance
     */
    public function setSellerId($value) 
    {
        $this->_fields['SellerId']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the SellerId and returns this instance
     * 
     * @param string $value SellerId
     * @return FBAInventoryServiceMWS_Model_ListInventorySupplyRequest instance
     */
    public function withSellerId($value)
    {
        $this->setSellerId($value);
        return $this;
    }


    /**
     * Checks if SellerId is set
     * 
     * @return bool true if SellerId  is set
     */
    public function isSetSellerId()
    {
        return !is_null($this->_fields['SellerId']['FieldValue']);
    }

    /**
     * Gets the value of the Marketplace property.
     * 
     * @return string Marketplace
     */
    public function getMarketplace() 
    {
        return $this->_fields['Marketplace']['FieldValue'];
    }

    /**
     * Sets the value of the Marketplace property.
     * 
     * @param string Marketplace
     * @return this instance
     */
    public function setMarketplace($value) 
    {
        $this->_fields['Marketplace']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Marketplace and returns this instance
     * 
     * @param string $value Marketplace
     * @return FBAInventoryServiceMWS_Model_ListInventorySupplyRequest instance
     */
    public function withMarketplace($value)
    {
        $this->setMarketplace($value);
        return $this;
    }


    /**
     * Checks if Marketplace is set
     * 
     * @return bool true if Marketplace  is set
     */
    public function isSetMarketplace()
    {
        return !is_null($this->_fields['Marketplace']['FieldValue']);
    }

    /**
     * Gets the value of the SellerSkus.
     * 
     * @return SellerSkuList SellerSkus
     */
    public function getSellerSkus() 
    {
        return $this->_fields['SellerSkus']['FieldValue'];
    }

    /**
     * Sets the value of the SellerSkus.
     * 
     * @param SellerSkuList SellerSkus
     * @return void
     */
    public function setSellerSkus($value) 
    {
        $this->_fields['SellerSkus']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the SellerSkus  and returns this instance
     * 
     * @param SellerSkuList $value SellerSkus
     * @return FBAInventoryServiceMWS_Model_ListInventorySupplyRequest instance
     */
    public function withSellerSkus($value)
    {
        $this->setSellerSkus($value);
        return $this;
    }


    /**
     * Checks if SellerSkus  is set
     * 
     * @return bool true if SellerSkus property is set
     */
    public function isSetSellerSkus()
    {
        return !is_null($this->_fields['SellerSkus']['FieldValue']);

    }

    /**
     * Gets the value of the QueryStartDateTime property.
     * 
     * @return string QueryStartDateTime
     */
    public function getQueryStartDateTime() 
    {
        return $this->_fields['QueryStartDateTime']['FieldValue'];
    }

    /**
     * Sets the value of the QueryStartDateTime property.
     * 
     * @param string QueryStartDateTime
     * @return this instance
     */
    public function setQueryStartDateTime($value) 
    {
        $this->_fields['QueryStartDateTime']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the QueryStartDateTime and returns this instance
     * 
     * @param string $value QueryStartDateTime
     * @return FBAInventoryServiceMWS_Model_ListInventorySupplyRequest instance
     */
    public function withQueryStartDateTime($value)
    {
        $this->setQueryStartDateTime($value);
        return $this;
    }


    /**
     * Checks if QueryStartDateTime is set
     * 
     * @return bool true if QueryStartDateTime  is set
     */
    public function isSetQueryStartDateTime()
    {
        return !is_null($this->_fields['QueryStartDateTime']['FieldValue']);
    }

    /**
     * Gets the value of the ResponseGroup property.
     * 
     * @return string ResponseGroup
     */
    public function getResponseGroup() 
    {
        return $this->_fields['ResponseGroup']['FieldValue'];
    }

    /**
     * Sets the value of the ResponseGroup property.
     * 
     * @param string ResponseGroup
     * @return this instance
     */
    public function setResponseGroup($value) 
    {
        $this->_fields['ResponseGroup']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the ResponseGroup and returns this instance
     * 
     * @param string $value ResponseGroup
     * @return FBAInventoryServiceMWS_Model_ListInventorySupplyRequest instance
     */
    public function withResponseGroup($value)
    {
        $this->setResponseGroup($value);
        return $this;
    }


    /**
     * Checks if ResponseGroup is set
     * 
     * @return bool true if ResponseGroup  is set
     */
    public function isSetResponseGroup()
    {
        return !is_null($this->_fields['ResponseGroup']['FieldValue']);
    }




}