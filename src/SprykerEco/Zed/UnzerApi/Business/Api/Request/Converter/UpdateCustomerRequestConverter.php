<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use Generated\Shared\Transfer\UnzerAddressTransfer;
use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class UpdateCustomerRequestConverter implements UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array<string, array<string, string|null>|string|null>
     */
    public function convertUnzerApiRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
    {
        $unzerApiUpdateCustomerRequestTransfer = $unzerApiRequestTransfer->getUpdateCustomerRequestOrFail();

        return [
            UnzerApiRequestConstants::PARAM_LASTNAME => $unzerApiUpdateCustomerRequestTransfer->getLastname(),
            UnzerApiRequestConstants::PARAM_FIRSTNAME => $unzerApiUpdateCustomerRequestTransfer->getFirstname(),
            UnzerApiRequestConstants::PARAM_SALUTATION => $unzerApiUpdateCustomerRequestTransfer->getSalutation(),
            UnzerApiRequestConstants::PARAM_COMPANY => $unzerApiUpdateCustomerRequestTransfer->getCompany(),
            UnzerApiRequestConstants::PARAM_CUSTOMER_ID => $unzerApiUpdateCustomerRequestTransfer->getCustomerId(),
            UnzerApiRequestConstants::PARAM_BIRTH_DATE => $unzerApiUpdateCustomerRequestTransfer->getBirthDate(),
            UnzerApiRequestConstants::PARAM_EMAIL => $unzerApiUpdateCustomerRequestTransfer->getEmail(),
            UnzerApiRequestConstants::PARAM_PHONE => $unzerApiUpdateCustomerRequestTransfer->getPhone(),
            UnzerApiRequestConstants::PARAM_MOBILE => $unzerApiUpdateCustomerRequestTransfer->getMobile(),
            UnzerApiRequestConstants::PARAM_BILLING_ADDRESS => $this->convertAddress($unzerApiUpdateCustomerRequestTransfer->getBillingAddress()),
            UnzerApiRequestConstants::PARAM_SHIPPING_ADDRESS => $this->convertAddress($unzerApiUpdateCustomerRequestTransfer->getShippingAddress()),
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
