<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import { Link, useForm, usePage } from '@inertiajs/inertia-vue3';
const user = usePage().props.value.auth.user;
const article = usePage().props.value.article;
console.log(article);
const form = useForm({
    title: article.title,
    content: article.content,
    // excerpt: article.excerpt,
});
</script>

<template>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Article</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <form @submit.prevent="form.patch(route('admin.article.update', article.id))">

                        <InputLabel for="title" value="Title" />
                        <TextInput
                            id="title"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.title"
                            required
                        />

                        <!-- <InputLabel for="excerpt" value="Excerpt" /> -->
                        <!-- <TextArea -->
                        <!--     rows="5" -->
                        <!--     id="excerpt" -->
                        <!--     type="text" -->
                        <!--     class="mt-1 block w-full" -->
                        <!--     v-model="form.excerpt" -->
                        <!--     required -->
                        <!-- /> -->
                        <InputLabel for="content" value="Content" />
                        <TextArea
                            rows="30"
                            id="content"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.content"
                            required
                        />
                        <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>


