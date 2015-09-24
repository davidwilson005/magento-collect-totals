<?php

class Drw_AdjustTotal_Model_Order_Creditmemo_Total_AdjustTotal extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract {

    public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo) {

        // get order
        $order = $creditmemo->getOrder();

        // clear creditmemo adjustment amount
        $creditmemo->setBaseAdjustTotalAmount(0);
        $creditmemo->setAdjustTotalAmount(0);

        // get order adjustment amount
        $baseAdjustTotalAmount = (float)$order->getBaseAdjustTotalAmount();
        $adjustTotalAmount = (float)$order->getAdjustTotalAmount();

        // only add adjustment to the first creditmemo
        if (($adjustTotalAmount != 0) && (count($order->getCreditmemosCollection()) == 0)) {

            // set creditmemo total
            $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $adjustTotalAmount);
            $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $baseAdjustTotalAmount);

            // set adjustment amount to creditmemo
            $creditmemo->setBaseAdjustTotalAmount($baseAdjustTotalAmount);
            $creditmemo->setAdjustTotalAmount($adjustTotalAmount);
        }

        return $this;
    }
}