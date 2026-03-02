<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CompanySupplierGui\Dependency\Facade;

use Generated\Shared\Transfer\CompanySupplierCollectionTransfer;
use Generated\Shared\Transfer\CompanyTypeCollectionTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Generated\Shared\Transfer\SpyCompanyTypeEntityTransfer;

class CompanySupplierGuiToCompanySupplierFacadeBridge implements CompanySupplierGuiToCompanySupplierFacadeInterface
{
    /**
     * @var \Spryker\Zed\CompanySupplier\Business\CompanySupplierFacadeInterface
     */
    protected $companySupplierFacade;

    /**
     * @param \Spryker\Zed\CompanySupplier\Business\CompanySupplierFacadeInterface $companySupplierFacade
     */
    public function __construct($companySupplierFacade)
    {
        $this->companySupplierFacade = $companySupplierFacade;
    }

    public function getAllSuppliers(): CompanySupplierCollectionTransfer
    {
        return $this->companySupplierFacade->getAllSuppliers();
    }

    public function getSuppliersByIdProduct(int $idProduct): CompanySupplierCollectionTransfer
    {
        return $this->companySupplierFacade->getSuppliersByIdProduct($idProduct);
    }

    public function saveCompanySupplierRelationsForProductConcrete(ProductConcreteTransfer $productConcreteTransfer): void
    {
        $this->companySupplierFacade->saveCompanySupplierRelationsForProductConcrete($productConcreteTransfer);
    }

    public function getCompanyTypes(): CompanyTypeCollectionTransfer
    {
        return $this->companySupplierFacade->getCompanyTypes();
    }

    public function getCompanyTypeByIdCompanyType(int $idCompanyType): SpyCompanyTypeEntityTransfer
    {
        return $this->companySupplierFacade->getCompanyTypeByIdCompanyType($idCompanyType);
    }
}
