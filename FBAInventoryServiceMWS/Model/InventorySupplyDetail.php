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
 * FBAInventoryServiceMWS_Model_InventorySupplyDetail
 * 
 * Properties:
 * <ul>
 * 
 * <li>Quantity: int</li>
 * <li>SupplyType: string</li>
 * <li>EarliestAvailableToPick: FBAInventoryServiceMWS_Model_Timepoint</li>
 * <li>LatestAvailableToPick: FBAInventoryServiceMWS_Model_Timepoint</li>
 *
 * </ul>
 */ 
class FBAInventoryServiceMWS_Model_InventorySupplyDetail extends FBAInventoryServiceMWS_Model
{


    /**
     * Construct new FBAInventoryServiceMWS_Model_InventorySupplyDetail
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>Quantity: int</li>
     * <li>SupplyType: string</li>
     * <li>EarliestAvailableToPick: FBAInventoryServiceMWS_Model_Timepoint</li>
     * <li>LatestAvailableToPick: FBAInventoryServiceMWS_Model_Timepoint</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'Quantity' => array('FieldValue' => null, 'FieldType' => 'int'),
        'SupplyType' => array('FieldValue' => null, 'FieldType' => 'string'),
        'EarliestAvailableToPick' => array('FieldValue' => null, 'FieldType' => 'FBAInventoryServiceMWS_Model_Timepoint'),
        'LatestAvailableToPick' => array('FieldValue' => null, 'FieldType' => 'FBAInventoryServiceMWS_Model_Timepoint'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the Quantity property.
     * 
     * @return int Quantity
     */
    public function getQuantity() 
    {
        return $this->_fields['Quantity']['FieldValue'];
    }

    /**
     * Sets the value of the Quantity property.
     * 
     * @param int Quantity
     * @return this instance
     */
    public function setQuantity($value) 
    {
        $this->_fields['Quantity']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the Quantity and returns this instance
     * 
     * @param int $value Quantity
     * @return FBAInventoryServiceMWS_Model_InventorySupplyDetail instance
     */
    public function withQuantity($value)
    {
        $this->setQuantity($value);
        return $this;
    }


    /**
     * Checks if Quantity is set
     * 
     * @return bool true if Quantity  is set
     */
    public function isSetQuantity()
    {
        return !is_null($this->_fields['Quantity']['FieldValue']);
    }

    /**
     * Gets the value of the SupplyType property.
     * 
     * @return string SupplyType
     */
    public function getSupplyType() 
    {
        return $this->_fields['SupplyType']['FieldValue'];
    }

    /**
     * Sets the value of the SupplyType property.
     * 
     * @param string SupplyType
     * @return this instance
     */
    public function setSupplyType($value) 
    {
        $this->_fields['SupplyType']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the SupplyType and returns this instance
     * 
     * @param string $value SupplyType
     * @return FBAInventoryServiceMWS_Model_InventorySupplyDetail instance
     */
    public function withSupplyType($value)
    {
        $this->setSupplyType($value);
        return $this;
    }


    /**
     * Checks if SupplyType is set
     * 
     * @return bool true if SupplyType  is set
     */
    public function isSetSupplyType()
    {
        return !is_null($this->_fields['SupplyType']['FieldValue']);
    }

    /**
     * Gets the value of the EarliestAvailableToPick.
     * 
     * @return Timepoint EarliestAvailableToPick
     */
    public function getEarliestAvailableToPick() 
    {
        return $this->_fields['EarliestAvailableToPick']['FieldValue'];
    }

    /**
     * Sets the value of the EarliestAvailableToPick.
     * 
     * @param Timepoint EarliestAvailableToPick
     * @return void
     */
    public function setEarliestAvailableToPick($value) 
    {
        $this->_fields['EarliestAvailableToPick']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the EarliestAvailableToPick  and returns this instance
     * 
     * @param Timepoint $value EarliestAvailableToPick
     * @return FBAInventoryServiceMWS_Model_InventorySupplyDetail instance
     */
    public function withEarliestAvailableToPick($value)
    {
        $this->setEarliestAvailableToPick($value);
        return $this;
    }


    /**
     * Checks if EarliestAvailableToPick  is set
     * 
     * @return bool true if EarliestAvailableToPick property is set
     */
    public function isSetEarliestAvailableToPick()
    {
        return !is_null($this->_fields['EarliestAvailableToPick']['FieldValue']);

    }

    /**
     * Gets the value of the LatestAvailableToPick.
     * 
     * @return Timepoint LatestAvailableToPick
     */
    public function getLatestAvailableToPick() 
    {
        return $this->_fields['LatestAvailableToPick']['FieldValue'];
    }

    /**
     * Sets the value of the LatestAvailableToPick.
     * 
     * @param Timepoint LatestAvailableToPick
     * @return void
     */
    public function setLatestAvailableToPick($value) 
    {
        $this->_fields['LatestAvailableToPick']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the LatestAvailableToPick  and returns this instance
     * 
     * @param Timepoint $value LatestAvailableToPick
     * @return FBAInventoryServiceMWS_Model_InventorySupplyDetail instance
     */
    public function withLatestAvailableToPick($value)
    {
        $this->setLatestAvailableToPick($value);
        return $this;
    }


    /**
     * Checks if LatestAvailableToPick  is set
     * 
     * @return bool true if LatestAvailableToPick property is set
     */
    public function isSetLatestAvailableToPick()
    {
        return !is_null($this->_fields['LatestAvailableToPick']['FieldValue']);

    }




}