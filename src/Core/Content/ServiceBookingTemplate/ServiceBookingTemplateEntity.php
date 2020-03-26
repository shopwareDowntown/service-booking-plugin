<?php declare(strict_types=1);

namespace Swag\ServiceBooking\Core\Content\ServiceBookingTemplate;

use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use Swag\ServiceBooking\Core\Content\ServiceBookingTemplate\Aggregate\ServiceBookingDate\ServiceBookingDateCollection;

class ServiceBookingTemplateEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var ProductEntity
     */
    protected $product;

    /**
     * @var ServiceBookingDateCollection|null
     */
    protected $dates;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getProduct(): ProductEntity
    {
        return $this->product;
    }

    public function setProduct(ProductEntity $product): void
    {
        $this->product = $product;
    }

    public function getDates(): ?ServiceBookingDateCollection
    {
        return $this->dates;
    }

    public function setDates(?ServiceBookingDateCollection $dates): void
    {
        $this->dates = $dates;
    }
}
