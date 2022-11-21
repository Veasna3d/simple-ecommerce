<template>

    <Head title="New Product" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                New Product
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="name" value="Name" />
                                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus
                                    autocomplete="Name" />
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>

                            <div>
                                <InputLabel for="category_id" value="Category" />
                                <select v-model="form.category_id" id="category_id" name="category_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}
                                    </option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.category_id" />
                            </div>

                            <div>
                                <InputLabel for="image" value="Image" />
                                <TextInput id="image" type="file" class="mt-1 block w-full"
                                    @input="form.image = $event.target.files[0]" />
                                <InputError class="mt-2" :message="form.errors.image" />
                            </div>

                            <div>
                                <InputLabel for="price" value="Price" />
                                <TextInput id="price" type="number" class="mt-1 block w-full" v-model="form.price"
                                    autocomplete="price" />
                                <InputError class="mt-2" :message="form.errors.price" />
                            </div>

                            <div>
                                <InputLabel for="description" value="Description" />
                                <TextInput id="description" type="text" class="mt-1 block w-full"
                                    v-model="form.description" autocomplete="description" />
                                <InputError class="mt-2" :message="form.errors.description" />
                            </div>

                            <div class="flex items-center mb-4">
                                <TextInput id="trending" type="checkbox" 
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    v-model="form.trending" autocomplete="trending" />
                                <InputLabel class="m-2" for="trending" value="Trending" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Save
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    categories: Array
});

const form = useForm({
    name: "",
    category_id: "",
    image: null,
    price: "",
    description: "",
    trending: "",
});

const submit = () => {
    form.post(route('products.store'));
}
</script>
