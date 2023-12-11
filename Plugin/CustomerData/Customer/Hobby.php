<?php

namespace MT\Hobby\Plugin\CustomerData\Customer;

use Magento\Customer\CustomerData\Customer;
use Magento\Customer\Helper\Session\CurrentCustomer;
use MT\Hobby\Model\Customer\Attribute\Source\Hobby as HobbyAlias;
use MT\Hobby\Setup\Patch\Data\AddHobbyCustomerAttribute;

class Hobby
{
    /**
     * @param CurrentCustomer $currentCustomer
     */
    public function __construct(
        private readonly CurrentCustomer $currentCustomer,
        private readonly HobbyAlias $attributeSource
    ) {
    }


    /**
     * @param Customer $subject
     * @param array $result
     * @return array
     */
    public function afterGetSectionData(Customer $subject, array $result): array
    {
        $customer = $this->currentCustomer->getCustomer();
        return array_merge(
            $result,
            [
                'hobby' => $this->attributeSource->getOptionText(
                    $customer->getCustomAttribute(AddHobbyCustomerAttribute::ATTRIBUTE_CODE)->getValue()
                )
            ]
        );
    }
}
