<template>
    <div class="add_form__wrapper">
        <form v-on:submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="name">Food Item</label>
                <input type="text" class="form-control" placeholder="Enter food item name"
                    v-model="food.name" id="name" required>
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

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" placeholder="Item Description"
                    v-model="food.description" required rows="3"></textarea>
            </div>

            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
import axios from 'axios';

export default {
    props: ['categories', 'restaurantId'],
    components: {
        Multiselect
    },
    data() {
        return {
            food: this.emptyMenuItem(),
            menu: '',
        };
    },
    methods: {
        emptyMenuItem() {
            return {
                name: '',
                price: 10.99,
                category: '',
                restaurant_id: this.restaurantId,
            };
        },
        handleSubmit() {
            // console.log('form data', this.food)
            axios.post('/menus', this.food)
            .then( (response) => {
                // console.log('response from adding new menu item', response.data)
                this.$emit('newMenuItemAdded', response.data, this.food.category)
                this.food = this.emptyMenuItem();
            })
            .catch( (e) => {
                console.error(e)
            })
        }
    }
}
</script>