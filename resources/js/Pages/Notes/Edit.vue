<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import { Link, useForm, usePage } from '@inertiajs/inertia-vue3';
const user = usePage().props.value.auth.user;
const note = usePage().props.value.note;

const form = useForm({
    content: note.content,
});
</script>

<template>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Note</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <form @submit.prevent="form.patch(route('admin.note.update', note.id))">

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


