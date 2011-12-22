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
 * FBAInventoryServiceMWS_Model_Timepoint
 * 
 * Properties:
 * <ul>
 * 
 * <li>TimepointType: string</li>
 * <li>DateTime: string</li>
 *
 * </ul>
 */ 
class FBAInventoryServiceMWS_Model_Timepoint extends FBAInventoryServiceMWS_Model
{


    /**
     * Construct new FBAInventoryServiceMWS_Model_Timepoint
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>TimepointType: string</li>
     * <li>DateTime: string</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'TimepointType' => array('FieldValue' => null, 'FieldType' => 'string'),
        'DateTime' => array('FieldValue' => null, 'FieldType' => 'string'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the TimepointType property.
     * 
     * @return string TimepointType
     */
    public function getTimepointType() 
    {
        return $this->_fields['TimepointType']['FieldValue'];
    }

    /**
     * Sets the value of the TimepointType property.
     * 
     * @param string TimepointType
     * @return this instance
     */
    public function setTimepointType($value) 
    {
        $this->_fields['TimepointType']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the TimepointType and returns this instance
     * 
     * @param string $value TimepointType
     * @return FBAInventoryServiceMWS_Model_Timepoint instance
     */
    public function withTimepointType($value)
    {
        $this->setTimepointType($value);
        return $this;
    }


    /**
     * Checks if TimepointType is set
     * 
     * @return bool true if TimepointType  is set
     */
    public function isSetTimepointType()
    {
        return !is_null($this->_fields['TimepointType']['FieldValue']);
    }

    /**
     * Gets the value of the DateTime property.
     * 
     * @return string DateTime
     */
    public function getDateTime() 
    {
        return $this->_fields['DateTime']['FieldValue'];
    }

    /**
     * Sets the value of the DateTime property.
     * 
     * @param string DateTime
     * @return this instance
     */
    public function setDateTime($value) 
    {
        $this->_fields['DateTime']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the DateTime and returns this instance
     * 
     * @param string $value DateTime
     * @return FBAInventoryServiceMWS_Model_Timepoint instance
     */
    public function withDateTime($value)
    {
        $this->setDateTime($value);
        return $this;
    }


    /**
     * Checks if DateTime is set
     * 
     * @return bool true if DateTime  is set
     */
    public function isSetDateTime()
    {
        return !is_null($this->_fields['DateTime']['FieldValue']);
    }




}