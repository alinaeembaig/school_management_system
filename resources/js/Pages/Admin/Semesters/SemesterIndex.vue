<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

import Table from '@/Components/Table.vue';
import TableRow from '@/Components/TableRow.vue';
import TableHeaderCell from '@/Components/TableHeaderCell.vue';
import TableDataCell from '@/Components/TableDataCell.vue';
defineProps(['semesterCourses', 'semesters', 'courses']);
</script>

<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="max-w-7xl mx-auto py-4">
           <div class="flex justify-between">
                <h1>Semester Index </h1>
                <Link :href="route('semesters.create')" class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo700 rounded">
                    Set Semester Course
                </Link>
           </div>
           <div class="mt-6">
                <Table>
                    <template #header>
                        <TableRow>
                            <TableHeaderCell>ID</TableHeaderCell>
                            <TableHeaderCell>Semester</TableHeaderCell>
                            <TableHeaderCell>Course</TableHeaderCell>
                        </TableRow>
                    </template>
                    <template #default>
                        <TableRow v-for="semesterCourse in semesterCourses" :key="semesterCourse.id" class="border-b">
                            <TableDataCell>{{ semesterCourse.id }}</TableDataCell>
                            <TableDataCell>
                                <div v-for="course in courses" :key="course.id">
                                    <span v-if="course.id == semesterCourse.course_id"> 
                                        {{ course.name }}
                                    </span> 
                                </div>
                            </TableDataCell>
                            <TableDataCell>
                                <div v-for="semester in semesters" :key="semester.key">
                                    <span v-if="semester.key == semesterCourse.semester_id"> 
                                        {{ semester.value }}
                                    </span> 
                                </div>
                            </TableDataCell>
                        </TableRow>
                    </template>
                </Table>
           </div>
        </div>
    </AdminLayout>
</template>
