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
 * FBAInventoryServiceMWS_Model_InventorySupply
 * 
 * Properties:
 * <ul>
 * 
 * <li>SellerSKU: string</li>
 * <li>FNSKU: string</li>
 * <li>ASIN: string</li>
 * <li>Condition: string</li>
 * <li>TotalSupplyQuantity: int</li>
 * <li>InStockSupplyQuantity: int</li>
 * <li>EarliestAvailability: FBAInventoryServiceMWS_Model_Timepoint</li>
 * <li>SupplyDetail: FBAInventoryServiceMWS_Model_InventorySupplyDetailList</li>
 *
 * </ul>
 */ 
class FBAInventoryServiceMWS_Model_InventorySupply extends FBAInventoryServiceMWS_Model
{


    /**
     * Construct new FBAInventoryServiceMWS_Model_InventorySupply
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>SellerSKU: string</li>
     * <li>FNSKU: string</li>
     * <li>ASIN: string</li>
     * <li>Condition: string</li>
     * <li>TotalSupplyQuantity: int</li>
     * <li>InStockSupplyQuantity: int</li>
     * <li>EarliestAvailability: FBAInventoryServiceMWS_Model_Timepoint</li>
     * <li>SupplyDetail: FBAInventoryServiceMWS_Model_InventorySupplyDetailList</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'SellerSKU' => array('FieldValue' => null, 'FieldType' => 'string'),
        'FNSKU' => array('FieldValue' => null, 'FieldType' => 'string'),
        'ASIN' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Condition' => array('FieldValue' => null, 'FieldType' => 'string'),
        'TotalSupplyQuantity' => array('FieldValue' => null, 'FieldType' => 'int'),
        'InStockSupplyQuantity' => array('FieldValue' => null, 'FieldType' => 'int'),
        'EarliestAvailability' => array('FieldValue' => null, 'FieldType' => 'FBAInventoryServiceMWS_Model_Timepoint'),
        'SupplyDetail' => array('FieldValue' => null, 'FieldType' => 'FBAInventoryServiceMWS_Model_InventorySupplyDetailList'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the SellerSKU property.
     * 
     * @return string SellerSKU
     */
    public function getSellerSKU() 
    {
        return $this->_fields['SellerSKU']['FieldValue'];
    }

