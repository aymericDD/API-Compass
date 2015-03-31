<?php

namespace API\Campus\Entity;

/**
 * Class Campus
 * @package API\Campus\Entity
 * @Entity(repositoryClass="API\Campus\Entity\CampusRepository")
 */
class Campus
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /** @Column(type="string", length=255, unique=true) */
    private $name;

    /**
     * @OneToOne(targetEntity="Address", mappedBy="id", cascade={"persist", "remove"})
     * @JoinColumn(name="address_id", referencedColumnName="id")
     **/
    private $address;

    /**
     * @OneToOne(targetEntity="Localisation", mappedBy="id", cascade={"persist", "remove"})
     * @JoinColumn(name="localisation_id", referencedColumnName="id")
     **/
    private $localisation;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Campus
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set address
     *
     * @param \API\Campus\Entity\Address $address
     * @return Campus
     */
    public function setAddress(\API\Campus\Entity\Address $address = null)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return \API\Campus\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set localisation
     *
     * @param \API\Campus\Entity\Localisation $localisation
     * @return Campus
     */
    public function setLocalisation(\API\Campus\Entity\Localisation $localisation = null)
    {
        $this->localisation = $localisation;
    
        return $this;
    }

    /**
     * Get localisation
     *
     * @return \API\Campus\Entity\Localisation 
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }
}