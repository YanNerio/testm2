<?php 
    namespace Yannerio\Calculadora\Controller\Planes;

    use Magento\Framework\App\Action\Context;
    use Yannerio\Calculadora\Model\PlanFactory;
    use Magento\Framework\Controller\Result\JsonFactory;

    class General extends \Magento\Framework\App\Action\Action {

        protected $planFactory;
        protected $resultJsonFactory; 
        protected $_checkoutSession;

        public function __construct(
            Context $context,
            JsonFactory $resultJsonFactory,
            PlanFactory $planFactory,
            \Magento\Checkout\Model\Session $checkoutSession
        ) {
           // $this->_planFactory = $planFactory;
            $this->_checkoutSession = $checkoutSession;
            $this->planFactory = $planFactory;
            $this->resultJsonFactory = $resultJsonFactory; 
            parent::__construct($context);
        }

        public function execute()
        {
            $this->getCheckoutSession()->unsCustomPrice();
            $this->getCheckoutSession()->unsCuota();
            $this->getCheckoutSession()->unsPlazos();
            $this->getCheckoutSession()->unsInteres();
            $id = $this->getRequest()->getParam('id');
            $qty = $this->getRequest()->getParam('qty');
            $price = $this->getRequest()->getParam('price')*$qty;
            
            $result = $this->resultJsonFactory->create();
            $planes = $this->planFactory->create();
            $plan = $planes->load($id);
            $tasa = ($plan->getInteres()/100);
            $plazo = $plan->getPlazo();
            $cuota = $price * $tasa * (pow((1 + $tasa), $plazo)) * (pow((1 + 
            $tasa), 0 )) / (pow((1 + $tasa), $plazo) - 1 ); 
            $data = array(
                'cuota' => round($cuota, 2),
                'total_plan' => round(($cuota * $plazo), 2),
                'interes' => $plan->getInteres(),
            );
            $this->getCheckoutSession()->setCustomPrice(round(($cuota * $plazo), 2));
            $this->getCheckoutSession()->setCuota(round($cuota, 2));
            $this->getCheckoutSession()->setPlazos($plan->getNombre());
            $this->getCheckoutSession()->setInteres($plan->getInteres());
            $result->setData($data);
            return $result;
        } 
        public function getCheckoutSession() 
        {
            return $this->_checkoutSession;
        }
    
        
    }

?>