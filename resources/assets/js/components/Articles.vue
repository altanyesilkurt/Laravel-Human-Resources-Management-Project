<template>
        <form>
            <div class="form-group pull-right">
                <label >Date</label>
                <input type="date" class="form-control" v-model="date">
            </div>
            <div class="form-group">
                <label >Card Holder's Name</label>
                <input type="text" class="form-control" v-model="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label >Credit Card Number</label>
                <input type="number" class="form-control" v-model="card_number" placeholder="Enter card number">
            </div>
        </form>
</template>
<script>
    export default {
        data() {
            return {
                name:'',
                card_number:'',
                date:''
            }}}
</script>


