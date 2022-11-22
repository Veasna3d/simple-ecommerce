<template>
     <Head title="Welcome" />
    <FrontendLayout>
    <!--Main Section-->
    <Main/>
    <!--Promote Section-->
    <Promote/>
    <!--Product Section-->
    <Product/>
    
    </FrontendLayout>
</template>

<script setup>
    import {Head, Link} from '@inertiajs/inertia-vue3';
    import FrontendLayout from '@/Layouts/Frontend.vue';
    import Main from '@/Components/Frontend/Main.vue';
    import Promote from '@/Components/Frontend/Promote.vue';
    import Product from '@/Components/Frontend/Product.vue';

</script>

