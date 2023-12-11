<?php

declare(strict_types = 1);

namespace MT\Hobby\ViewModel;

use Magento\Customer\Model\ResourceModel\CustomerRepository;
use Magento\Customer\Model\Session;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use MT\Hobby\Model\Customer\Attribute\Source\Hobby;
use MT\Hobby\Setup\Patch\Data\AddHobbyCustomerAttribute;

class AccountHobby implements ArgumentInterface
{
    public function __construct(
        private readonly Hobby $hobbySource,
        private readonly Session $session,
        private readonly CustomerRepository $customerRepository
    ) {
    }


    /**
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function getHobby(): ?string
    {
        return $this->customerRepository
            ->getById($this->session->getId())
            ->getCustomAttribute(AddHobbyCustomerAttribute::ATTRIBUTE_CODE)
            ->getValue();
    }

    /**
     * @return array<array>
     */
    public function getHobbiesList(): array
    {
        return $this->hobbySource->getAllOptions();
    }
}
