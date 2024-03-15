define([
    'jquery',
    'ko',
    'uiComponent',
    'underscore',
    'Magento_Checkout/js/model/step-navigator'
], function ($, ko, Component, _, stepNavigator) {
    'use strict';

    $(document).on("click", '#personal-data', function(event) {
        Cookies.set('alternate_phone', jQuery("[name='alternate_phone']").val());
        Cookies.set('delhivery_type', jQuery("[name='delhivery_type']").val());
        Cookies.set('delhivery_date', jQuery("[name='delhivery_date']").val());
        Cookies.set('gender', jQuery("[name='gender']").val());
        Cookies.set('delhivery_note', jQuery("[name='delhivery_note']").val());
    })

    return Component.extend({
        defaults: {
            template: 'Web30india_CheckoutField/personal-info'
        },

        // add here your logic to display step,
        isVisible: ko.observable(true),

        /**
         * @returns {*}
         */
        initialize: function () {
            this._super();

            // register your step
            stepNavigator.registerStep(
                // step code will be used as step content id in the component template
                'personal_info',
                // step alias
                null,
                // step title value
                'Personal Info',
                // observable property with logic when display step or hide step
                this.isVisible,

                _.bind(this.navigate, this),

                /**
                 * sort order value
                 * 'sort order value' < 10: step displays before shipping step;
                 * 10 < 'sort order value' < 20 : step displays between shipping and payment step
                 * 'sort order value' > 20 : step displays after payment step
                 */
                15
            );

            return this;
        },

        /**
         * The navigate() method is responsible for navigation between checkout steps
         * during checkout. You can add custom logic, for example some conditions
         * for switching to your custom step
         * When the user navigates to the custom step via url anchor or back button we_must show step manually here
         */
        navigate: function () {
            this.isVisible(true);
        },

        /**
         * @returns void
         */
        navigateToNextStep: function () {
            stepNavigator.next();
        }
    });
});