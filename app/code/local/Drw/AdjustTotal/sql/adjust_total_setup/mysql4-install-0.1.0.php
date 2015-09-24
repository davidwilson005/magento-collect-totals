<?php
$installer = $this;
$installer->startSetup();

$installer->addAttribute('quote', 'base_adjust_total_amount', array('type' => 'decimal'));
$installer->addAttribute('quote', 'adjust_total_amount', array('type' => 'decimal'));

$installer->addAttribute('quote_address', 'base_adjust_total_amount', array('type' => 'decimal'));
$installer->addAttribute('quote_address', 'adjust_total_amount', array('type' => 'decimal'));

$installer->addAttribute('order', 'base_adjust_total_amount', array('type' => 'decimal'));
$installer->addAttribute('order', 'adjust_total_amount', array('type' => 'decimal'));

$installer->addAttribute('invoice', 'base_adjust_total_amount', array('type' => 'decimal'));
$installer->addAttribute('invoice', 'adjust_total_amount', array('type' => 'decimal'));

$installer->addAttribute('creditmemo', 'base_adjust_total_amount', array('type' => 'decimal'));
$installer->addAttribute('creditmemo', 'adjust_total_amount', array('type' => 'decimal'));

$installer->endSetup();
