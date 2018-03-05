import * as $ from 'jquery';
import 'bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js';
import 'bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css';

export default (function () {
    $('.bill-date').datepicker({
        pickerPosition: 'bottom-left',
        format: 'dd/mm/yyyy',
        todayHighlight: true
    });

    $('#bill-date2').datepicker({
        pickerPosition: 'bottom-left',
        format: 'dd/mm/yyyy',
        todayHighlight: true
    });

}());
