<?php declare(strict_types=1);

namespace Swag\ServiceBooking\Core\Content\Product;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtensionInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Swag\ServiceBooking\Core\Content\ServiceBookingTemplate\ServiceBookingTemplateDefinition;

class ProductServiceBookingExtension implements EntityExtensionInterface
{

    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;
    }

    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToOneAssociationField(
                'serviceBookingTemplate',
                'id',
                'product_id',
                ServiceBookingTemplateDefinition::class
            )
        );
    }


}
