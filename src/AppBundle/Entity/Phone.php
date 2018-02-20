<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;

/**
 * Phone
 * @ApiResource(attributes={"order"={"price": "ASC"}})
 * @ORM\Table(name="phone", indexes={@ORM\Index(name="IDX_444F97DD44F5D008", columns={"brand_id"})})
 * @ApiFilter(SearchFilter::class, properties={"name": "partial", "operatingSystem": "exact", "state": "exact"})
 * @ApiFilter(RangeFilter::class, properties={"storageCapacity","price"})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PhoneRepository")
*/

class Phone
{

    const STATE_NEW = 'new';
    const STATE_OCCASION = 'occasion';

    const OS_ANDROID = 'Android';
    const OS_IOS = 'IOS';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="operating_system", type="string", length=16, nullable=true)
     */
    private $operatingSystem;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=32, nullable=false)
     */
    private $state;

    /**
     * @var string|null
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @var int
     *
     * @ORM\Column(name="storage_capacity", type="integer", nullable=false)
     */
    private $storageCapacity;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="vat", type="float", precision=10, scale=0, nullable=false)
     */
    private $vat;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Brand
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Brand")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="brand_id", referencedColumnName="id")
     * })
     */
    private $brand;



    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Phone
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set operatingSystem.
     *
     * @param string|null $operatingSystem
     *
     * @return Phone
     */
    public function setOperatingSystem($operatingSystem = null)
    {
        $this->operatingSystem = $operatingSystem;

        return $this;
    }

    /**
     * Get operatingSystem.
     *
     * @return string|null
     */
    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }

    /**
     * Set state.
     *
     * @param string $state
     *
     * @return Phone
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set color.
     *
     * @param string|null $color
     *
     * @return Phone
     */
    public function setColor($color = null)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color.
     *
     * @return string|null
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set storageCapacity.
     *
     * @param int $storageCapacity
     *
     * @return Phone
     */
    public function setStorageCapacity($storageCapacity)
    {
        $this->storageCapacity = $storageCapacity;

        return $this;
    }

    /**
     * Get storageCapacity.
     *
     * @return int
     */
    public function getStorageCapacity()
    {
        return $this->storageCapacity;
    }

    /**
     * Set price.
     *
     * @param int $price
     *
     * @return Phone
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price.
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set vat.
     *
     * @param float $vat
     *
     * @return Phone
     */
    public function setVat($vat)
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * Get vat.
     *
     * @return float
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set brand.
     *
     * @param \AppBundle\Entity\Brand|null $brand
     *
     * @return Phone
     */
    public function setBrand(\AppBundle\Entity\Brand $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand.
     *
     * @return \AppBundle\Entity\Brand|null
     */
    public function getBrand()
    {
        return $this->brand;
    }
}
