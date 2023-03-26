<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, usePage } from '@inertiajs/inertia-vue3';

const notes = usePage().props.value.notes;
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Notes</h2>
                <Link :href="route('admin.note.create')">Add Note</Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <p v-for="note in notes">{{ note.content }} - <Link :href="route('admin.note.edit', note.id)">edit</Link></p>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

