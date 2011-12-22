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
 * FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResult
 * 
 * Properties:
 * <ul>
 * 
 * <li>InventorySupplyList: FBAInventoryServiceMWS_Model_InventorySupplyList</li>
 * <li>NextToken: string</li>
 *
 * </ul>
 */ 
class FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResult extends FBAInventoryServiceMWS_Model
{


    /**
     * Construct new FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResult
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>InventorySupplyList: FBAInventoryServiceMWS_Model_InventorySupplyList</li>
     * <li>NextToken: string</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'InventorySupplyList' => array('FieldValue' => null, 'FieldType' => 'FBAInventoryServiceMWS_Model_InventorySupplyList'),
        'NextToken' => array('FieldValue' => null, 'FieldType' => 'string'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the InventorySupplyList.
     * 
     * @return InventorySupplyList InventorySupplyList
     */
    public function getInventorySupplyList() 
    {
        return $this->_fields['InventorySupplyList']['FieldValue'];
    }

    /**
     * Sets the value of the InventorySupplyList.
     * 
     * @param InventorySupplyList InventorySupplyList
     * @return void
     */
    public function setInventorySupplyList($value) 
    {
        $this->_fields['InventorySupplyList']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the InventorySupplyList  and returns this instance
     * 
     * @param InventorySupplyList $value InventorySupplyList
     * @return FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResult instance
     */
    public function withInventorySupplyList($value)
    {
        $this->setInventorySupplyList($value);
        return $this;
    }


    /**
     * Checks if InventorySupplyList  is set
     * 
     * @return bool true if InventorySupplyList property is set
     */
    public function isSetInventorySupplyList()
    {
        return !is_null($this->_fields['InventorySupplyList']['FieldValue']);

    }

    /**
     * Gets the value of the NextToken property.
     * 
     * @return string NextToken
     */
    public function getNextToken() 
    {
        return $this->_fields['NextToken']['FieldValue'];
    }

    /**
     * Sets the value of the NextToken property.
     * 
     * @param string NextToken
     * @return this instance
     */
    public function setNextToken($value) 
    {
        $this->_fields['NextToken']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the NextToken and returns this instance
     * 
     * @param string $value NextToken
     * @return FBAInventoryServiceMWS_Model_ListInventorySupplyByNextTokenResult instance
     */
    public function withNextToken($value)
    {
        $this->setNextToken($value);
        return $this;
    }


    /**
     * Checks if NextToken is set
     * 
     * @return bool true if NextToken  is set
     */
    public function isSetNextToken()
    {
        return !is_null($this->_fields['NextToken']['FieldValue']);
    }




}