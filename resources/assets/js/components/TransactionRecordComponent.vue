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
            <td>{{ transaction.id }}</td>
            <td>{{ transaction.type.name }}</td>
            <td>{{ transaction.amount }}</td>
            <td>{{ transaction.remark }}</td>
            <td width="20%">{{ transaction.date }}</td>
            <td>{{ transaction.transactionable ? transaction.transactionable.name : ''}}</td>
            <td>
                <action :id="transaction.id" :index="index" :url="'transaction'" @removed="remove(index)"></action>
            </td>
        </tr>
    </tbody>
</table>
</div>
</template>
<script>
    import action from './ActionComponent';

    export default {

        props:['items'],
        data() {
            return {

            }
        },

        methods:{
            remove:function(index) {
                $("#"+this.items[index].id).remove();
            }
        },
        watch:{

        }
    }

</script>
