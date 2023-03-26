<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, usePage } from '@inertiajs/inertia-vue3';

const articles = usePage().props.value.articles;
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Articles</h2>
                <Link :href="route('admin.article.create')">Add Article</Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <p v-for="article in articles">{{ article.content }} - <Link :href="route('admin.article.edit', article.id)">edit</Link></p>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


