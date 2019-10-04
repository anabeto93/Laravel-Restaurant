<template>
    <div class="wrapper menu__container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <card-component>
                    <template slot="title">Menu Items</template>
                    <template slot="main">
                        <div class="section">
                            <multiselect
                                v-model="menu" :options="categories"></multiselect>
                        </div>
                        <menu-groups :items="currentMenuItems"></menu-groups>
                    </template>

                </card-component>
            </div>
            <div class="col-md-4">
                <card-component>
                    <template slot="title">Add Menu Item</template>
                    <template slot="main">
                        <menu-add-form 
                            :categories="categories" :restaurant-id="restaurantId"
                            v-on:newMenuItemAdded="newItemHandler">
                        </menu-add-form>
                    </template>
                </card-component>
            </div>
        </div>
    </div>
</template>

<script>
import _ from 'lodash';
import Multiselect from 'vue-multiselect';
import MenuGroups from './MenuGroups';
import MenuAddForm from './MenuAddForm';

export default {
    props: ['items', 'restaurantId'],
    components: {
        Multiselect,
        MenuGroups,
        MenuAddForm,
    },
    data() {
        return {
            categories: [],
            menu: '',
            localItems: [],
        };
    },
    methods: {
        newItemHandler(data, category) {
            console.log('New Item data received', data, category);
            //add to the list of localItems
            
            //copy the category of any existing menu 
            data.category = this.localItems[category][0].category;
            this.localItems[category].unshift(data);
        }
    },
    created() {
        _.forEach(this.items, (item, key) => {
            this.categories.push(key);
        });
        this.menu = this.categories[0];
        this.localItems = this.items;
    },
    computed: {
        currentMenuItems() {
            return this.localItems[this.menu];
        }
    }
}
</script>