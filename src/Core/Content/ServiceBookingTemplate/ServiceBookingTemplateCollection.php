<?php declare(strict_types=1);

namespace Swag\ServiceBooking\Core\Content\ServiceBookingTemplate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void                add(ServiceBookingTemplateEntity $entity)
 * @method void                set(string $key, ServiceBookingTemplateEntity $entity)
 * @method ServiceBookingTemplateEntity[]    getIterator()
 * @method ServiceBookingTemplateEntity[]    getElements()
 * @method ServiceBookingTemplateEntity|null get(string $key)
 * @method ServiceBookingTemplateEntity|null first()
 * @method ServiceBookingTemplateEntity|null last()
 */
class ServiceBookingTemplateCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return ServiceBookingTemplateEntity::class;
    }
}
