<template>
    <div class="add_form__wrapper">
        <form v-on:submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="name">Food Item</label>
                <input type="text" class="form-control" placeholder="Enter food item name"
                    v-model="food.item" id="name" required>
            </div>

            <div class="form-group">
                <label for="category">Select category</label>
                <multiselect
                    v-model="food.category"
                    :options="categories" id="category">
                </multiselect>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" class="form-control" placeholder="Enter item price"
                    v-model="food.price" required>
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
export default {
    props: ['categories'],
    components: {
        Multiselect
    },
    data() {
        return {
            food: {
                item: '',
                price: 10.99,
                category: ''
            },
            menu: '',
        };
    },
    methods: {
        handleSubmit() {
            console.log('form data', this.food)
        }
    }
}
</script>