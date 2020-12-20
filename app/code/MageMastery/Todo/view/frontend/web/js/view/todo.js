define([
    'uiComponent',
    'jquery',
    'Magento_Ui/js/modal/confirm',
    'MageMastery_Todo/js/service/task'
], function (Component, $, modal, taskService) {
    'use strict';

    return Component.extend({
        defaults: {
            newTaskLabel: '',
            buttonSelector: '#add-new-task-button',
            tasks: [],
        },

        initObservable: function () {
            this._super().observe(['tasks', 'newTaskLabel']);

            var self = this;
            taskService.getList().then(function(tasks) {
                self.tasks(tasks);
                return tasks;
            });

            return this;
        },

        switchStatus: function (data, event) {
            const taskId = $(event.target).data('id');

            var items = this.tasks().map(function (task) {
                if (task.task_id === taskId) {
                    task.status = task.status === 'open' ? 'complete' : 'open';
                }
                return task
            });

            this.tasks(items);
        },

        deleteTask: function(taskId){
            var self = this;
            modal({
                content: 'Are you sure you want to delete the task ?',
                actions: {
                    confirm: function (){
                        var tasks = [];

                        if(self.tasks().length === 1){
                            self.tasks(tasks);
                            return;
                        }

                        self.tasks().forEach(function (task){
                            if(task.task_id !== taskId){
                                tasks.push(task);
                            }
                        });
                        self.tasks(tasks);
                    }
                }
            });
        },

        addTask: function () {
            this.tasks.push({
                id: Math.floor(Math.random() * 100),
                label: this.newTaskLabel(),
                status: false
            });
            this.newTaskLabel(" ");
        },

        checkKey: function (data, event) {
            if(event.keyCode === 13){
                event.preventDefault();
                $(this.buttonSelector).click();
            }
        }
    });
});
