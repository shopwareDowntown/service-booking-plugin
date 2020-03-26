<?php declare(strict_types=1);

namespace Swag\ServiceBooking;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;

class ServiceBooking extends Plugin
{
    public function uninstall(UninstallContext $uninstallContext): void
    {
        $connection = $this->container->get(Connection::class);
        $connection->executeUpdate('
        DROP TABLE IF EXISTS
            `swag_service_booking_date`,
            `swag_service_booking_template`
    ');
    }
}
