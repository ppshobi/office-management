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
                <select id="transaction_type_id" v-model="selectedCategory" class="form-control" name="transaction_type_id" required autofocus>
                    <option disabled value="">Select Category</option>
                    <option v-for="category in this.transactionCategories" :value="category.id" > {{ category.name}} </option>
                </select>
            </div>
        </div>

         <div id="students" class="form-group" v-if="showStudent">
            <label for="student_id" class="col-md-4 control-label">Student Name</label>
            <div class="col-md-6">
                <select id="student_id" class="form-control" name="student_id" required autofocus>
                    <option value="0"> Select Student</option>
                    <option v-for="student in this.students" :value="student.id">
                        {{ student.id }}  -  {{ student.name }}
                    </option>
                </select>
            </div>
        </div>

        <div id="staffs" class="form-group" v-if="showStaff">
            <label for="staff_id" class="col-md-4 control-label">Staff Name</label>
            <div class="col-md-6">
                <select id="staff_id" class="form-control" name="staff_id" required autofocus>
                    <option value="0"> Select Staff</option>
                    <option v-for="staff in this.staffs" :value="staff.id">
                        {{ staff.id }}  -  {{ staff.name }}
                    </option>
                </select>
            </div>
        </div>

        <div class="form-group" v-if="showAmount">
            <label for="amount" class="col-md-4 control-label">Amount</label>

            <div class="col-md-6">
                <input id="amount" type="number" class="form-control" name="amount"
                       placeholder="Enter The Amount" required>
            </div>
        </div>

        <div class="form-group" v-if="showAmount">
            <label for="date" class="col-md-4 control-label">Bill Date</label>

            <div class="col-md-6" id="datetimepicker1">
                <div class="input-group date">
                    <input type="date" name="date" class="form-control" value="01/01/2018">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group" v-if="showAmount">
            <label for="remark" class="col-md-4 control-label">Remark</label>

            <div class="col-md-6">
                 <input id="remark" type="number" class="form-control" name="remark"
                        placeholder="Enter Notes" required>
            </div>
        </div>

        <div class="form-group" v-if="showAmount">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Add Transaction
                </button>
            </div>
        </div>


    </form>
</template>

<script>
    export default {
        props: ['categories', 'students', 'staffs'],
        data() {
            return {
                transactionCategories:null,
                selectedTransactionType:null,
                selectedCategory:null,

                showStudent: false,
                showStaff:false,
                showAmount:false,
            }
        },

        mounted() {

        },

        created() {

        },

        methods:{
           transactionTypeChanged: function (change) {
               this.selectedTransactionType = change.target.value;
               this.reset();
           },

           reset: function () {
               this.showAmount = this.showStaff = this.showStudent = false;
           }
        },

        watch:{
            selectedTransactionType: function(){
                 if(this.selectedTransactionType == 1) {
                       this.transactionCategories = this.categories.filter(category => category.is_credit == 1);
                 } else {
                       this.transactionCategories = this.categories.filter(category => category.is_credit == 0);
                 }
            },

            selectedCategory: function(category) {
                this.reset();

                this.showAmount = true;

                if(category == 4) {
                   this.showStaff = false;
                   this.showStudent = true;
                }

                if(category == 8) {
                   this.showStudent = false;
                   this.showStaff = true;
                }
            }
        }
    }

</script>
