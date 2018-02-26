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
                showRemark:false,
            }
        },

        mounted() {

        },

        created() {

        },

        methods:{
           transactionTypeChanged: function (change) {
               this.selectedTransactionType = change.target.value;
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
                this.showAmount = true;
                this.showRemark = true;
                if(category == 4) {
                   console.log(category);
                   this.showStudent = true;
                }
                if(category = 8){
                   this.showStaff = true;
                }
            }
        }
    }

</script>
