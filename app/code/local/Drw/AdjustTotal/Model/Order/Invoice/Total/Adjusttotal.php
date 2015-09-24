<?php

class Drw_AdjustTotal_Model_Order_Invoice_Total_AdjustTotal extends Mage_Sales_Model_Order_Invoice_Total_Abstract {

    public function collect(Mage_Sales_Model_Order_Invoice $invoice) {

        // get order
        $order = $invoice->getOrder();

        // clear invoice adjustment amount
        $invoice->setBaseAdjustTotalAmount(0);
        $invoice->setAdjustTotalAmount(0);

        // get order adjustment amount
        $baseAdjustTotalAmount = (float)$order->getBaseAdjustTotalAmount();
        $adjustTotalAmount = (float)$order->getAdjustTotalAmount();

        // only add adjustment to the first invoice
        if (($adjustTotalAmount != 0) && (count($order->getInvoiceCollection()) == 0)) {

            // set invoice total
            $invoice->setGrandTotal($invoice->getGrandTotal() + $adjustTotalAmount);
            $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $baseAdjustTotalAmount);

            // set adjustment amount to invoice
            $invoice->setBaseAdjustTotalAmount($baseAdjustTotalAmount);
            $invoice->setAdjustTotalAmount($adjustTotalAmount);
        }

        return $this;
    }
}