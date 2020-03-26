<?php declare(strict_types=1);

namespace Swag\ServiceBooking\Core\Content\ServiceBookingTemplate\Aggregate\ServiceBookingDate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void                      add(ServiceBookingDateEntity $entity)
 * @method void                      set(string $key, ServiceBookingDateEntity $entity)
 * @method ServiceBookingDateEntity[]    getIterator()
 * @method ServiceBookingDateEntity[]    getElements()
 * @method ServiceBookingDateEntity|null get(string $key)
 * @method ServiceBookingDateEntity|null first()
 * @method ServiceBookingDateEntity|null last()
 */
class ServiceBookingDateCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return ServiceBookingDateEntity::class;
    }
}
