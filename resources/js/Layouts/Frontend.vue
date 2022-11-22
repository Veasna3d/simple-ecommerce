<template>
    <!--Header-->
    <Header />

    <!--Content-->
    <main class="min-h-screen">
        <slot/>
    </main>

    <!--Footer-->
    <Footer/>
</template>

<script setup>
   
    import Header from '@/Components/Frontend/Header.vue';
    import Footer from '@/Components/Frontend/Footer.vue';
</script>

