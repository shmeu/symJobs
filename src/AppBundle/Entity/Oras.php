<?php

namespace AppBundle\Entity;

/**
 * Oras
 */
class Oras
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $cityName;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $products;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set cityName
     *
     * @param string $cityName
     *
     * @return Oras
     */
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;

        return $this;
    }

    /**
     * Get cityName
     *
     * @return string
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * Add product
     *
     * @param \AppBundle\Entity\Job $product
     *
     * @return Oras
     */
    public function addProduct(\AppBundle\Entity\Job $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \AppBundle\Entity\Job $product
     */
    public function removeProduct(\AppBundle\Entity\Job $product)
    {
        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $job;


    /**
     * Add job
     *
     * @param \AppBundle\Entity\Job $job
     *
     * @return Oras
     */
    public function addJob(\AppBundle\Entity\Job $job)
    {
        $this->job[] = $job;

        return $this;
    }

    /**
     * Remove job
     *
     * @param \AppBundle\Entity\Job $job
     */
    public function removeJob(\AppBundle\Entity\Job $job)
    {
        $this->job->removeElement($job);
    }

    /**
     * Get job
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJob()
    {
        return $this->job;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $jobs;


    /**
     * Get jobs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJobs()
    {
        return $this->jobs;
    }
}
