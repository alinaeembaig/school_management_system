<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

import Table from '@/Components/Table.vue';
import TableRow from '@/Components/TableRow.vue';
import TableHeaderCell from '@/Components/TableHeaderCell.vue';
import TableDataCell from '@/Components/TableDataCell.vue';
defineProps(['users']);
</script>

<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="max-w-7xl mx-auto py-4">
            <div class="flex justify-between">
                <h1>Users Index </h1>
                <Link :href="route('users.create')" class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo700 rounded">
                    New User
                </Link>
           </div>
           <div class="mt-6">
                <Table>
                    <template #header>
                        <TableRow>
                            <TableHeaderCell>ID</TableHeaderCell>
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Email</TableHeaderCell>
                            <TableHeaderCell>Role</TableHeaderCell>
                            <TableHeaderCell>Action</TableHeaderCell>
                            <TableHeaderCell>Assigne Course To Student</TableHeaderCell>
                        </TableRow>
                    </template>
                    <template #default>
                        <TableRow v-for="user in users" :key="user.id" class="border-b">
                            <TableDataCell>{{ user.id }}</TableDataCell>
                            <TableDataCell>{{ user.name }}</TableDataCell>
                            <TableDataCell>{{ user.email }}</TableDataCell>
                            <TableDataCell>{{ user.roles[0] }}</TableDataCell>
                            <TableDataCell>
                                <Link :href="route('users.edit', user.id)" class="text-green-400 hover:text-green-600">
                                    Edit
                                </Link>  / 
                                <Link :href="route('users.destroy', user.id)" method="DELETE" as="button" class="text-red-400 hover:text-red-600">
                                    Delete
                                </Link>
                            </TableDataCell>
                            <TableDataCell v-if="user.roles[0] == 'Student'">
                                <Link :href="route('courses.assignTOStudent', user.id)" class="text-green-400 hover:text-green-600">
                                    Select Course
                                </Link>
                            </TableDataCell>
                        </TableRow>
                    </template>
                </Table>
           </div>
        </div>
    </AdminLayout>
</template>
