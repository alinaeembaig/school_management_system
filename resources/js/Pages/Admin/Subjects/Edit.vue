<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
// defineProps(['courses']);
const props = defineProps({
    subject:{
        type: Object,
        required: true,
    },
    courses:{
        type: Object,
        required: true,
    } 
});

const form = useForm({
    name: props.subject?.name,
    description: props.subject?.description,
    subject_id: props.subject?.subject_id,
})

const submit = () => {
    form.put(route('subjects.update', props.subject?.id)
)};

</script>

<template>
    <AdminLayout>
        <Head title="Create User" />
        <div class="flex justify-between">                
                <Link :href="route('subjects.index')" class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo700 rounded">
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

                 <div class="mt-4">
                    <InputLabel for="course" value="Courses" />

                    <select  id="course_id" v-model="form.course_id" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option v-for="course in courses" :key="course.id" :value="course.id">
                            {{ course.name }}
                        </option>
                    </select>

                    <InputError class="mt-2" :message="form.errors.role" />
                </div>

                <div class="flex items-center mt-4">
                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Edit Subject
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
