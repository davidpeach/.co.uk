<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import { Link, useForm, usePage } from '@inertiajs/inertia-vue3';
const user = usePage().props.value.auth.user;
const post = usePage().props.value.post;

const form = useForm({
    title: post.title,
    body: post.content_markdown,
    excerpt: post.excerpt,
});
</script>

<template>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Post</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <form @submit.prevent="form.patch(route('admin.post.update', post.id))">

                        <InputLabel for="title" value="Title" />
                        <TextInput
                            id="title"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.title"
                            required
                        />

                        <InputLabel for="excerpt" value="Excerpt" />
                        <TextArea
                            rows="5"
                            id="excerpt"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.excerpt"
                            required
                        />
                        <InputLabel for="body" value="Body" />
                        <TextArea
                            rows="30"
                            id="body"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.body"
                            required
                        />
                        <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

