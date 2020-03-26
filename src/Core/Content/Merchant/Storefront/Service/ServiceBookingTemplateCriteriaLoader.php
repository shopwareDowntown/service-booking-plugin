<?php declare(strict_types=1);

namespace Swag\ServiceBooking\Core\Content\Merchant\Storefront\Service;

use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Production\Merchants\Content\Merchant\Storefront\Service\MerchantCriteriaLoaderInterface;

class ServiceBookingTemplateCriteriaLoader implements MerchantCriteriaLoaderInterface
{
    /**
     * @var MerchantCriteriaLoaderInterface
     */
    private $criteriaLoader;

    public function __construct(MerchantCriteriaLoaderInterface $criteriaLoader)
    {
        $this->criteriaLoader = $criteriaLoader;
    }

    public function getMerchantCriteria(Criteria $criteria): Criteria
    {
        $criteria = $this->criteriaLoader->getMerchantCriteria($criteria);
        $criteria->addAssociation('products.serviceBookingTemplate');

        return $criteria;
    }
}
