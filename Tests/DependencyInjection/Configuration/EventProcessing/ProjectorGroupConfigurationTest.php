<?php

namespace Tests\Morebec\Orkestra\SymfonyBundle\DependencyInjection\Configuration\EventProcessing;

use Morebec\Orkestra\EventSourcing\Projection\ProjectorInterface;
use Morebec\Orkestra\SymfonyBundle\DependencyInjection\Configuration\EventProcessing\ProjectorGroupConfiguration;
use PHPUnit\Framework\TestCase;

class ProjectorGroupConfigurationTest extends TestCase
{
    public function testWithName(): void
    {
        $configuration = new ProjectorGroupConfiguration();
        $configuration->withName('test');
        self::assertEquals('test', $configuration->groupName);
    }

    public function testWithProjector(): void
    {
        $configuration = new ProjectorGroupConfiguration();
        $configuration->withProjector(ProjectorInterface::class);

        self::assertCount(1, $configuration->projectors);
        self::assertEquals(ProjectorInterface::class, $configuration->projectors[0]);
    }
}
