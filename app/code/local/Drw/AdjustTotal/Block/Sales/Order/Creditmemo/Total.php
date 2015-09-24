<?php

class Drw_AdjustTotal_Block_Sales_Order_Creditmemo_Total extends Mage_Sales_Block_Order_Totals {

    public function initTotals() {

        if ((float)$this->getParentBlock()->getCreditmemo()->getAdjustTotalAmount() != 0.00) {

            $this->getParentBlock()->addTotalBefore(new Varien_Object(array(
                'code'  => 'adjust_total',
                'label' => Mage::helper('adjusttotal')->__("Adjust Total"),
                'value' => $this->getParentBlock()->getCreditmemo()->getAdjustTotalAmount()
            )), 'shipping');
        }

        return $this;
    }
}
