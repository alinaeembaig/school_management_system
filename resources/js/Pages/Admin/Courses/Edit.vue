<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    course:{
        type: Object,
        required: true,
    }
});

const form = useForm({
    name: props.course?.name,
    description: props.course?.description
})

const submit = () => {
    form.put(route('courses.update', props.course?.id)
)};
</script>

<template>
    <AdminLayout>
        <Head title="Create User" />
        <div class="flex justify-between">                
                <Link :href="route('courses.index')" class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo700 rounded">
                    Back
                </Link>
        </div>
        <div class="mt-6 max-w-md mx-auto bg-slate-100 shadow-lg rounded-lg p-6">            
            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="name" value="Name" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div>
                    <InputLabel for="description" value="Description" />

                    <TextInput
                        id="description"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.description"
                        autofocus
                        autocomplete="description"
                    />

                    <InputError class="mt-2" :message="form.errors.description" />
                </div>

                <div class="flex items-center mt-4">
                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Edit Course
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
