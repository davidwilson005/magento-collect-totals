<?php

class Drw_AdjustTotal_Block_Sales_Order_Invoice_Total extends Mage_Sales_Block_Order_Totals {

    public function initTotals() {

        if ((float)$this->getParentBlock()->getInvoice()->getAdjustTotalAmount() != 0.00) {

            $this->getParentBlock()->addTotalBefore(new Varien_Object(array(
                'code'   => 'adjust_total',
                'strong' => false,
                'label'  => Mage::helper('adjusttotal')->__("Adjust Total"),
                'value'  => $this->getParentBlock()->getInvoice()->getAdjustTotalAmount()
            )), 'shipping');
        }

        return $this;
    }
}