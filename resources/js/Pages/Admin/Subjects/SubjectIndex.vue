<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

import Table from '@/Components/Table.vue';
import TableRow from '@/Components/TableRow.vue';
import TableHeaderCell from '@/Components/TableHeaderCell.vue';
import TableDataCell from '@/Components/TableDataCell.vue';
import { usePermission} from "@/composables/permissions"
const { hasRole } = usePermission();
defineProps(['subjects']);
</script>

<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="max-w-7xl mx-auto py-4">
            <div class="flex justify-between">
                <h1>Subjects Index </h1>
                <Link :href="route('subjects.create')" class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo700 rounded">
                    New Subject
                </Link>
           </div>
           <div class="mt-6">
                <Table>
                    <template #header>
                        <TableRow>
                            <TableHeaderCell>ID</TableHeaderCell>
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Course</TableHeaderCell>
                            <TableHeaderCell>Description</TableHeaderCell>
                            <TableHeaderCell>Action</TableHeaderCell>
                        </TableRow>
                    </template>
                    <template #default>
                        <TableRow v-for="subject in subjects" :key="subject.id" class="border-b">
                            <TableDataCell>{{ subject.id }}</TableDataCell>
                            <TableDataCell>{{ subject.name }}</TableDataCell>
                            <TableDataCell>{{ subject.get_courses.name }}</TableDataCell>
                            <TableDataCell>{{ subject.description }}</TableDataCell>
                            <TableDataCell v-if="hasRole('Admin')">
                                <Link :href="route('subjects.edit', subject.id)" class="text-green-400 hover:text-green-600">
                                    Edit
                                </Link>  / 
                                <Link :href="route('subjects.destroy', subject.id)" method="DELETE" as="button" class="text-red-400 hover:text-red-600">
                                    Delete
                                </Link>
                            </TableDataCell>
                            <TableDataCell v-else="">
                                <Link :href="route('subjects.edit', subject.id)" method="GET" class="text-green-400 hover:text-green-600">
                                    Select
                                </Link>
                            </TableDataCell>
                        </TableRow>
                    </template>
                </Table>
           </div>
        </div>
    </AdminLayout>
</template>
