<template>
    <form class="form-horizontal" method="POST" action="/transaction">
        <div class="form-group">
            <label for="transaction_type_debit" class="col-md-4 control-label">Select Transaction Type</label>
            <div class="col-md-4">
                <div class="col-md-6">
                    <label for="transaction_type_debit" class="control-label">Debit</label>
                    <input type="radio" value="0" name="transaction_type"  @change="transactionTypeChanged"/>
                </div>
                <div class="col-md-6">
                    <label for="transaction_type_credit" class="control-label">Credit</label>
                    <input type="radio" value="1" name="transaction_type"  @change="transactionTypeChanged"/>
                </div>
            </div>
        </div>

        <div id="categories" class="form-group" v-if="this.transactionCategories">
            <label for="transaction_type_debit" class="col-md-4 control-label">Select Transaction Category</label>
            <div class="col-md-6">
                <select id="transaction_type_id" class="form-control" name="transaction_type_id" required autofocus>
                    <option value="0">Select Category</option>
                    <option v-for="category in this.transactionCategories" :value="category.id" > {{ category.name}} </option>
                </select>
            </div>
        </div>

    </form>
</template>

<script>
    export default {
        props: ['categories'],
        data() {
            return {
                transactionCategories:null,
                selectedTransactionType:null
            }
        },

        mounted() {

        },

        created() {

        },

        methods:{
           transactionTypeChanged: function (change) {
               if(change.target.value == 1) {
                   this.transactionCategories = this.categories.filter(category => category.is_credit == 1);
               }else{
                   this.transactionCategories = this.categories.filter(category => category.is_credit == 0);
               }
           }
        }
    }

</script>
