<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\ServiceBooking\Core\Content\ServiceBookingTemplate\Aggregate\ServiceBookingDate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\DateTimeField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Inherited;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\VersionField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Production\ServiceBooking\ServiceBookingTemplate\Aggregate\Date\DateCollection;
use Shopware\Production\ServiceBooking\ServiceBookingTemplate\Aggregate\Date\DateEntity;
use Shopware\Production\ServiceBooking\ServiceBookingTemplate\ServiceBookingTemplateDefinition;

class ServiceBookingDateDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_service_booking_date';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getCollectionClass(): string
    {
        return DateCollection::class;
    }

    public function getEntityClass(): string
    {
        return DateEntity::class;
    }

    protected function getParentDefinitionClass(): ?string
    {
        return ServiceBookingTemplateDefinition::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required()),
            new VersionField(),
            (new ReferenceVersionField(ServiceBookingTemplateDefinition::class, 'template_version_id'))->addFlags(new Required()),

            (new DateTimeField('start_date', 'startDate'))->addFlags(new Inherited()),
            (new DateTimeField('end_date', 'endDate'))->addFlags(new Inherited()),

            (new FkField('template_id', 'templateId', ServiceBookingTemplateDefinition::class))->addFlags(new Required()),
            new ManyToOneAssociationField('template', 'template_id', ServiceBookingTemplateDefinition::class),
        ]);
    }
}
