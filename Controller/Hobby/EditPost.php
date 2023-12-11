<?php

declare(strict_types = 1);

namespace MT\Hobby\Controller\Hobby;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Escaper;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\State\InputMismatchException;
use Magento\Framework\Message\ManagerInterface;

class EditPost implements HttpPostActionInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly RedirectFactory $resultRedirectFactory,
        private readonly CustomerRepositoryInterface $customerRepository,
        private readonly Session $session,
        private readonly ManagerInterface $messageManager,
        private readonly Escaper $escaper
    ) {
    }

    /**
     * Execute action based on request and return result
     *
     * @return ResultInterface|ResponseInterface
     * @throws InputException
     * @throws LocalizedException
     * @throws NoSuchEntityException
     * @throws InputMismatchException
     */
    public function execute(): ResultInterface|ResponseInterface
    {
        if ($this->request->isPost()) {
            try {
                $customer = $this->customerRepository->getById($this->session->getId());
                $customer->getExtensionAttributes()->setHobby($this->request->getParam('hobby'));
                $this->customerRepository->save($customer);
                $this->messageManager->addSuccessMessage(__('You saved the Hobby attribute.'));
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($this->escaper->escapeHtml($e->getMessage()));
                foreach ($e->getErrors() as $error) {
                    $this->messageManager->addErrorMessage($this->escaper->escapeHtml($error->getMessage()));
                }
            }
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('customer/account');

        return $resultRedirect;
    }
}
