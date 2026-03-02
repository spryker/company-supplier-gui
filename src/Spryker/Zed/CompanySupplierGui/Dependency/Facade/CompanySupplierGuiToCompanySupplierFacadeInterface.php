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

interface CompanySupplierGuiToCompanySupplierFacadeInterface
{
    public function getCompanyTypes(): CompanyTypeCollectionTransfer;

    public function getAllSuppliers(): CompanySupplierCollectionTransfer;

    public function getSuppliersByIdProduct(int $idProduct): CompanySupplierCollectionTransfer;

    public function saveCompanySupplierRelationsForProductConcrete(ProductConcreteTransfer $productConcreteTransfer): void;

    public function getCompanyTypeByIdCompanyType(int $idCompanyType): SpyCompanyTypeEntityTransfer;
}
