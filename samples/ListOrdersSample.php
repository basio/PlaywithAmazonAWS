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
 *  Marketplace Web Service Orders PHP5 Library
 *  Generated: Fri Jan 21 18:53:17 UTC 2011
 * 
 */

/**
 * List Orders  Sample
 */

include_once ('config.inc.php'); 

 $config = array (
   'ServiceURL' => MWS_ENDPOINT_Orders_URL,
   'ProxyHost' => null,
   'ProxyPort' => -1,
   'MaxErrorRetry' => 3,
 );
 $service = new MarketplaceWebServiceOrders_Client(
        AWS_ACCESS_KEY_ID,
        AWS_SECRET_ACCESS_KEY,
        APPLICATION_NAME,
        APPLICATION_VERSION,
        $config);

/************************************************************************
 * Setup request parameters and uncomment invoke to try out 
 * sample for List Orders Action
 ***********************************************************************/
 $request = new MarketplaceWebServiceOrders_Model_ListOrdersRequest();
 $request->setSellerId(MERCHANT_ID);

 // List all orders udpated after a certain date
 $request->setCreatedAfter(new DateTime('2010-01-01 12:00:00', new DateTimeZone('UTC')));

 // Set the marketplaces queried in this ListOrdersRequest
 $marketplaceIdList = new MarketplaceWebServiceOrders_Model_MarketplaceIdList();
 $marketplaceIdList->setId(array(MARKETPLACE_ID));
 $request->setMarketplaceId($marketplaceIdList);

 // Set the order statuses for this ListOrdersRequest (optional)
 // $orderStatuses = new MarketplaceWebServiceOrders_Model_OrderStatusList();
 // $orderStatuses->setStatus(array('Shipped'));
 // $request->setOrderStatus($orderStatuses);

 // Set the Fulfillment Channel for this ListOrdersRequest (optional)
 //$fulfillmentChannels = new MarketplaceWebServiceOrders_Model_FulfillmentChannelList();
 //$fulfillmentChannels->setChannel(array('MFN'));
 //$request->setFulfillmentChannel($fulfillmentChannels);

 // @TODO: set request. Action can be passed as MarketplaceWebServiceOrders_Model_ListOrdersRequest
 // object or array of parameters
 invokeListOrders($service, $request);

                                        
