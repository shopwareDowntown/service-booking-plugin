<?php declare(strict_types=1);

namespace Swag\ServiceBooking\Core\Content\ServiceBookingTemplate\Aggregate\ServiceBookingDate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void                      add(DateEntity $entity)
 * @method void                      set(string $key, DateEntity $entity)
 * @method DateEntity[]    getIterator()
 * @method DateEntity[]    getElements()
 * @method DateEntity|null get(string $key)
 * @method DateEntity|null first()
 * @method DateEntity|null last()
 */
class DateCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return DateEntity::class;
    }
}
