
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.$ = require('jquery');
window.toastr = require('toastr');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('action', require('./components/ActionComponent.vue'));

Vue.component('student-index', require('./components/Student/StudentIndex.vue'));
Vue.component('create-student', require('./components/Student/CreateStudent.vue'));

Vue.component('staff-index', require('./components/Staff/StaffIndex.vue'));

Vue.component('course-index', require('./components/Course/CourseIndex.vue'));
Vue.component('create-course', require('./components/Course/CreateCourse.vue'));
Vue.component('edit-course', require('./components/Course/EditCourse.vue'));

Vue.component('create-transaction', require('./components/Transaction/CreateTransaction.vue'));
Vue.component('edit-transaction', require('./components/Transaction/EditTransaction.vue'));
Vue.component('transction-record', require('./components/TransactionRecordComponent.vue'));
Vue.component('transaction-chart', require('./components/Transaction/TransactionChart.vue'));

const app = new Vue({
    el: '#app'
});
