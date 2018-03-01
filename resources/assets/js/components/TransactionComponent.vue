<template>
    <form class="form-horizontal col-md-12" id="transaction">
        <div class="form-group">
            <h6 class="col-md-6 c-red-900">Select Transaction Type</h6>
            <div class="col-md-3 row">
                <div class="col-md-6">
                     <label for="transaction_type_debit" class="form-check-label">Credit</label>
                     <input type="radio"
                        value="1"
                        v-model="transaction_type"
                        name="transaction_type"
                        @change="transactionTypeChanged"/>
                </div>
                <div class="col-md-6">
                     <label for="transaction_type_debit" class="form-check-label">Debit</label>
                     <input type="radio"
                            value="0"
                            v-model="transaction_type"
                            name="transaction_type"
                            @change="transactionTypeChanged"/>
                </div>
            </div>
        </div>

        <div class="form-group" v-if="this.transactionCategories">
            <h6 class="col-md-6 c-red-900">Select Transaction Category</h6>
            <div class="col-md-6">
                <select id="transaction_type_id" v-model="selectedCategory" class="form-control" name="transaction_type_id" required autofocus>
                    <option disabled value="">Select Category</option>
                    <option v-for="category in this.transactionCategories" :value="category.id" > {{ category.name}} </option>
                </select>
            </div>
        </div>

         <div id="students" class="form-group" v-if="showStudent">
            <h6 class="col-md-6 c-red-900">Student Name</h6>
            <div class="col-md-6">
                <select id="student_id" v-model="student_id" class="form-control" name="student_id" required autofocus>
                    <option value="0"> Select Student</option>
                    <option v-for="student in this.students" :value="student.id">
                        {{ student.id }}  -  {{ student.name }}
                    </option>
                </select>
            </div>
        </div>

        <div id="staffs" class="form-group" v-if="showStaff">
            <h6 class="col-md-6 c-red-900">Staff Name</h6>
            <div class="col-md-6">
                <select id="staff_id" v-model="staff_id" class="form-control" name="staff_id" required autofocus>
                    <option value="0"> Select Staff</option>
                    <option v-for="staff in this.staffs" :value="staff.id">
                        {{ staff.id }}  -  {{ staff.name }}
                    </option>
                </select>
            </div>
        </div>

        <div class="form-group" v-if="showAmount">
            <h6 class="col-md-6 c-red-900">Amount</h6>
            <div class="col-md-6">
                <input id="amount" v-model="amount" type="number" class="form-control" name="amount"
                       placeholder="Enter The Amount" required>
            </div>
        </div>

        <div class="form-group" v-if="showAmount">
            <h6 class="col-md-6 c-red-900">Bill Date</h6>

            <div class="col-md-6" id="datetimepicker1">
                <div class="input-group date">
                    <input type="date" name="date" v-model="date" class="form-control" value="01/01/2018">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group" v-if="showAmount">
            <h6 class="col-md-6 c-red-900">Remark</h6>
            <div class="col-md-6">
                 <input id="remark" type="text" class="form-control" v-model="remark" name="remark"
                        placeholder="Enter Notes" required>
            </div>
        </div>

        <div class="form-group" v-if="showAmount">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" @click="submit" class="btn btn-primary">
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
                date:new Date('yyyy-mm-dd'),
                remark:'',
                amount:0,
                transaction_type:null,
                student_id:null,
                staff_id:null,

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
           },

           submit: function(e) {
               e.preventDefault();

               axios.post('/transaction',{
                   'transaction_type_id': this.selectedCategory,
                   'date' : this.date,
                   'amount': this.amount,
                   'remark': this.remark,
                   'staff_id': this.staff_id,
                   'student_id': this.student_id,

               }).then((resp)=>{
                    toastr.info(resp.data.message);
               });
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
