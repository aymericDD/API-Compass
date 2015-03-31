<?php
/**
 * Created by PhpStorm.
 * User: Rico
 * Date: 16/03/2015
 * Time: 10:00
 */

namespace API\Campus\Entity;

/**
 * Class Address
 * @package API\Campus\Entity
 * @Entity(repositoryClass="API\Campus\Entity\AddressRepository")
 */
class Address {
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /** @Column(type="text") */
    private $rue;

    /** @Column(type="integer") */
    private $codepostale;

    /** @Column(type="text") */
    private $ville;

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
     * Set rue
     *
     * @param string $rue
     * @return Address
     */
    public function setRue($rue)
    {
        $this->rue = $rue;
    
        return $this;
    }

    /**
     * Get rue
     *
     * @return string 
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set codepostale
     *
     * @param integer $codepostale
     * @return Address
     */
    public function setCodepostale($codepostale)
    {
        $this->codepostale = $codepostale;
    
        return $this;
    }

    /**
     * Get codepostale
     *
     * @return integer 
     */
    public function getCodepostale()
    {
        return $this->codepostale;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Address
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    
        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }
}