    /**
     * Sets the value of the SellerSKU property.
     * 
     * @param string SellerSKU
     * @return this instance
     */
    public function setSellerSKU($value) 
    {
        $this->_fields['SellerSKU']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the SellerSKU and returns this instance
     * 
     * @param string $value SellerSKU
     * @return FBAInventoryServiceMWS_Model_InventorySupply instance
     */
    public function withSellerSKU($value)
    {
        $this->setSellerSKU($value);
        return $this;
    }


    /**
     * Checks if SellerSKU is set
     * 
     * @return bool true if SellerSKU  is set
     */
    public function isSetSellerSKU()
    {
        return !is_null($this->_fields['SellerSKU']['FieldValue']);
    }

    /**
     * Gets the value of the FNSKU property.
     * 
     * @return string FNSKU
     */
    public function getFNSKU() 
    {
        return $this->_fields['FNSKU']['FieldValue'];
    }

    /**
     * Sets the value of the FNSKU property.
     * 
     * @param string FNSKU
     * @return this instance
     */
    public function setFNSKU($value) 
    {
        $this->_fields['FNSKU']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the FNSKU and returns this instance
     * 
     * @param string $value FNSKU
     * @return FBAInventoryServiceMWS_Model_InventorySupply instance
     */
    public function withFNSKU($value)
    {
        $this->setFNSKU($value);
        return $this;
    }


    /**
     * Checks if FNSKU is set
     * 
     * @return bool true if FNSKU  is set
     */
    public function isSetFNSKU()
    {
        return !is_null($this->_fields['FNSKU']['FieldValue']);
    }

    /**
     * Gets the value of the ASIN property.
     * 
     * @return string ASIN
     */
    public function getASIN() 
    {
        return $this->_fields['ASIN']['FieldValue'];
    }

    /**
     * Sets the value of the ASIN property.
     * 
     * @param string ASIN
     * @return this instance
     */
    public function setASIN($value) 
    {
        $this->_fields['ASIN']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the ASIN and returns this instance
     * 
     * @param string $value ASIN
     * @return FBAInventoryServiceMWS_Model_InventorySupply instance
     */
    public function withASIN($value)
    {
        $this->setASIN($value);
        return $this;
    }


    /**
     * Checks if ASIN is set
     * 
     * @return bool true if ASIN  is set
     */
    public function isSetASIN()
    {
        return !is_null($this->_fields['ASIN']['FieldValue']);
    }

    /**
     * Gets the value of the Condition property.
     * 
     * @return string Condition
     */
    public function getCondition() 
    {
        return $this->_fields['Condition']['FieldValue'];
    }

    /**
     * Sets the value of the Condition property.
     * 
     * @param string Condition
     * @return this instance
     */
    public function setCondition($value) 
    {
        $this->_fields['Condition']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Condition and returns this instance
     * 
     * @param string $value Condition
     * @return FBAInventoryServiceMWS_Model_InventorySupply instance
     */
    public function withCondition($value)
    {
        $this->setCondition($value);
        return $this;
    }


    /**
     * Checks if Condition is set
     * 
     * @return bool true if Condition  is set
     */
    public function isSetCondition()
    {
        return !is_null($this->_fields['Condition']['FieldValue']);
    }

    /**
     * Gets the value of the TotalSupplyQuantity property.
     * 
     * @return int TotalSupplyQuantity
     */
    public function getTotalSupplyQuantity() 
    {
        return $this->_fields['TotalSupplyQuantity']['FieldValue'];
    }

    /**
     * Sets the value of the TotalSupplyQuantity property.
     * 
     * @param int TotalSupplyQuantity
     * @return this instance
     */
    public function setTotalSupplyQuantity($value) 
    {
        $this->_fields['TotalSupplyQuantity']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the TotalSupplyQuantity and returns this instance
     * 
     * @param int $value TotalSupplyQuantity
     * @return FBAInventoryServiceMWS_Model_InventorySupply instance
     */
    public function withTotalSupplyQuantity($value)
    {
        $this->setTotalSupplyQuantity($value);
        return $this;
    }


    /**
     * Checks if TotalSupplyQuantity is set
     * 
     * @return bool true if TotalSupplyQuantity  is set
     */
    public function isSetTotalSupplyQuantity()
    {
        return !is_null($this->_fields['TotalSupplyQuantity']['FieldValue']);
    }

    /**
     * Gets the value of the InStockSupplyQuantity property.
     * 
     * @return int InStockSupplyQuantity
     */
    public function getInStockSupplyQuantity() 
    {
        return $this->_fields['InStockSupplyQuantity']['FieldValue'];
    }

    /**
     * Sets the value of the InStockSupplyQuantity property.
     * 
     * @param int InStockSupplyQuantity
     * @return this instance
     */
    public function setInStockSupplyQuantity($value) 
    {
        $this->_fields['InStockSupplyQuantity']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the InStockSupplyQuantity and returns this instance
     * 
     * @param int $value InStockSupplyQuantity
     * @return FBAInventoryServiceMWS_Model_InventorySupply instance
     */
    public function withInStockSupplyQuantity($value)
    {
        $this->setInStockSupplyQuantity($value);
        return $this;
    }


    /**
     * Checks if InStockSupplyQuantity is set
     * 
     * @return bool true if InStockSupplyQuantity  is set
     */
    public function isSetInStockSupplyQuantity()
    {
        return !is_null($this->_fields['InStockSupplyQuantity']['FieldValue']);
    }

    /**
     * Gets the value of the EarliestAvailability.
     * 
     * @return Timepoint EarliestAvailability
     */
    public function getEarliestAvailability() 
    {
        return $this->_fields['EarliestAvailability']['FieldValue'];
    }

    /**
     * Sets the value of the EarliestAvailability.
     * 
     * @param Timepoint EarliestAvailability
     * @return void
     */
    public function setEarliestAvailability($value) 
    {
        $this->_fields['EarliestAvailability']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the EarliestAvailability  and returns this instance
     * 
     * @param Timepoint $value EarliestAvailability
     * @return FBAInventoryServiceMWS_Model_InventorySupply instance
     */
    public function withEarliestAvailability($value)
    {
        $this->setEarliestAvailability($value);
        return $this;
    }


    /**
     * Checks if EarliestAvailability  is set
     * 
     * @return bool true if EarliestAvailability property is set
     */
    public function isSetEarliestAvailability()
    {
        return !is_null($this->_fields['EarliestAvailability']['FieldValue']);

    }

    /**
     * Gets the value of the SupplyDetail.
     * 
     * @return InventorySupplyDetailList SupplyDetail
     */
    public function getSupplyDetail() 
    {
        return $this->_fields['SupplyDetail']['FieldValue'];
    }

    /**
     * Sets the value of the SupplyDetail.
     * 
     * @param InventorySupplyDetailList SupplyDetail
     * @return void
     */
    public function setSupplyDetail($value) 
    {
        $this->_fields['SupplyDetail']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the SupplyDetail  and returns this instance
     * 
     * @param InventorySupplyDetailList $value SupplyDetail
     * @return FBAInventoryServiceMWS_Model_InventorySupply instance
     */
    public function withSupplyDetail($value)
    {
        $this->setSupplyDetail($value);
        return $this;
    }


    /**
     * Checks if SupplyDetail  is set
     * 
     * @return bool true if SupplyDetail property is set
     */
    public function isSetSupplyDetail()
    {
        return !is_null($this->_fields['SupplyDetail']['FieldValue']);

    }




}