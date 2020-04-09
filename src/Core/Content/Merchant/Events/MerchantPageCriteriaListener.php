<?php declare(strict_types=1);

namespace Swag\ServiceBooking\Core\Content\Merchant\Storefront\Events;

use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Production\Merchants\Events\MerchantPageCriteriaEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MerchantPageCriteriaListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
             MerchantPageCriteriaEvent::class => 'loadMerchant',
        ];
    }

    public function loadMerchant(MerchantPageCriteriaEvent $event): Criteria
    {
        $criteria = $event->getCriteria();

        $criteria->addAssociation('products.serviceBookingTemplate.dates');

        return $criteria;
    }
}
