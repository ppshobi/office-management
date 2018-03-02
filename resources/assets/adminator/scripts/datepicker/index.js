import * as $ from 'jquery';
import 'bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js';
import 'bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css';

export default (function () {
  $('.bill-date').datepicker({
      format: 'mm/dd/yyyy',
      startDate: '-3d',
      todayHighlight:true
  });
  $('.end-date').datepicker();
}())
