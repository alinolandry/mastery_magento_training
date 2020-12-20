define([
    'mage/storage'
], function (storage) {
    'use strict';

    return {
        getList: function () {
            return storage.get('rest/V1/customer/todo/tasks')
        }
    };
});
