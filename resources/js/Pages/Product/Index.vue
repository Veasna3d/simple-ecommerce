<template>

    <Head title="Product" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Product
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="flex justify-end m-2 p-2">
                    <Link href="/products/create"
                        class="px-4 py-3 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">Add New</Link>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Id
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Product name
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Category
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Image
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Price
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Description
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Trending
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Action
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="product in products.data" :key="product.id"
                                        class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ product.id }}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ product.name }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ product.category.name }}
                                        </td>
                                        <td class="py-4 px-6">
                                            <img :src="product.image" class="w-12 h-12 rounded-full" />
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ product.price }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ product.description }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ product.trending }}
                                        </td>
                                        <td class="flex py-4 px-6">
                                            <Link :href="route('products.edit', product.id)">
                                                
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </Link>
                                            
                                            <Link :href="route('products.destroy', product.id)"  method="delete" as="button"
                                        type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </Link>
                                        </td>
                                        

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>

        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
  products: Object,
});


</script>
