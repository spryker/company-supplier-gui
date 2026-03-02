<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CompanySupplierGui\Communication;

use Orm\Zed\Product\Persistence\SpyProductQuery;
use Spryker\Zed\CompanySupplierGui\Communication\Form\CompanySupplierForm;
use Spryker\Zed\CompanySupplierGui\Communication\Form\CompanyTypeChoiceFormType;
use Spryker\Zed\CompanySupplierGui\Communication\Form\DataProvider\CompanySupplierFormDataProvider;
use Spryker\Zed\CompanySupplierGui\Communication\Form\DataProvider\CompanyTypeChoiceFormDataProvider;
use Spryker\Zed\CompanySupplierGui\Communication\Table\ProductSupplierTable;
use Spryker\Zed\CompanySupplierGui\CompanySupplierGuiDependencyProvider;
use Spryker\Zed\CompanySupplierGui\Dependency\Facade\CompanySupplierGuiToCompanySupplierFacadeInterface;
use Spryker\Zed\CompanySupplierGui\Dependency\Facade\CompanySupplierGuiToCurrencyFacadeInterface;
use Spryker\Zed\CompanySupplierGui\Dependency\Facade\CompanySupplierGuiToMoneyFacadeInterface;
use Spryker\Zed\CompanySupplierGui\Dependency\Facade\CompanySupplierGuiToStoreFacadeInterface;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

class CompanySupplierGuiCommunicationFactory extends AbstractCommunicationFactory
{
    public function getCompanySupplierFacade(): CompanySupplierGuiToCompanySupplierFacadeInterface
    {
        return $this->getProvidedDependency(CompanySupplierGuiDependencyProvider::FACADE_COMPANY_SUPPLIER);
    }

    public function getProductQuery(): SpyProductQuery
    {
        return $this->getProvidedDependency(CompanySupplierGuiDependencyProvider::PROPEL_QUERY_PRODUCT);
    }

    public function createCompanySupplierForm(): CompanySupplierForm
    {
        return new CompanySupplierForm();
    }

    public function createCompanySupplierFormDataProvider(): CompanySupplierFormDataProvider
    {
        return new CompanySupplierFormDataProvider(
            $this->getCompanySupplierFacade(),
        );
    }

    public function createProductSuppliersTable(int $idCompany): ProductSupplierTable
    {
        return new ProductSupplierTable(
            $idCompany,
            $this->getProductQuery(),
            $this->getMoneyFacade(),
            $this->getStoreFacade(),
            $this->getCurrencyFacade(),
        );
    }

    protected function getMoneyFacade(): CompanySupplierGuiToMoneyFacadeInterface
    {
        return $this->getProvidedDependency(CompanySupplierGuiDependencyProvider::FACADE_MONEY);
    }

    protected function getStoreFacade(): CompanySupplierGuiToStoreFacadeInterface
    {
        return $this->getProvidedDependency(CompanySupplierGuiDependencyProvider::FACADE_STORE);
    }

    protected function getCurrencyFacade(): CompanySupplierGuiToCurrencyFacadeInterface
    {
        return $this->getProvidedDependency(CompanySupplierGuiDependencyProvider::FACADE_CURRENCY);
    }

    public function createCompanyTypeChoiceFormDataProvider(): CompanyTypeChoiceFormDataProvider
    {
        return new CompanyTypeChoiceFormDataProvider(
            $this->getCompanySupplierFacade(),
        );
    }

    public function createCompanyTypeChoiceFormType(): CompanyTypeChoiceFormType
    {
        return new CompanyTypeChoiceFormType();
    }
}
