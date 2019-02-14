<?php

namespace Yannerio\Calculadora\Api\Data;

interface PlanInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ENTITY_ID  = 'entity_id';
    const NOMBRE     = 'nombre';
    const PLAZO      = 'plazo';
    const INTERES       = 'interes';
    const MONTO_MAX     = 'monto_max';
    const ESTADO       = 'estado';
    const CREATED_AT = 'created_at';
    const UPDATED_AT   = 'updated_at';
   

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get Nombre
     *
     * @return string
     */
    public function getNombre();

    /**
     * Get Customer ID
     *
     * @return int|null
     */
    public function getPlazo();

    /**
     * Get Interes
     *
     * @return int|null
     */
    public function getInteres();

    /**
     * Get Monto Max
     *
     * @return string|null
     */
    public function getMontoMax();

    /**
     * Get estado
     *
     * @return int|null
     */
    public function getEstado();

    /**
     * Get creation datetime
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Get update datetime
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set ID
     *
     * @param int $id
     * @return \Yannerio\Calculadora\Api\Data\PlanInterface
     */
    public function setId($id);

    /**
     * Set Nombre
     *
     * @param int $nombre
     * @return \Yannerio\Calculadora\Api\Data\PlanInterface
     */
    public function setNombre($nombre);

    /**
     * Set Interes
     *
     * @param string $interes
     * @return \Yannerio\Calculadora\Api\Data\PlanInterface
     */
    public function setInteres($interes);

    /**
     * Set Plazo
     *
     * @param string $plazo
     * @return \Yannerio\Calculadora\Api\Data\PlanInterface
     */
    public function setPlazo($plazo);

    /**
     * Set Monto Max
     *
     * @param string $montoMax
     * @return \Yannerio\Calculadora\Api\Data\PlanInterface
     */
    public function setMontoMax($montoMax);

    /**
     * Set estado
     *
     * @param int|bool $estado
     * @return \Yannerio\Calculadora\Api\Data\PlanInterface
     */
    public function setEstado($estado);

    /**
     * Set creation datetime
     *
     * @param string $createdAt
     * @return \Yannerio\Calculadora\Api\Data\PlanInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Set update datetime
     *
     * @param string $updateTime
     * @return \Yannerio\Calculadora\Api\Data\PlanInterface
     */
    public function setUpdatedAt($updateTime);

}
