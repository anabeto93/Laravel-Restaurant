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
                    <template slot="main">Form In Here</template>
                </card-component>
            </div>
        </div>
    </div>
</template>

<script>
import _ from 'lodash';
import Multiselect from 'vue-multiselect';
import MenuGroups from './MenuGroups';

export default {
    props: ['items'],
    components: {
        Multiselect,
        MenuGroups,
    },
    data() {
        return {
            categories: [],
            menu: '',
        };
    },
    created() {
        _.forEach(this.items, (item, key) => {
            this.categories.push(key);
        });
        this.menu = this.categories[0];
    },
    computed: {
        currentMenuItems() {
            return this.items[this.menu];
        }
    }
}
</script>