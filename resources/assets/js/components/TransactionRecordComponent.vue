<template>
<div>
<table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Transaction ID</th>
            <th>Transaction Type</th>
            <th>Amount</th>
            <th>Remark</th>
            <th>Date</th>
            <th>With Respect To</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Transaction ID</th>
            <th>Transaction Type</th>
            <th>Amount</th>
            <th>Remark</th>
            <th>Date</th>
            <th>With Respect To</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
        <tr v-for="(transaction,index) in this.items" :id="transaction.id">
            <td class="export">{{ transaction.id }}</td>
            <td class="export">{{ transaction.type.name }}</td>
            <td>&#8377; {{ transaction.amount }}</td>
            <td>{{ transaction.remark }}</td>
            <td width="10%"> {{ transaction.bill_date | moment }}</td>
            <td>{{ transaction.transactable ? transaction.transactable.name : ''}}</td>
            <td>
                <action :id="transaction.id" :index="index" :url="'transaction'" @removed="remove(index)"></action>
            </td>
        </tr>
    </tbody>
</table>
</div>
</template>

<script>
    import moment from 'moment';
    import action from './ActionComponent';

    export default {
        props:['items'],

        methods:{
            remove:function(index) {
                $("#"+this.items[index].id).remove();
            }
        },
        filters: {
          moment: function (date) {
            return moment(date, "YYYY-MM-DD  h:mm:ss").format('DD-MM-YYYY');
          }
        }
    }

</script>
