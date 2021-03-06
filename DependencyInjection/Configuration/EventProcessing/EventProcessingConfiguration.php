<?php

namespace Morebec\Orkestra\SymfonyBundle\DependencyInjection\Configuration\EventProcessing;

use Morebec\Orkestra\EventSourcing\EventProcessor\InMemoryEventStorePositionStorage;
use Morebec\Orkestra\SymfonyBundle\DependencyInjection\Configuration\NotConfiguredException;

/**
 * Configures event processing dependencies.
 */
class EventProcessingConfiguration
{
    public array $eventStorePositionStorageImplementationClassNames = [];

    public ?ProjectionProcessingConfiguration $projectionProcessingConfiguration = null;

    public function usingEventStorePositionStorageImplementation(string $className): self
    {
        $this->eventStorePositionStorageImplementationClassNames[] = $className;

        return $this;
    }

    public function usingInMemoryEventStorePositionStorage(): self
    {
        return $this->usingEventStorePositionStorageImplementation(InMemoryEventStorePositionStorage::class);
    }

    public function configureProjectionProcessing(ProjectionProcessingConfiguration $configuration): self
    {
        $this->projectionProcessingConfiguration = $configuration;

        return $this;
    }

    /**
     * Returns the projection processing configuration or throws an exception if not configured.
     */
    public function projectionProcessing(): ProjectionProcessingConfiguration
    {
        if (!$this->projectionProcessingConfiguration) {
            throw new NotConfiguredException('Projection Processing not configured.');
        }

        return $this->projectionProcessingConfiguration;
    }
}
