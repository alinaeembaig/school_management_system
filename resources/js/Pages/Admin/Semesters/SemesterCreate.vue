<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
defineProps(['courses', 'semesters']);
const form = useForm( {
    semester_id:"",
    course_id: "",
})
</script>

<template>
    <Head title="Add New Semester Course" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

         <div class="max-w-7xl mx-auto py-4">
           <div class="flex justify-between">                
                <Link :href="route('semesters.index')" class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo700 rounded">
                    Back
                </Link>
           </div>
           <div class="mt-6 max-w-md mx-auto bg-slate-100 shadow-lg rounded-lg p-6">
                <h1 class="text-2xl p-4">Add New Semester Course</h1>
                <form @submit.prevent="form.post(route('semesters.store'))">
                    <div>
                         <InputLabel for="course" value="Courses" />

                        <select  id="semester_id" v-model="form.semester_id" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option v-for="semester in semesters" :key="semester.key" :value="semester.key">
                                {{ semester.value }}
                            </option>
                        </select>
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
                            Create
                        </PrimaryButton>
                    </div>
                </form>
           </div>
        </div>
    </AdminLayout>
</template>
