<?php

namespace Morebec\Orkestra\SymfonyBundle\DependencyInjection\Configuration;

use Morebec\Orkestra\EventSourcing\EventProcessor\InMemoryEventStorePositionStorage;

class EventProcessingConfiguration
{
    public string $eventStorePositionStorageImplementationClassName;

    public ?ProjectionProcessingConfiguration $projectionProcessingConfiguration;

    public function usingEventStorePositionStorageImplementation(string $className): self
    {
        $this->eventStorePositionStorageImplementationClassName = $className;

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
}