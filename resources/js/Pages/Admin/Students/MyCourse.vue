<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';

import Table from '@/Components/Table.vue';
import TableRow from '@/Components/TableRow.vue';
import TableHeaderCell from '@/Components/TableHeaderCell.vue';
import TableDataCell from '@/Components/TableDataCell.vue';
defineProps(['user', 'course', 'semester']);
</script>

<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="max-w-7xl mx-auto py-4">
           <h1>My Course </h1>
           <div class="mt-6">
                <Table>
                    <template #header>
                        <TableRow>
                            <TableHeaderCell>ID</TableHeaderCell>
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Email</TableHeaderCell>
                            <TableHeaderCell>Course</TableHeaderCell>
                            <TableHeaderCell>Semester</TableHeaderCell>
                        </TableRow>
                    </template>
                    <template #default>
                        <TableRow class="border-b">
                            <TableDataCell>{{ user.id }}</TableDataCell>
                            <TableDataCell>{{ user.name }}</TableDataCell>
                            <TableDataCell>{{ user.email }}</TableDataCell>
                            <TableDataCell>{{ course.name }}</TableDataCell>
                            <TableDataCell>{{ semester.value }}</TableDataCell>
                        </TableRow>
                    </template>
                </Table>
           </div>
        </div>
    </AdminLayout>
</template>
