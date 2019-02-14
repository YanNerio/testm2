define([
    'jquery',
    'uiComponent',
    'ko'
], function ($, Component, ko) {
    'use strict';
    return Component.extend({
        initialize: function () {
            this._super();
        },
        getCuota: function () {
            console.log('var:', window.checkoutConfig.plan);
            return window.checkoutConfig.plan.cuota;
        },
        getPlazo: function () {
            return window.checkoutConfig.plan.plazo;
        },
        getInteres: function () {
            return window.checkoutConfig.plan.interes;
        },
        getMonto: function () {
            return window.checkoutConfig.plan.monto;
        }
    });
}
);