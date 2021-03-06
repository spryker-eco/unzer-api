<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use Generated\Shared\Transfer\UnzerAddressTransfer;
use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class CreateCustomerRequestConverter implements UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array<string, array<string, string|null>|string|null>
     */
    public function convertUnzerApiRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
    {
        $unzerApiCreateCustomerRequestTransfer = $unzerApiRequestTransfer->getCreateCustomerRequestOrFail();

        return [
            UnzerApiRequestConstants::PARAM_LASTNAME => $unzerApiCreateCustomerRequestTransfer->getLastname(),
            UnzerApiRequestConstants::PARAM_FIRSTNAME => $unzerApiCreateCustomerRequestTransfer->getFirstname(),
            UnzerApiRequestConstants::PARAM_SALUTATION => $unzerApiCreateCustomerRequestTransfer->getSalutation(),
            UnzerApiRequestConstants::PARAM_COMPANY => $unzerApiCreateCustomerRequestTransfer->getCompany(),
            UnzerApiRequestConstants::PARAM_CUSTOMER_ID => $unzerApiCreateCustomerRequestTransfer->getCustomerId(),
            UnzerApiRequestConstants::PARAM_BIRTH_DATE => $unzerApiCreateCustomerRequestTransfer->getBirthDate(),
            UnzerApiRequestConstants::PARAM_EMAIL => $unzerApiCreateCustomerRequestTransfer->getEmail(),
            UnzerApiRequestConstants::PARAM_PHONE => $unzerApiCreateCustomerRequestTransfer->getPhone(),
            UnzerApiRequestConstants::PARAM_MOBILE => $unzerApiCreateCustomerRequestTransfer->getMobile(),
            UnzerApiRequestConstants::PARAM_BILLING_ADDRESS => $this->convertAddress($unzerApiCreateCustomerRequestTransfer->getBillingAddressOrFail()),
            UnzerApiRequestConstants::PARAM_SHIPPING_ADDRESS => $this->convertAddress($unzerApiCreateCustomerRequestTransfer->getShippingAddressOrFail()),
        ];
    }

    /**
     * @param \Generated\Shared\Transfer\UnzerAddressTransfer $unzerAddressTransfer
     *
     * @return array<string, string|null>
     */
    protected function convertAddress(UnzerAddressTransfer $unzerAddressTransfer): array
    {
        return [
            UnzerApiRequestConstants::PARAM_ADDRESS_NAME => $unzerAddressTransfer->getName(),
            UnzerApiRequestConstants::PARAM_ADDRESS_STREET => $unzerAddressTransfer->getStreet(),
            UnzerApiRequestConstants::PARAM_ADDRESS_STATE => $unzerAddressTransfer->getState(),
            UnzerApiRequestConstants::PARAM_ADDRESS_ZIP => $unzerAddressTransfer->getZip(),
            UnzerApiRequestConstants::PARAM_ADDRESS_CITY => $unzerAddressTransfer->getCity(),
            UnzerApiRequestConstants::PARAM_ADDRESS_COUNTRY => $unzerAddressTransfer->getCountry(),
        ];
    }
}
