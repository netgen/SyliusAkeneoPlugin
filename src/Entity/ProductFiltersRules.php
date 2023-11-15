<?php

declare(strict_types=1);

namespace Synolia\SyliusAkeneoPlugin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * @ORM\MappedSuperclass(repositoryClass="Synolia\SyliusAkeneoPlugin\Repository\ProductFiltersRulesRepository")
 * @ORM\Table("akeneo_api_product_filters_rules")
 */
class ProductFiltersRules implements ResourceInterface
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $mode;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $advancedFilter;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $completenessType;

    /**
     * @var array
     * @ORM\Column(type="array")
     */
    protected $locales = [];

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $completenessValue;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $status;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $updatedMode;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="datetime")
     */
    protected $updatedBefore;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(type="datetime")
     */
    protected $updatedAfter;

    /**
     * @var int|null
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $updated;

    /**
     * @var array
     * @ORM\Column(type="array")
     */
    protected $excludeFamilies = [];

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $channel = '';

    public function __construct()
    {
        $this->updatedBefore = new \DateTime();
        $this->updatedAfter = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function setMode(string $mode): self
    {
        $this->mode = $mode;

        return $this;
    }

    public function getAdvancedFilter(): ?string
    {
        return $this->advancedFilter;
    }

    public function setAdvancedFilter(?string $advancedFilter): self
    {
        $this->advancedFilter = $advancedFilter;

        return $this;
    }

    public function getCompletenessType(): ?string
    {
        return $this->completenessType;
    }

    public function setCompletenessType(?string $completenessType): self
    {
        $this->completenessType = $completenessType;

        return $this;
    }

    public function getLocales(): array
    {
        return $this->locales;
    }

    public function addLocale(string $locale): self
    {
        if (in_array($locale, $this->locales)) {
            return $this;
        }

        $this->locales[] = $locale;

        $this->locales = array_values($this->locales);

        return $this;
    }

    public function removeLocale(string $locale): self
    {
        if (!in_array($locale, $this->locales)) {
            return $this;
        }

        unset($this->locales[array_search($locale, $this->locales)]);

        $this->locales = array_values($this->locales);

        return $this;
    }

    public function getCompletenessValue(): ?int
    {
        return $this->completenessValue;
    }

    public function setCompletenessValue(int $completenessValue): self
    {
        $this->completenessValue = $completenessValue;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getUpdatedMode(): ?string
    {
        return $this->updatedMode;
    }

    public function setUpdatedMode(?string $updatedMode): self
    {
        $this->updatedMode = $updatedMode;

        return $this;
    }

    public function getUpdatedBefore(): \DateTimeInterface
    {
        return $this->updatedBefore;
    }

    public function setUpdatedBefore(\DateTimeInterface $updatedBefore): self
    {
        $this->updatedBefore = $updatedBefore;

        return $this;
    }

    public function getUpdatedAfter(): \DateTimeInterface
    {
        return $this->updatedAfter;
    }

    public function setUpdatedAfter(\DateTimeInterface $updatedAfter): self
    {
        $this->updatedAfter = $updatedAfter;

        return $this;
    }

    public function getUpdated(): ?int
    {
        return $this->updated;
    }

    public function setUpdated(?int $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    public function getExcludeFamilies(): array
    {
        return $this->excludeFamilies;
    }

    public function addExcludeFamily(string $excludeFamily): self
    {
        if (in_array($excludeFamily, $this->excludeFamilies)) {
            return $this;
        }

        $this->excludeFamilies[] = $excludeFamily;

        $this->excludeFamilies = array_values($this->excludeFamilies);

        return $this;
    }

    public function removeExcludeFamily(string $excludeFamily): self
    {
        if (!in_array($excludeFamily, $this->excludeFamilies)) {
            return $this;
        }

        unset($this->excludeFamilies[array_search($excludeFamily, $this->excludeFamilies)]);

        $this->excludeFamilies = array_values($this->excludeFamilies);

        return $this;
    }

    public function getChannel(): string
    {
        return $this->channel;
    }

    public function setChannel(string $channel): self
    {
        $this->channel = $channel;

        return $this;
    }
}
