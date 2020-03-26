<?php declare(strict_types=1);

namespace Swag\ServiceBooking\Core\Content\ServiceBookingTemplate\Aggregate\ServiceBookingDate;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use Shopware\Production\ServiceBooking\ServiceBookingTemplate\ServiceBookingTemplateEntity;

class ServiceBookingDateEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var \DateTimeInterface
     */
    protected $startDate;

    /**
     * @var \DateTimeInterface
     */
    protected $endDate;

    /**
     * @var ServiceBookingTemplateEntity
     */
    protected $template;

    /**
     * @return \DateTimeInterface
     */
    public function getStartDate(): \DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @param \DateTimeInterface $startDate
     */
    public function setStartDate(\DateTimeInterface $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getEndDate(): \DateTimeInterface
    {
        return $this->endDate;
    }

    /**
     * @param \DateTimeInterface $endDate
     */
    public function setEndDate(\DateTimeInterface $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return ServiceBookingTemplateEntity
     */
    public function getTemplate(): ServiceBookingTemplateEntity
    {
        return $this->template;
    }

    /**
     * @param ServiceBookingTemplateEntity $template
     */
    public function setTemplate(ServiceBookingTemplateEntity $template): void
    {
        $this->template = $template;
    }
}
