<?php

include_once ('config.inc.php'); 
require ('db.php'); 

DB::Init();

$config = array (
  'ServiceURL' => MWS_ENDPOINT_URL,
  'ProxyHost' => null,
  'ProxyPort' => -1,
  'MaxErrorRetry' => 3
);

/************************************************************************
 * Instantiate Implementation of FBAInventoryServiceMWS
 * 
 * ACCESS_KEY_ID and SECRET_ACCESS_KEY constants 
 * are defined in the .config.inc.php located in the same 
 * directory as this sample
 ***********************************************************************/
 $service = new FBAInventoryServiceMWS_Client(
     ACCESS_KEY_ID, 
     SECRET_ACCESS_KEY, 
     $config,
     APPLICATION_NAME,
     APPLICATION_VERSION);
 
 //***********************************************************************/
 $request = new FBAInventoryServiceMWS_Model_ListInventorySupplyRequest();
 $request->setSellerId(SELLER_ID);
 $request->setMarketplace(MARKETPLACE_ID);
 $request->setQueryStartDateTime('2010-01-10');
 invokeListInventorySupplyAndupdateQuantity($service, $request);
DB::Close();
                            
/**
  * List Inventory Supply Action Sample
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
  * @param FBAInventoryServiceMWS_Interface $service instance of FBAInventoryServiceMWS_Interface
  * @param mixed $request FBAInventoryServiceMWS_Model_ListInventorySupply or array of parameters
  */
  function invokeListInventorySupplyAndupdateQuantity(FBAInventoryServiceMWS_Interface $service, $request) 
  {
      try {
              $response = $service->listInventorySupply($request);
              
                echo ("Service Response\n");
                echo ("=============================================================================\n");

                echo("        ListInventorySupplyResponse\n");
                if ($response->isSetListInventorySupplyResult()) { 
                    echo("            ListInventorySupplyResult\n");
                    $listInventorySupplyResult = $response->getListInventorySupplyResult();
                    if ($listInventorySupplyResult->isSetInventorySupplyList()) { 
                        echo("                InventorySupplyList\n");
                        $inventorySupplyList = $listInventorySupplyResult->getInventorySupplyList();
                        $memberList = $inventorySupplyList->getmember();
                        foreach ($memberList as $member) {
                            if ($member->isSetSellerSKU() && $member->isSetInStockSupplyQuantity()) {
                                 $q="update inventory set qty=".$member->getInStockSupplyQuantity(). 
                                    " where  sku='".$member->getSellerSKU()."'";
                             mysql_query($q);   
                           }                             
                               
                            echo("                <BR>    member\n");
                            if ($member->isSetSellerSKU()) 
                            {
                                echo("                        SellerSKU\n");
                                echo("                            " . $member->getSellerSKU() . "\n");
                            }
                            if ($member->isSetFNSKU()) 
                            {
                                echo("                        FNSKU\n");
                                echo("                            " . $member->getFNSKU() . "\n");
                            }
                            if ($member->isSetASIN()) 
                            {
                                echo("                        ASIN\n");
                                echo("                            " . $member->getASIN() . "\n");
                            }
                            if ($member->isSetCondition()) 
                            {
                                echo("                        Condition\n");
                                echo("                            " . $member->getCondition() . "\n");
                            }
                            if ($member->isSetTotalSupplyQuantity()) 
                            {
                                echo("                        TotalSupplyQuantity\n");
                                echo("                            " . $member->getTotalSupplyQuantity() . "\n");
                            }
                            if ($member->isSetInStockSupplyQuantity()) 
                            {
                                echo("                        InStockSupplyQuantity\n");
                                echo("                            " . $member->getInStockSupplyQuantity() . "\n");
                            }
                            if ($member->isSetEarliestAvailability()) { 
                                echo("                        EarliestAvailability\n");
                                $earliestAvailability = $member->getEarliestAvailability();
                                if ($earliestAvailability->isSetTimepointType()) 
                                {
                                    echo("                            TimepointType\n");
                                    echo("                                " . $earliestAvailability->getTimepointType() . "\n");
                                }
                                if ($earliestAvailability->isSetDateTime()) 
                                {
                                    echo("                            DateTime\n");
                                    echo("                                " . $earliestAvailability->getDateTime() . "\n");
                                }
                            } 
                            if ($member->isSetSupplyDetail()) { 
                                echo("                        SupplyDetail\n");
                                $supplyDetail = $member->getSupplyDetail();
                                $member1List = $supplyDetail->getmember();
                                foreach ($member1List as $member1) {
                                    echo("                            member\n");
                                    if ($member1->isSetQuantity()) 
                                    {
                                        echo("                                Quantity\n");
                                        echo("                                    " . $member1->getQuantity() . "\n");
                                    }
                                    if ($member1->isSetSupplyType()) 
                                    {
                                        echo("                                SupplyType\n");
                                        echo("                                    " . $member1->getSupplyType() . "\n");
                                    }
                                    if ($member1->isSetEarliestAvailableToPick()) { 
                                        echo("                                EarliestAvailableToPick\n");
                                        $earliestAvailableToPick = $member1->getEarliestAvailableToPick();
                                        if ($earliestAvailableToPick->isSetTimepointType()) 
                                        {
                                            echo("                                    TimepointType\n");
                                            echo("                                        " . $earliestAvailableToPick->getTimepointType() . "\n");
                                        }
                                        if ($earliestAvailableToPick->isSetDateTime()) 
                                        {
                                            echo("                                    DateTime\n");
                                            echo("                                        " . $earliestAvailableToPick->getDateTime() . "\n");
                                        }
                                    } 
                                    if ($member1->isSetLatestAvailableToPick()) { 
                                        echo("                                LatestAvailableToPick\n");
                                        $latestAvailableToPick = $member1->getLatestAvailableToPick();
                                        if ($latestAvailableToPick->isSetTimepointType()) 
                                        {
                                            echo("                                    TimepointType\n");
                                            echo("                                        " . $latestAvailableToPick->getTimepointType() . "\n");
                                        }
                                        if ($latestAvailableToPick->isSetDateTime()) 
                                        {
                                            echo("                                    DateTime\n");
                                            echo("                                        " . $latestAvailableToPick->getDateTime() . "\n");
                                        }
                                    } 
                                }
                            } 
                        }
                    } 
                    if ($listInventorySupplyResult->isSetNextToken()) 
                    {
                        echo("                NextToken\n");
                        echo("                    " . $listInventorySupplyResult->getNextToken() . "\n");
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

     } catch (FBAInventoryServiceMWS_Exception $ex) {
         echo("Caught Exception: " . $ex->getMessage() . "\n");
         echo("Response Status Code: " . $ex->getStatusCode() . "\n");
         echo("Error Code: " . $ex->getErrorCode() . "\n");
         echo("Error Type: " . $ex->getErrorType() . "\n");
         echo("Request ID: " . $ex->getRequestId() . "\n");
         echo("XML: " . $ex->getXML() . "\n");
     }
 }
        
