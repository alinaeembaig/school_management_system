<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

import Table from '@/Components/Table.vue';
import TableRow from '@/Components/TableRow.vue';
import TableHeaderCell from '@/Components/TableHeaderCell.vue';
import TableDataCell from '@/Components/TableDataCell.vue';
defineProps(['courses']);
</script>

<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="max-w-7xl mx-auto py-4">
            <div class="flex justify-between">
                <h1>Courses Index </h1>
                <Link :href="route('courses.create')" class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo700 rounded">
                    New Course
                </Link>
           </div>
           <div class="mt-6">
                <Table>
                    <template #header>
                        <TableRow>
                            <TableHeaderCell>ID</TableHeaderCell>
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Description</TableHeaderCell>
                            <TableHeaderCell>Action</TableHeaderCell>
                        </TableRow>
                    </template>
                    <template #default>
                        <TableRow v-for="course in courses" :key="course.id" class="border-b">
                            <TableDataCell>{{ course.id }}</TableDataCell>
                            <TableDataCell>{{ course.name }}</TableDataCell>
                            <TableDataCell>{{ course.description }}</TableDataCell>
                            <TableDataCell>
                                <Link :href="route('courses.edit', course.id)" class="text-green-400 hover:text-green-600">
                                    Edit
                                </Link>  / 
                                <Link :href="route('courses.destroy', course.id)" method="DELETE" as="button" class="text-red-400 hover:text-red-600">
                                    Delete
                                </Link>
                            </TableDataCell>
                        </TableRow>
                    </template>
                </Table>
           </div>
        </div>
    </AdminLayout>
</template>
