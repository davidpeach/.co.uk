<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextArea from '@/Components/TextArea.vue';
import { Link, useForm, usePage } from '@inertiajs/inertia-vue3';
const user = usePage().props.value.auth.user;

const form = useForm({
    content: '',
    image: null,
});
</script>

<template>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Note</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                    <form @submit.prevent="form.post(route('admin.note.store'))">

                        <InputLabel for="content" value="Content" />
                        <TextArea
                            id="content"
                            rows="30"
                            class="mt-1 block w-full"
                            v-model="form.content"
                            required
                        />

                        <input type="file" @input="form.image = $event.target.files[0]" />
                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                        </progress>

                        <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

