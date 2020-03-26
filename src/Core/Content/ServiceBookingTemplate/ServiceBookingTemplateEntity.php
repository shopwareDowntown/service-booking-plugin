<?php declare(strict_types=1);

namespace Swag\ServiceBooking\Core\Content\ServiceBookingTemplate;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use Swag\ServiceBooking\Core\Content\ServiceBookingTemplate\Aggregate\ServiceBookingDate\DateCollection;

class ServiceBookingTemplateEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var DateCollection|null
     */
    protected $dates;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return DateCollection|null
     */
    public function getDates(): ?DateCollection
    {
        return $this->dates;
    }

    /**
     * @param DateCollection|null $dates
     */
    public function setDates(?DateCollection $dates): void
    {
        $this->dates = $dates;
    }
}
