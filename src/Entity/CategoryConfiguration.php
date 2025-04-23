<?php

declare(strict_types=1);

namespace Synolia\SyliusAkeneoPlugin\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;
use Synolia\SyliusAkeneoPlugin\Repository\CategoryConfigurationRepository;

/**
 * @ORM\MappedSuperclass(repositoryClass="CategoryConfigurationRepository")
 *
 * @ORM\Table("akeneo_api_configuration_categories")
 */
#[ORM\MappedSuperclass(repositoryClass: CategoryConfigurationRepository::class)]
#[ORM\Table(name: 'akeneo_api_configuration_categories')]
class CategoryConfiguration implements ResourceInterface
{
    /**
     * @var int
     *
     * @ORM\Id()
     *
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @ORM\Column(type="integer")
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: Types::INTEGER)]
    protected $id;

    /**
     * @var array<string>
     *
     * @ORM\Column(type="array")
     */
    #[ORM\Column(type: Types::ARRAY)]
    protected array $notImportCategories = [];

    /**
     * @var array<string>
     *
     * @ORM\Column(type="array")
     */
    #[ORM\Column(type: Types::ARRAY)]
    protected array $rootCategories = [];

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return array<string>
     */
    public function getNotImportCategories(): array
    {
        return $this->notImportCategories;
    }

    /**
     * @param array<string> $notImportCategories
     */
    public function setNotImportCategories(array $notImportCategories): self
    {
        $this->notImportCategories = $notImportCategories;

        return $this;
    }

    /**
     * @return array<string>
     */
    public function getRootCategories(): array
    {
        return $this->rootCategories;
    }

    /**
     * @param array<string> $rootCategories
     */
    public function setRootCategories(array $rootCategories): self
    {
        $this->rootCategories = $rootCategories;

        return $this;
    }
}
