<?php

class Dutycalculator_Charge_Block_Sales_Order_View_Items_Renderer
	extends Mage_Adminhtml_Block_Sales_Order_View_Items_Renderer_Default
{
	public function displayRowTotal()
	{
		$item = $this->getItem();

		$basePrice = $item->getBaseRowTotal() + $item->getBaseWeeeTaxAppliedRowAmount() - $item->getBaseDiscountAmount()
			+ $item->getBaseTaxAmount() + $item->getBaseHiddenTaxAmount() + $item->getBaseImportDutyTax();

		$price = $item->getRowTotal() + $item->getWeeeTaxAppliedRowAmount() - $item->getDiscountAmount()
			+ $item->getTaxAmount() + $item->getHiddenTaxAmount() + $item->getImportDutyTax();

		return $this->displayPrices($basePrice, $price);
	}

    public function isTaxPrecentagesEnabled()
    {
        return $this->helper('dccharge')->enabledShowTax();
    }
}
