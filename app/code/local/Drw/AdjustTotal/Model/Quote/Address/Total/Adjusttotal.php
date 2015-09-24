<?php

class Drw_AdjustTotal_Model_Quote_Address_Total_AdjustTotal extends Mage_Sales_Model_Quote_Address_Total_Abstract {

    public function __construct() {
        $this->setCode('adjust_total_amount');
    }

    public function collect(Mage_Sales_Model_Quote_Address $address) {

        parent::collect($address);

        // make sure this quote has items (could be billing address)
        $itemArray = $this->_getAddressItems($address);
        if (count($itemArray) == 0) return $this;

        // set adjustment amount, this is used for custom adjustment
        // can be positive for a fee, like "convenience fee"
        // can be negative for a discount, like a "automatic savings"
        // can be a flat amount or a percent, like a percentage of the subtotal
        $adjustTotalPercent = 5.00;

        // get quote
        $quote = $address->getQuote();

        // calculate adjustment amount on subtotal
        $baseAdjustTotalAmount = $quote->getStore()->roundPrice((float) $address->getBaseTotalAmount('subtotal') * ($adjustTotalPercent / 100));
        $adjustTotalAmount = Mage::app()->getStore()->convertPrice($baseAdjustTotalAmount);

        // set amount to quote
        $address->setBaseAdjustTotalAmount($baseAdjustTotalAmount);
        $address->setAdjustTotalAmount($adjustTotalAmount);

        // set amount to quote total
        $this->_setBaseAmount($baseAdjustTotalAmount);
        $this->_setAmount($adjustTotalAmount);

        return $this;
    }

    public function fetch(Mage_Sales_Model_Quote_Address $address) {

        parent::fetch($address);

        $amount = (float)$address->getTotalAmount($this->getCode());

        if ($amount != 0) {
            $address->addTotal(array(
                'code' => $this->getCode(),
                'title' => Mage::helper('adjusttotal')->__("Adjust Total"),
                'value' => $amount
            ));
        }

        return $this;
    }
}
