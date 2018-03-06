import * as $ from 'jquery';
import 'datatables';
import 'datatables.net-buttons';
import 'datatables.net-buttons/js/buttons.print.min';

export default (function () {
  $('#dataTable').DataTable({
      order:[[0,'desc']],
      dom:'lBfrtip',
      buttons: [
          {
              extend: 'print',
              className: 'btn btn-success',
              exportOptions: {
                  columns: 'th:not(:last-child)'
              }
          },

      ]
  });
}());
