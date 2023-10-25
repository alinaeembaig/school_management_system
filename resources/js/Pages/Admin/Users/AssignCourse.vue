<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
// import DropDown from '@/Components/DropDown.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
var data = defineProps(['userId', 'semesters', 'courses']);

const form = useForm({
    name: '',
    semester_id: '-- Select Semester --',
    course_id: '-- Select Course --',
    user_id: data.userId
});

const submit = () => {
    form.post(route('courses.assignStudent'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <AdminLayout>
        <Head title="Create User" />
        <div class="flex justify-between">                
                <Link :href="route('roles.index')" class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo700 rounded">
                    Back
                </Link>
        </div>
        <div class="mt-6 max-w-md mx-auto bg-slate-100 shadow-lg rounded-lg p-6">
            <form @submit.prevent="submit">
                 <div>
                         <InputLabel for="course" value="Courses" />

                        <select  id="semester_id" v-model="form.semester_id" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled value="-- Select Semester --">-- Select Semester --</option>
                            <option v-for="semester in semesters" :key="semester.key" :value="semester.key">
                                {{ semester.value }}
                            </option>
                        </select>
                    </div>

                <div class="mt-4">
                    <InputLabel for="course" value="Courses" />

                    <select  id="course_id" v-model="form.course_id" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled value="-- Select Course --">-- Select Course --</option>
                        <option v-for="course in courses" :key="course.id" :value="course.id">
                            {{ course.name }}
                        </option>
                    </select>

                    <InputError class="mt-2" :message="form.errors.role" />
                </div>
                <div class="mt-4 hidden">
                    <InputLabel for="user_id" value="" />

                    <TextInput
                        id="user_id"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.user_id"
                        required
                        
                    />

                    <InputError class="mt-2" :message="form.errors.user_id" />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Set Course For Student
                    </PrimaryButton>
                </div>
                
            </form>
        </div>
    </AdminLayout>
</template>
