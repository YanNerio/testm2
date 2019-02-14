<?php namespace Yannerio\Calculadora\Model;

use Yannerio\Calculadora\Api\Data\PlanInterface;
use Magento\Framework\DataObject\IdentityInterface;

class Plan  extends \Magento\Framework\Model\AbstractModel implements PlanInterface, IdentityInterface
{

    /**#@+
     * Plan's Statuses
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    /**#@-*/

    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'calculadora_plan';

    /**
     * @var string
     */
    protected $_cacheTag = 'calculadora_plan';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'calculadora_plan';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Yannerio\Calculadora\Model\ResourceModel\Plan');
    }

    /**
     * Prepare plazo's statuses.
     * Available event calculadora_plan_get_available_statuses to customize statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }
    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Get Nombre
     *
     * @return string|null
     */
    public function getNombre()
    {
        return $this->getData(self::NOMBRE);
    }

    /**
     * Get Plazo
     *
     * @return int|null
     */
    public function getPlazo()
    {
        return $this->getData(self::PLAZO);
    }

    /**
     * Get Interes
     *
     * @return string|null
     */
    public function getInteres()
    {
        return $this->getData(self::INTERES);
    }

    /**
     * Get Monto Maximo
     *
     * @return string|null
     */
    public function getMontoMax()
    {
        return $this->getData(self::MONTO_MAX);
    }

    /**
     * Get Estado
     *
     * @return int|null
     */
    public function getEstado()
    {
        return $this->getData(self::ESTADO);
    }
   
    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return \Yannerio\Calculadora\Api\Data\PlanInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ENTITY_ID, $id);
    }

    /**
     * Set Nombre
     *
     * @param int $nombre
     * @return \Yannerio\Calculadora\Api\Data\PlanInterface
     */
    public function setNombre($nombre)
    {
        return $this->setData(self::NOMBRE, $nombre);
    }

    /**
     * Set Plazo
     *
     * @param string $plazo
     * @return \Yannerio\Calculadora\Api\Data\PlanInterface
     */
    public function setPlazo($plazo)
    {
        return $this->setData(self::PLAZO, $plazo);
    }

    /**
     * Set Interes
     *
     * @return int|null
     */
    public function setInteres($interes)
    {
        return $this->setData(self::INTERES, $interes);
    }

    /**
     * Set Monto Maximo
     *
     * @return string|null
     */
    public function setMontoMax($monto)
    {
        return $this->setData(self::MONTO_MAX, $monto);
    }

    /**
     * Set Estado
     *
     * @return int|null
     */
    public function setEstado($estado)
    {
        return $this->setData(self::ESTADO, $estado);
    }
   
    /**
     * Set creation time
     *
     * @param string $created_time
     * @return \Yannerio\Calculadora\Api\Data\PlanInterface
     */
    public function setCreatedAt($created_time)
    {
        return $this->setData(self::CREATED_AT, $created_time);
    }

    /**
     * Set update time
     *
     * @param string $update_time
     * @return \Yannerio\Calculadora\Api\Data\PlanInterface
     */
    public function setUpdatedAt($update_time)
    {
        return $this->setData(self::UPDATED_AT, $update_time);
    }

}