/**
  * List Orders Action Sample
  * ListOrders can be used to find orders that meet the specified criteria.
  *   
  * @param MarketplaceWebServiceOrders_Interface $service instance of MarketplaceWebServiceOrders_Interface
  * @param mixed $request MarketplaceWebServiceOrders_Model_ListOrders or array of parameters
  */
  function invokeListOrders(MarketplaceWebServiceOrders_Interface $service, $request) 
  {
      try {
              $response = $service->listOrders($request);

                echo ("Service Response\n");
                echo ("=============================================================================\n");

                echo("        ListOrdersResponse\n");
                if ($response->isSetListOrdersResult()) { 
                    echo("            ListOrdersResult\n");
                    $listOrdersResult = $response->getListOrdersResult();
                    if ($listOrdersResult->isSetNextToken()) 
                    {
                        echo("                NextToken\n");
                        echo("                    " . $listOrdersResult->getNextToken() . "\n");
                    }
                    if ($listOrdersResult->isSetCreatedBefore()) 
                    {
                        echo("                CreatedBefore\n");
                        echo("                    " . $listOrdersResult->getCreatedBefore() . "\n");
                    }
                    if ($listOrdersResult->isSetLastUpdatedBefore()) 
                    {
                        echo("                LastUpdatedBefore\n");
                        echo("                    " . $listOrdersResult->getLastUpdatedBefore() . "\n");
                    }
                    if ($listOrdersResult->isSetOrders()) { 
                        echo("                Orders\n");
                        $orders = $listOrdersResult->getOrders();
                        $orderList = $orders->getOrder();
                        foreach ($orderList as $order) {
                            echo("                    Order\n");
                            if ($order->isSetAmazonOrderId()) 
                            {
                                echo("                        AmazonOrderId\n");
                                echo("                            " . $order->getAmazonOrderId() . "\n");
                            }
                            if ($order->isSetSellerOrderId()) 
                            {
                                echo("                        SellerOrderId\n");
                                echo("                            " . $order->getSellerOrderId() . "\n");
                            }
                            if ($order->isSetPurchaseDate()) 
                            {
                                echo("                        PurchaseDate\n");
                                echo("                            " . $order->getPurchaseDate() . "\n");
                            }
                            if ($order->isSetLastUpdateDate()) 
                            {
                                echo("                        LastUpdateDate\n");
                                echo("                            " . $order->getLastUpdateDate() . "\n");
                            }
                            if ($order->isSetOrderStatus()) 
                            {
                                echo("                        OrderStatus\n");
                                echo("                            " . $order->getOrderStatus() . "\n");
                            }
                            if ($order->isSetFulfillmentChannel()) 
                            {
                                echo("                        FulfillmentChannel\n");
                                echo("                            " . $order->getFulfillmentChannel() . "\n");
                            }
                            if ($order->isSetSalesChannel()) 
                            {
                                echo("                        SalesChannel\n");
                                echo("                            " . $order->getSalesChannel() . "\n");
                            }
                            if ($order->isSetOrderChannel()) 
                            {
                                echo("                        OrderChannel\n");
                                echo("                            " . $order->getOrderChannel() . "\n");
                            }
                            if ($order->isSetShipServiceLevel()) 
                            {
                                echo("                        ShipServiceLevel\n");
                                echo("                            " . $order->getShipServiceLevel() . "\n");
                            }
                            if ($order->isSetShippingAddress()) { 
                                echo("                        ShippingAddress\n");
                                $shippingAddress = $order->getShippingAddress();
                                if ($shippingAddress->isSetName()) 
                                {
                                    echo("                            Name\n");
                                    echo("                                " . $shippingAddress->getName() . "\n");
                                }
                                if ($shippingAddress->isSetAddressLine1()) 
                                {
                                    echo("                            AddressLine1\n");
                                    echo("                                " . $shippingAddress->getAddressLine1() . "\n");
                                }
                                if ($shippingAddress->isSetAddressLine2()) 
                                {
                                    echo("                            AddressLine2\n");
                                    echo("                                " . $shippingAddress->getAddressLine2() . "\n");
                                }
                                if ($shippingAddress->isSetAddressLine3()) 
                                {
                                    echo("                            AddressLine3\n");
                                    echo("                                " . $shippingAddress->getAddressLine3() . "\n");
                                }
                                if ($shippingAddress->isSetCity()) 
                                {
                                    echo("                            City\n");
                                    echo("                                " . $shippingAddress->getCity() . "\n");
                                }
                                if ($shippingAddress->isSetCounty()) 
                                {
                                    echo("                            County\n");
                                    echo("                                " . $shippingAddress->getCounty() . "\n");
                                }
                                if ($shippingAddress->isSetDistrict()) 
                                {
                                    echo("                            District\n");
                                    echo("                                " . $shippingAddress->getDistrict() . "\n");
                                }
                                if ($shippingAddress->isSetStateOrRegion()) 
                                {
                                    echo("                            StateOrRegion\n");
                                    echo("                                " . $shippingAddress->getStateOrRegion() . "\n");
                                }
                                if ($shippingAddress->isSetPostalCode()) 
                                {
                                    echo("                            PostalCode\n");
                                    echo("                                " . $shippingAddress->getPostalCode() . "\n");
                                }
                                if ($shippingAddress->isSetCountryCode()) 
                                {
                                    echo("                            CountryCode\n");
                                    echo("                                " . $shippingAddress->getCountryCode() . "\n");
                                }
                                if ($shippingAddress->isSetPhone()) 
                                {
                                    echo("                            Phone\n");
                                    echo("                                " . $shippingAddress->getPhone() . "\n");
                                }
                            } 
                            if ($order->isSetOrderTotal()) { 
                                echo("                        OrderTotal\n");
                                $orderTotal = $order->getOrderTotal();
                                if ($orderTotal->isSetCurrencyCode()) 
                                {
                                    echo("                            CurrencyCode\n");
                                    echo("                                " . $orderTotal->getCurrencyCode() . "\n");
                                }
                                if ($orderTotal->isSetAmount()) 
                                {
                                    echo("                            Amount\n");
                                    echo("                                " . $orderTotal->getAmount() . "\n");
                                }
                            } 
                            if ($order->isSetNumberOfItemsShipped()) 
                            {
                                echo("                        NumberOfItemsShipped\n");
                                echo("                            " . $order->getNumberOfItemsShipped() . "\n");
                            }
                            if ($order->isSetNumberOfItemsUnshipped()) 
                            {
                                echo("                        NumberOfItemsUnshipped\n");
                                echo("                            " . $order->getNumberOfItemsUnshipped() . "\n");
                            }
                            if ($order->isSetMarketplaceId()) 
                            {
                                echo("                        MarketplaceId\n");
                                echo("                            " . $order->getMarketplaceId() . "\n");
                            }
                            if ($order->isSetBuyerEmail()) 
                            {
                                echo("                        BuyerEmail\n");
                                echo("                            " . $order->getBuyerEmail() . "\n");
                            }
                            if ($order->isSetBuyerName()) 
                            {
                                echo("                        BuyerName\n");
                                echo("                            " . $order->getBuyerName() . "\n");
                            }
                            if ($order->isSetShipmentServiceLevelCategory()) 
                            {
                                echo("                        ShipmentServiceLevelCategory\n");
                                echo("                            " . $order->getShipmentServiceLevelCategory() . "\n");
                            }
                        }
                    } 
                } 
                if ($response->isSetResponseMetadata()) { 
                    echo("            ResponseMetadata\n");
                    $responseMetadata = $response->getResponseMetadata();
                    if ($responseMetadata->isSetRequestId()) 
                    {
                        echo("                RequestId\n");
                        echo("                    " . $responseMetadata->getRequestId() . "\n");
                    }
                } 

     } catch (MarketplaceWebServiceOrders_Exception $ex) {
         echo("Caught Exception: " . $ex->getMessage() . "\n");
         echo("Response Status Code: " . $ex->getStatusCode() . "\n");
         echo("Error Code: " . $ex->getErrorCode() . "\n");
         echo("Error Type: " . $ex->getErrorType() . "\n");
         echo("Request ID: " . $ex->getRequestId() . "\n");
         echo("XML: " . $ex->getXML() . "\n");
     }
 }
        
