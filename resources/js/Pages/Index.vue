<template>
     <Head title="Welcome" />
    <FrontendLayout>
    <!--Main Section-->
    <Main/>


    
    </FrontendLayout>
</template>

<script setup>
    import {Head, Link} from '@inertiajs/inertia-vue3';
    import FrontendLayout from '@/Layouts/Frontend.vue';
    import Main from '@/Components/Frontend/Main.vue';
</script>

