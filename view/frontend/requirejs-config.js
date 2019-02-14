var config = {
    map: {
        "*": {
            'bootstrap4': 'Yannerio_Calculadora/js/bootstrap4/bootstrap.bundle.min',
             "Magento_Checkout/template/sidebar.html": "Yannerio_Calculadora/template/sidebar.html"
        }
    },
    paths: {
        'bootstrap4': 'js/bootstrap4/bootstrap.bundle.min'
    },
    shim: {
        'bootstrap4': {
            'deps': ['jquery']
    
        }
    }
    
};

console.log('This is printed 55');