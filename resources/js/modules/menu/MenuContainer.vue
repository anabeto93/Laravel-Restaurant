<template>
    <div class="wrapper menu__container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <card-component>
                    <template slot="title">Menu Items</template>
                    <template slot="body">Contents here</template>
                </card-component>
            </div>
            <div class="col-md-4">
                <card-component>
                    <template slot="title">Add Menu Item</template>
                    <template slot="body">Form In Here</template>
                </card-component>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['items']
}
</script>