import * as $ from 'jquery';
import 'bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js';
import 'bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css';

export default (function () {
    $('.bill-date').datepicker({
        format: 'dd/mm/yyyy',
        startDate: '-3d',
        todayHighlight: true
    });


    $('.end-date').datepicker();

}());
