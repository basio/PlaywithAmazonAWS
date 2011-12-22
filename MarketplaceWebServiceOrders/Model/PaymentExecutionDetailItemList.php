<?php
/** 
 *  PHP Version 5
 *
 *  @category    Amazon
 *  @package     MarketplaceWebServiceOrders
 *  @copyright   Copyright 2008-2009 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *  @link        http://aws.amazon.com
 *  @license     http://aws.amazon.com/apache2.0  Apache License, Version 2.0
 *  @version     2011-01-01
 */
/******************************************************************************* 
 *    __  _    _  ___ 
 *   (  )( \/\/ )/ __)
 *   /__\ \    / \__ \
 *  (_)(_) \/\/  (___/
 * 
 *  Marketplace Web Service Orders PHP5 Library
 *  Generated: Mon Sep 12 23:21:32 GMT 2011
 * 
 */

/**
 *  @see MarketplaceWebServiceOrders_Model
 */
require_once ('MarketplaceWebServiceOrders/Model.php');  

    

/**
 * MarketplaceWebServiceOrders_Model_PaymentExecutionDetailItemList
 * 
 * Properties:
 * <ul>
 * 
 * <li>PaymentItem: MarketplaceWebServiceOrders_Model_PaymentExecutionDetailItem</li>
 *
 * </ul>
 */ 
class MarketplaceWebServiceOrders_Model_PaymentExecutionDetailItemList extends MarketplaceWebServiceOrders_Model
{


    /**
     * Construct new MarketplaceWebServiceOrders_Model_PaymentExecutionDetailItemList
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>PaymentItem: MarketplaceWebServiceOrders_Model_PaymentExecutionDetailItem</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'PaymentItem' => array('FieldValue' => array(), 'FieldType' => array('MarketplaceWebServiceOrders_Model_PaymentExecutionDetailItem')),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the PaymentItem.
     * 
     * @return array of PaymentExecutionDetailItem PaymentItem
     */
    public function getPaymentItem() 
    {
        return $this->_fields['PaymentItem']['FieldValue'];
    }

    /**
     * Sets the value of the PaymentItem.
     * 
     * @param mixed PaymentExecutionDetailItem or an array of PaymentExecutionDetailItem PaymentItem
     * @return this instance
     */
    public function setPaymentItem($paymentItem) 
    {
        if (!$this->_isNumericArray($paymentItem)) {
            $paymentItem =  array ($paymentItem);    
        }
        $this->_fields['PaymentItem']['FieldValue'] = $paymentItem;
        return $this;
    }


    /**
     * Sets single or multiple values of PaymentItem list via variable number of arguments. 
     * For example, to set the list with two elements, simply pass two values as arguments to this function
     * <code>withPaymentItem($paymentItem1, $paymentItem2)</code>
     * 
     * @param PaymentExecutionDetailItem  $paymentExecutionDetailItemArgs one or more PaymentItem
     * @return MarketplaceWebServiceOrders_Model_PaymentExecutionDetailItemList  instance
     */
    public function withPaymentItem($paymentExecutionDetailItemArgs)
    {
        foreach (func_get_args() as $paymentItem) {
            $this->_fields['PaymentItem']['FieldValue'][] = $paymentItem;
        }
        return $this;
    }   



    /**
     * Checks if PaymentItem list is non-empty
     * 
     * @return bool true if PaymentItem list is non-empty
     */
    public function isSetPaymentItem()
    {
        return count ($this->_fields['PaymentItem']['FieldValue']) > 0;
    }




}